<?php

namespace App\Console\Commands;

use App;
use Schema;
use Illuminate\Console\Command;

class MySqlDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:mysqldump';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the mysqldump utility';

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
        $ds = DIRECTORY_SEPARATOR;
        $table = '';
        $database = $_ENV['DB_DATABASE'];

        $param = $this->ask('Provide `table name` or `--all` to dump full database');

        if ($param !== '--all')
        {
            if (!Schema::hasTable($param))
            {
                echo "Table: `$param` not exist in DB: `$database`";
                exit;
            }

            $table = $param;
        }

        $path = database_path() . $ds . 'backups' . $ds . date('Y-m-d') . $ds;
        $file = date('Y-m-d') . '_' .$database. '_' .$table .'.sql';

        $command = "mysqldump -u root $database $table >". $path . $file;

        if (!is_dir($path)) 
        { 
            mkdir($path, 0755, true); 
        }

        exec($command);
        echo 'Job is done.';
    }
}
