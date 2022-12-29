<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuário
        </h2>
    </x-slot>

    <div class="py-12">
        <x-splade-modal>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-splade-form :default="$user" :action="route('user.update', $user)" method="PATCH" class="space-y-4">
                    <x-splade-input label="Nome" name="name" />
                    <x-splade-input label="E-mail" name="email" type="email" />
                    <x-splade-submit label="Atualizar" />
                </x-splade-form>
            </div>
        </x-splade-modal>
    </div>
</x-app-layout>
