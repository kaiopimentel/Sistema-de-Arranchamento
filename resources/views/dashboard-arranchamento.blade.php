{{-- resources/views/arranchamentos/dashboard-arranchamento.blade.php --}}

<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-xl font-semibold mb-4">Dashboard de Arranchamento</h1>
        
        <form method="get" action="{{ route('arranchamentos.dashboard') }}">
            <select name="agrupar_por">
                <option value="default">Padrão</option>
                <option value="secao" {{ request('agrupar_por') == 'secao' ? 'selected' : '' }}>Por Seção</option>
                <option value="patente" {{ request('agrupar_por') == 'patente' ? 'selected' : '' }}>Por Patente</option>
            </select>
            <button type="submit">Agrupar</button>
        </form>

        @if ($agrupamento === 'secao')
            {{-- Exibir dados agrupados por seção --}}
            @include('partials.dashboard-secao', ['dados' => $dados])
        @elseif ($agrupamento === 'patente')
            {{-- Exibir dados agrupados por patente --}}
            @include('partials.dashboard-patente', ['dados' => $dados])
        @else
            {{-- Exibir visualização padrão --}}
            @include('partials.dashboard-padrao', ['dados' => $dados])
        @endif
    </div>
</x-app-layout>
