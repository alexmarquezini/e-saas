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
                    Editar Cliente
                </h3>
                <x-splade-form :default="$tenant" :action="route('tenant.update', $tenant)" method="PATCH" class="space-y-4" confirm
                    confirm-text="Depois você terá que mudar o nome do banco de dados manualmente!">
                    <x-splade-input label="Nome do banco de dados" name="tenancy_db_name" />
                    <x-splade-submit label="Atualizar" />
                </x-splade-form>
            </div>
        </div>
    </x-splade-modal>
</x-app-layout>
