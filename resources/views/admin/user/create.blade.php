<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Criar Usuário
        </h2>
    </x-slot>

    <x-splade-modal>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <x-splade-form :default="$user" :action="route('user.store', $user)" method="POST" class="space-y-4">
                    <x-splade-input label="Nome" name="name" placeholder="Digite o nome" />
                    <x-splade-input label="E-mail" name="email" type="email"
                        placeholder="Endereço de e-mail do usuário" />
                    <x-splade-input label="Senha" name="password" type="password" placeholder="Digite a senha" />
                    <x-splade-input label="Confirmação de Senha" name="password_confirmation" type="password"
                        placeholder="Digite a senha novamente para confirmar" />
                    <x-splade-submit label="Salvar" />
                </x-splade-form>
            </div>
        </div>
    </x-splade-modal>
</x-app-layout>
