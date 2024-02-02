<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Refeições - Próximos 30 Dias</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="checkbox"][disabled] {
            /* Cinza mais escuro para desabilitado */
            opacity: 0.6; 
        }
        input[type="text"]{
            width:80%
        }
        input[type="text"][disabled] {
            /* Cinza mais escuro para desabilitado */
            opacity: 0.6; 
        }

        .nao-editavel {
            background-color: #cccccc; /* Cinza mais escuro */
        }

        button {
            padding-top: 10px;
            padding-bottom: 15px;
            padding-left: 10px;
            padding-right: 10px;
            margin: 10px 0;
            border: none;
            border-color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        button:focus{
            outline: none;
        }

    </style>
</head>
<body>
    <h2 class="text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="padding-left:10px; padding-top: 10px;"> Tabela de Refeições - Próximos 30 Dias</h2>

    <form action="{{ route('arranchamentos.store') }}" method="post">
        @csrf
        <button type="button" id="editarArranchamento" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md"> Editar Arranchamento</button>
        <button type="submit" id="enviarArranchamento" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md" disabled hidden>Enviar Arranchamento</button>

        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Café</th>
                    <th>Almoço</th>
                    <th>Janta</th>
                    <th>Observações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $hoje = new DateTime();
                $limiteEdicao = (new DateTime())->modify('+2 days');
                $dataFinal = (new DateTime())->modify('+30 days');

                while ($hoje <= $dataFinal): 
                    $dataCompleta = $hoje->format('Y-m-d');
                    $naoEditavel = $hoje <= $limiteEdicao ? 'nao-editavel' : '';
                    $disabled = $hoje <= $limiteEdicao ? 'disabled' : '';
                ?>
                    <tr class="<?= $naoEditavel ?>">
                        <td><?= $dataCompleta ?></td>
                        <td>
                            <input type="hidden" name="cafe_<?= $dataCompleta ?>_hidden" value="off">
                            <input type="checkbox" name="cafe_<?= $dataCompleta ?>" <?= isset($arranchados[1][$dataCompleta]) ? 'checked' : '' ?> disabled>
                        </td>
                        <td>
                            <input type="hidden" name="almoco_<?= $dataCompleta ?>_hidden" value="off">
                            <input type="checkbox" name="almoco_<?= $dataCompleta ?>" <?= isset($arranchados[2][$dataCompleta]) ? 'checked' : '' ?> disabled>
                        </td>
                        <td>
                            <input type="hidden" name="janta_<?= $dataCompleta ?>_hidden" value="off">
                            <input type="checkbox" name="janta_<?= $dataCompleta ?>" <?= isset($arranchados[3][$dataCompleta]) ? 'checked' : '' ?> disabled>
                        </td>
                        <td>
                            <input type="text" name="janta_<?= $dataCompleta ?>" <?= 'remarks'?> disabled>
                        </td>
                    </tr>
                <?php 
                    $hoje->modify('+1 day');
                endwhile; 
                ?>
            </tbody>
        </table>
    </form>

    <script>
        document.getElementById('editarArranchamento').addEventListener('click', function() {
            //itera nos elementos e habilita somente os que nao estao na linha nao editavel
            var checkboxes = document.querySelectorAll('input[type=checkbox]');
            checkboxes.forEach(function(checkbox) {
                if (!checkbox.closest('tr').classList.contains('nao-editavel')) {
                    checkbox.disabled = false;
                }
            });

            var text = document.querySelectorAll('input[type=text]');
            text.forEach(function(text) {
                if (!text.closest('tr').classList.contains('nao-editavel')) {
                    text.disabled = false;
                }
            });

            document.getElementById('enviarArranchamento').disabled = false;
            document.getElementById('enviarArranchamento').hidden = false;
        });

        document.getElementById('enviarArranchamento').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('input[type=checkbox]');
            checkboxes.forEach(function(checkbox) {
                // checkbox.disabled = true;
            });
            // this.disabled = true;

        });
    </script>


</body>
</html>
