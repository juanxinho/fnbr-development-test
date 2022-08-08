<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    /**
     *
     * Area 1
     */
    Program::create([
      "program_name" => "Master's Degree in Environmental Management and Audits",
      "area_id" => 1
    ]);

    /**
     *
     * Area 2
     */
    Program::create([
      "program_name" => "Master's Degree in Strategic Management with a Specialization in Management",
      "area_id" => 2
    ]);

    Program::create([
      "program_name" => "Master's Degree in Strategic Management with a Specialization in Information Technologies",
      "area_id" => 2
    ]);

    Program::create([
      "program_name" => "Master's Degree in Strategic Management with a specialization in Telecommunications",
      "area_id" => 2
    ]);

    /**
     *
     * Area 3
     */
    Program::create([
      "program_name" => "Master's Degree in Training of Teachers of Spanish as a Foreign Language",
      "area_id" => 3
    ]);

    Program::create([
      "program_name" => "Master's Degree in Education with a specialization in Higher Education",
      "area_id" => 3
    ]);

    Program::create([
      "program_name" => "Master's Degree in Education with a specialization in Organization and Management of Educational Centers",
      "area_id" => 3
    ]);

    /**
     *
     * Area 4
     */
    Program::create([
      "program_name" => "Master's Degree in Physical Activity: Training and Sports Management",
      "area_id" => 4
    ]);

    Program::create([
      "program_name" => "Master's Degree in Naturopathic Sciences",
      "area_id" => 4
    ]);

    /**
     *
     * Area 5
     */
    Program::create([
      "program_name" => "Master's Degree in Project Design, Management and Direction",
      "area_id" => 5
    ]);

    Program::create([
      "program_name" => "Master's Degree in Design, Management and Project Management with specialization in Innovation and Products",
      "area_id" => 5
    ]);

    Program::create([
      "program_name" => "Master's Degree in Design, Management and Project Management with a specialization in Architecture and Urban Planning",
      "area_id" => 5
    ]);
  }
}
