<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Area::create([
        'name' => 'Department of Environment and Sustainability'
      ]);

      Area::create([
        'name' => 'Department of Innovation, Business and New Technologies'
      ]);

      Area::create([
        'name' => 'Department of Language, Education and Communications Sciences'
      ]);

      Area::create([
        'name' => 'Department of Health Sciences'
      ]);

      Area::create([
        'name' => 'Department of Projects'
      ]);
    }
}
