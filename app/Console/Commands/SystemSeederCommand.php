<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SystemSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:seed {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'system seeder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $class = $this->argument('class');
        Artisan::call('db:seed' , [
            '--class' => 'Database\\Seeders\\Tenants\\'.$class,
            '--database' => 'mysql'
        ]);
        $this->info(Artisan::output());
        return Command::SUCCESS;
    }
}
