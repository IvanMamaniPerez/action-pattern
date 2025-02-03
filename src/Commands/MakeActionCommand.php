<?php

namespace App\Console\Commands;

use Classes\ActionGenerator;
use Illuminate\Console\Command;

class MakeActionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {nameAction : Name for the file and class with the action} {--validated : Should the action be validated}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make an action for the application';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $nameAction = $this->argument('nameAction');
        $validated  = $this->option('validated');

        ActionGenerator::make($nameAction, $validated)->generate($nameAction, $validated);
    }
}
