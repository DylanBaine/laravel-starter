<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Dev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the dev server and front end assets builder.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $node = 'node';
        $port = env('APP_PORT');
        $devCommand = "require('child_process').exec('npm run dev');";
        $devCommand .= "require('child_process').exec('php artisan serve --port $port');";
        $this->info("Server running at http://localhost:$port");
        $this->newLine();
        $this->warn('Press Ctrl+C to stop the server');
        passthru("$node -e \"$devCommand\"");

    }
}
