<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AreaSeeder;
use Database\Seeders\ProgramSeeder;
use Database\Seeders\TemplateEmailSeeder;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\Traits\DisableForeignKeys;

class DatabaseSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Seeders
        */
        Model::unguard();
        $this->disableForeignKeys();
        $this->call(AreaSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(TemplateEmailSeeder::class);
        $this->enableForeignKeys();
        Model::reguard();
    }
}
