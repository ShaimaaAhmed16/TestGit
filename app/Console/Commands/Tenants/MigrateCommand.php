<?php

namespace App\Console\Commands\Tenants;

use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tenants migration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tenants = Tenant::get();
        $tenants->each(function ($tenant){
            TenantService::switchToTenant($tenant);
            $this->info('Start migrating : '.$tenant->domain);
            $this->info('---------------------------------------');
//            Artisan::call('migrate:rollback --path=database/migrations/  --database=tenant');
            Artisan::call('migrate --path=database/migrations/  --database=tenant');
            $this->info(Artisan::output());
        });
        return Command::SUCCESS;
    }
}
