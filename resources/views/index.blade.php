{{-- resources/views/arranchamentos/index.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class=" "flex items-center justify-end mt-4"font-semibold text-xl text-gray-800 leading-tight"> -->
        <h2 class="text-sm text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            {{ __('Arranchamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Mensagem de sucesso -->
                    @if (session('success'))
                        <div class="alert alert-success text-sm text-gray-900 rounded-md" style="padding-left: 10px; background-color: #8ced76; text-align:center; vertical-align: middle; line-height: 45px;">
                        <!-- <p>     -->
                            {{ session('success') }}
                        <!-- </p>     -->
                    </div>
                    @endif

                    <!-- Incluir a tabela de arranchamentos -->
                    @include('arranchamento')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
