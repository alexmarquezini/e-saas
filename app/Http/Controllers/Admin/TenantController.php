<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Tables\Tenants as TenantsTable;
use ProtoneMedia\Splade\Facades\Toast;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tenant.index', [
            'tenants' => new TenantsTable(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tenant.create', [
            'tenant' => new Tenant(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTenantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenantRequest $request)
    {
        $validated = $request->validated();
        try {
            $tenant = Tenant::create(['id' => $validated['id']]);
        } catch (\Exception $e) {

            if (env('APP_ENV') == 'local') {
                Toast::title($e->getMessage())
                    ->danger();
                return back();
            }

            Toast::title('Ocorreu um erro ao criar o cliente!')
                ->danger()
                ->autoDismiss(5);
            return back();
        }

        try {
            $tenant->domains()->create(['domain' => $validated['id'] . config('tenancy.central_domains')[0]]);
        } catch (\Exception $e) {

            if (env('APP_ENV') == 'local') {
                Toast::title($e->getMessage())
                    ->danger();
                return back();
            }

            Toast::title('Ocorreu um erro ao criar o cliente!')
                ->danger()
                ->autoDismiss(5);
            return back();
        }

        Toast::title('Cliente criado com sucesso!')
            ->success()
            ->autoDismiss(5);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        return view('admin.tenant.show', ['tenant' => $tenant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        return view('admin.tenant.edit', ['tenant' => $tenant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTenantRequest  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        $tenant->update($request->validated());
        Toast::success('Cliente atualizado com sucesso!')
            ->autoDismiss(7);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        Tenant::deleting(function ($tenant) {
            $tenant->domains()->delete();
        });
        $tenant->delete();
        Toast::success('Cliente excluído com sucesso!')
            ->autoDismiss(7);
        return back();
    }
}
