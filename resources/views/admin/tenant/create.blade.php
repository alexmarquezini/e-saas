<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <x-splade-modal>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3 class="font-semibold text-xl py-4 text-gray-800 leading-tight">
                    Novo Cliente
                </h3>
                <x-splade-form :default="$tenant" :action="route('tenant.store', $tenant)" method="POST" class="space-y-4">
                    <x-splade-input label="Identificador" name="id" placeholder="Digite o identificador" />
                    <x-splade-submit label="Salvar" />
                </x-splade-form>
            </div>
        </div>
    </x-splade-modal>
</x-app-layout>
