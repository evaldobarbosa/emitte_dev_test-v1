<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Controle de Vendas - Emitte') }}
        </h2>
    </x-slot>

    @include('notas_fiscais.index')
</x-app-layout>
