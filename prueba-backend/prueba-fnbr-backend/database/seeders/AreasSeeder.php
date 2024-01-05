<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('areas')->insert([
            'name' => 'Department of Environment and Sustainability',
        ]);
        DB::table('areas')->insert([
            'name' => 'Department of Innovation, Business and New Technologies',
        ]);
        DB::table('areas')->insert([
            'name' => 'Department of Language, Education and Communications Sciences',
        ]);
        DB::table('areas')->insert([
            'name' => 'Department of Health Sciences',
        ]);
        DB::table('areas')->insert([
            'name' => 'Department of Projects',
        ]);
    }
}
