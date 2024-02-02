{{-- resources/views/partials/dashboard-padrao.blade.php --}}

@foreach ($dados->groupBy(['date', 'meal_type']) as $date => $arranchamentosPorData)
    @foreach ($arranchamentosPorData as $mealType => $arranchamentos)
        <section class="mb-8">
            <h2 class="text-lg font-semibold mb-2">{{ \Carbon\Carbon::parse($date)->format('d/m/Y') }} - {{ $mealOptions[$mealType] }}</h2>
            <table class="min-w-full bg-white border-collapse">
                <thead>
                    <tr>
                        <th class="border px-8 py-4">Total de Arranchamentos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($arranchamentos as $arranchamento)
                        <tr>
                            <td class="border px-8 py-4">{{ $arranchamento->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endforeach
@endforeach