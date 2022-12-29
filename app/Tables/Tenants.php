<?php

namespace App\Tables;

use App\Models\Tenant;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class Tenants extends AbstractTable
{
    private $deleted;

    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->deleted = 0;
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Tenant::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->defaultSort('id')
            ->withGlobalSearch(
                label: 'Buscar...',
                columns: ['id', 'tenancy_db_name']
            )
            ->paginate()
            ->column(
                'id',
                sortable: true,
                searchable: true
            )
            ->column(
                key: 'tenancy_db_name',
                label: 'Nome do Banco de Dados',
                sortable: true,
                searchable: true
            )
            ->column(
                key: 'action',
                label: 'Ações'
            )
            ->bulkAction(
                label: 'Excluir Selecionados',
                each: function ($tenant) {
                    try {
                        $tenant->delete();
                        $this->deleted++;
                    } catch (\Exception $e) {
                        Toast::error("Não foi possível excluir o cliente $tenant->id!")->autoDismiss(5);
                    }
                },
                confirm: 'Tem certeza que deseja excluir o(s) cliente(s) selecionado(s)?',
                after: function ($tenants) {
                    Toast::success("Excluído(s) $this->deleted de " . count($tenants) . " cliente(s) selecionado(s)!")->autoDismiss(7);
                }
            );

        // ->searchInput()
        // ->selectFilter()
        // ->withGlobalSearch()

        // ->bulkAction()
        // ->export()
    }
}
