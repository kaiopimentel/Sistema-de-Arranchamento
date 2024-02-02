{{-- resources/views/partials/dashboard-secao.blade.php --}}

@foreach ($dados as $arranchamento)
    <section class="mb-8">
        <h2 class="text-lg font-semibold mb-2">{{ \Carbon\Carbon::parse($arranchamento->date)->format('d/m/Y') }} - {{ $mealOptions[$arranchamento->meal_type] }}</h2>
        @if($agrupamento !== 'default')
            <h3>Seção: {{ $departmentOptions[(int)$arranchamento->department]  ?? $rankOptions[(int)$arranchamento->rank]  }}</h3>
        @endif
        <table class="min-w-full bg-white border-collapse">
            <thead>
                <tr>
                    <th class="border px-8 py-4">Nome</th>
                    @if($agrupamento !== 'default')
                        <th class="border px-8 py-4">{{ $agrupamento === 'secao' ? 'Patente' : 'Seção' }}</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach (explode(',', $arranchamento->user_details) as $user_detail)
                    @php
                        [$name, $additionalInfo] = explode('-', $user_detail);
                    @endphp
                    <tr>
                        <td class="border px-8 py-4">{{ $name }}</td>
                        @if($agrupamento !== 'default')
                            <td class="border px-8 py-4">{{ $rankOptions[(int)$additionalInfo] }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endforeach