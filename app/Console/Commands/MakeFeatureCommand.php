<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeFeatureCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:feature {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model = $this->argument('model');
        Artisan::call("make:model $model -m --api -c");
        Artisan::call("make:filament-resource $model --view");
        Artisan::call("make:service {$model}Service");
        Artisan::call("make:repository {$model}Repository");
        //
    }
}
