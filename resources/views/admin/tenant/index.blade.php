<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <Link type="button" href="/tenant/create" modal
                class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm mb-4 text-white bg-indigo-500 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:outline-none focus:ring-indigo-500">
            <!-- Heroicon name: outline/plus-sm -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Adicionar
            </Link>
            <x-splade-table :for="$tenants" striped>
                @cell('action', $tenant)
                    <!-- Edit Button -->
                    <Link modal href="/tenant/{{ $tenant->id }}/edit" type="button"
                        class="inline-flex items-center p-0.5 border mr-1 border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-indigo-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>

                    </Link>
                    <!-- Show Button -->
                    <Link slideover href="/tenant/{{ $tenant->id }}" type="button"
                        class="inline-flex items-center p-0.5 border mr-1 border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-1 focuss:ring-offset-2 focus:ring-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>

                    </Link>
                    <!-- Delete Button -->
                    <Link href="{{ route('tenant.destroy', $tenant) }}" method="DELETE" stype="button"
                        class="inline-flex items-center p-0.5 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-1 focuss:ring-offset-2 focus:ring-red-500"
                        confirm="Tem certeza que quer excluir {{ $tenant->id }}?"
                        confirm-text="Isso também vai excluir o banco de dados {{ $tenant->tenancy_db_name }}!"
                        confirm-button="Sim, Exclua!" confirm-button-color="red" cancel-button="Não, nem pensar!">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    </Link>
                @endcell
            </x-splade-table>
        </div>
    </div>
</x-app-layout>
