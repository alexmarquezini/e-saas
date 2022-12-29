<?php

namespace App\Tables;

use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class Users extends AbstractTable
{
    private $deleted = 0;

    /*
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return User::query();
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
            ->defaultSort('name')
            ->withGlobalSearch(
                label: 'Buscar...',
                columns: ['name', 'email']
            )
            ->paginate()
            ->column('id')
            ->column(
                key: 'name',
                label: 'Nome',
                sortable: true,
                searchable: true
            )
            ->column(
                key: 'email',
                label: 'E-mail',
                sortable: true,
                searchable: true
            )
            ->column(
                key: 'action',
                label: 'Ações'
            )
            ->bulkAction(
                label: 'Excluir Selecionados',
                each: function ($user) {
                    if (auth()->user()->id == $user->id) {
                        Toast::danger("Você não pode se excluir!")->autoDismiss(5);
                        return;
                    }
                    $user->delete();
                    $this->deleted++;
                },
                confirm: 'Tem certeza que deseja excluir o(s) usuário(s) selecionado(s)?',
                after: function ($users) {
                    Toast::success("Excluído(s) $this->deleted de " . count($users) . " usuário(s) selecionado(s)!")->autoDismiss(7);
                }
            );

        // ->selectFilter(
        //     'id',
        //     [
        //         '1' => 'ALEX',
        //         '2' => 'MARQUEZINI'
        //     ]
        // )

        // ->searchInput()
        // ->export()
    }
}
