<?php

namespace App\Models;

use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase;
    use HasDomains;

    // public static function getCustomColumns(): array
    // {
    //     return [
    //         'tenancy_db_name',
    //     ];
    // }

    // public static function getTenancyDBName(): string
    // {
    //     return 'tenancy_db_name';
    // }
}
