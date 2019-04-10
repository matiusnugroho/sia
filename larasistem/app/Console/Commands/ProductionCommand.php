<?php

namespace SIAStar\Console\Commands;

use Illuminate\Console\Command;

class ProductionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'production {flag}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make your app ready for production';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if($this->argument('flag')=='cache')
        {
            $this->call('route:cache');
            $this->call('config:cache');
            $this->call('optimize');
        }
        else
        {
            $this->call('route:clear');
            $this->call('config:clear');
        }
    }
}
