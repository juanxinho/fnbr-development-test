<?php


namespace App\Repositories;

use App\Models\Area;

use App\Repositories\Contracts\AreaRepositoryContract;


class AreaRepository implements AreaRepositoryContract
{
   
    public function getAreas()
    {
  
        $areas = Area::select('id', 'name')->get();

        return $areas;
    }
    
    
}