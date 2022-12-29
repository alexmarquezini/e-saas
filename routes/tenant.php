<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::middleware('splade')->group(function () {
        // Registers routes to support Table Bulk Actions and Exports...
        Route::spladeTable();

        // Registers routes to support async File Uploads with Filepond...
        Route::spladeUploads();

        Route::get('/', function () {
            return view('tenant.welcome');
        });

        Route::middleware('auth')->group(function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
        });

        require __DIR__ . '/auth.php';
    });
});
