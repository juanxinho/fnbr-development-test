<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            'name' => "Master's Degree in Environmental Management and Audits",
            'area_id' => 1,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Strategic Management with a Specialization in Management",
            'area_id' => 2,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Strategic Management with a Specialization in Information Technologies",
            'area_id' => 2,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Strategic Management with a specialization in Telecommunications",
            'area_id' => 2,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Training of Teachers of Spanish as a Foreign Language",
            'area_id' => 3,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Education with a specialization in Higher Education",
            'area_id' => 3,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Education with a specialization in Organization and Management of Educational Centers",
            'area_id' => 3,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Physical Activity: Training and Sports Management",
            'area_id' => 4,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Naturopathic Sciences",
            'area_id' => 4,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Project Design, Management and Direction",
            'area_id' => 5,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Design, Management and Project Management with specialization in Innovation and Products",
            'area_id' => 5,
        ]);
        DB::table('programs')->insert([
            'name' => "Master's Degree in Design, Management and Project Management with a specialization in Architecture and Urban Planning",
            'area_id' => 5,
        ]);
    }
}
