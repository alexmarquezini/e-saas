<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <x-splade-modal>
        <x-splade-data :default="$tenant">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3 class="font-semibold text-xl py-4 text-gray-800 leading-tight">
                    Detalhes do Cliente
                </h3>
                <ul role="list" class="divide-y divide-gray-200">
                    <li class="py-4 flex">
                        <div class="ml-3">
                            <img class="h-10 w-10 rounded-full"
                                src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="">
                            <p class="text-sm font-medium text-gray-900" v-text="data.id" />
                            <p class="text-sm text-gray-500" v-text="data.tenancy_db_name" />
                        </div>
                    </li>
                </ul>
            </div>
        </x-splade-data>
    </x-splade-modal>
</x-app-layout>
