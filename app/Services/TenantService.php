<?php
/**
 * Created by PhpStorm.
 * User: shimaa
 * Date: 2/10/2025
 * Time: 1:28 AM
 */

namespace App\Services;


use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TenantService
{
    private static $tenant;
    private static $domain;
    private static $database;

    public static function switchToTenant(Tenant $tenant){
        if(!$tenant instanceof Tenant){
            // throw error or tenant class
            throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);
        }

        DB::purge('mysql');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database',$tenant->database);
        Self::$tenant = $tenant;
        Self::$domain = $tenant->domain;
        Self::$database = $tenant->database;
        DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('tenant');
    }
    public static function switchToDefault(){
        DB::purge('mysql');
        DB::purge('tenant');
        DB::connection('mysql')->reconnect();
        DB::setDefaultConnection('mysql');
    }

    public static function getTenant(){
        return Self::$tenant;
    }
}