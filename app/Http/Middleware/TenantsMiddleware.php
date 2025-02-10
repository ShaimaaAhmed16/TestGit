<?php

namespace App\Http\Middleware;

use App\Models\Tenant;
use App\Services\TenantService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class TenantsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // الحصول على الدومين الحالي
        $domain = $request->getHost();
        // البحث عن المستأجر بناءً على الدومين
        $tenant = Tenant::where('domain', $domain)->first();

//        TenantService::switchToTenant($tenant);
        if (!$tenant) {
            abort(404, 'Tenant not found');
        }
        // امسح(انسي) الداتا بيز القديمة
        DB::purge('mysql');
        Config::set('database.connections.tenant.database',$tenant->database);
        DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('tenant');
        session(['tenant' => $tenant]);
        return $next($request);
    }
}
