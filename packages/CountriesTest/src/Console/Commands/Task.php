<?php

namespace CountriesTest\Console\Commands;

use Illuminate\Console\Command;
use DB;

class Task extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'base:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prueba de Lista que los migrate existentes';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(){
        
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $migrations = DB::table('migrations')->get()->map(function ($migration){
            return [
                $migration->id,
                $migration->migration,
                $migration->batch
            ];
        });

        $this->line('');
        $this->comment('Lista que los migrate existentes');
        $this->table(['id','migration', 'batch'], $migrations);
        $this->info('');
    }
}