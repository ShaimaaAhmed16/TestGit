<?php

namespace Database\Seeders\Tenants;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = [
            ['name'=> 'tenant', 'domain'=>'app.textgit.test' , 'database'=>'tenant_textgit'],
            ['name'=> 'tenant1', 'domain'=>'app1.textgit.test' , 'database'=>'textgit'],
          ];

        Tenant::insert($tenant);
    }
}
