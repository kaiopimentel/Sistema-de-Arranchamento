<!--
    Aqui abaixo se encontra o enum para a patente e os departamentos, esse enum tambem vai ser encontrado na pasta partials para o dashboard
    TODO: unificar em um enum só e referenciar esse enum de fora.

-->

<!-- Incluir CSS do Select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<style>
    /* Estilo personalizado para o Select2 */
    .select2-container--default .select2-selection--single {
        height: auto; /* Altura automática */
        font-size: 1rem; /* Tamanho da fonte, ajuste conforme necessário */
        line-height: 1.5; /* Espaçamento da linha */
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        padding-left: 10px; /* Padding esquerdo */
    }
    .select2-container .select2-selection--single {
        border: 1px solid #ced4da; /* Cor da borda */
        border-radius: 0.25rem; /* Raio da borda */
    }
    .js-example-basic-single {
        width: 100% !important; /* Largura completa */
    }
</style>

<section>
    <!-- Posto/Graduação -->
    <div class="mt-4">
        <x-input-label for="rank" :value="__('Posto/Graduação')" />

        <select id="rank" class="js-example-basic-single" name="rank" required>
            <option value="">Selecione uma patente</option>
            @foreach ($rankOptions as $value => $label)
                <!-- Reuses $user-rank value if it exists, otherwise uses value = "" (Selecione uma Patente)-->
                <option value="{{ $value }}" {{ old('rank', $user->rank ?? "") == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('rank')" class="mt-2" />
    </div>


    <!-- Seção -->
    <div class="mt-4">
        <x-input-label for="department" :value="__('Seção')" />

        <select id="department" class="js-example-basic-single" name="department" required>
            <option value="">Selecione a Seção</option>
            @foreach ($departmentGroupOptions as $groupLabel => $options)
                <optgroup label="{{ $groupLabel }}">
                    @foreach ($options as $value => $label)
                        <!-- Reuses $user-rank value if it exists, otherwise uses value = "" (Selecione a Seção)-->
                        <option value="{{ $value }}"  {{ old('department', $user->department ?? "") == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>

        <x-input-error :messages="$errors->get('department')" class="mt-2" />
    </div>

    <!-- Incluir jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Incluir JavaScript do Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <!-- Script para aplicar o Select2 ao elemento select -->
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
</section>