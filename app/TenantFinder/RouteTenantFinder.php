<?php

namespace App\TenantFinder;

use Illuminate\Http\Request;
use Spatie\Multitenancy\Models\Tenant;
use Spatie\Multitenancy\TenantFinder\TenantFinder as BaseTenantFinder;

class RouteTenantFinder extends BaseTenantFinder
{
    public function findForRequest(Request $request): ?Tenant
    {
        $slug = $request->route('empresa');

        if (! $slug) {
            return null;
        }

        return Tenant::where('slug', $slug)->first();
    }
}
