<?php

namespace SIAStar\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cleartable {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clearing your table\'s entris';

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
        $table = $this->argument('table');
        DB::table($table)->truncate();
        $this->info('Table '.$table.' Cleared!');
    }
}
