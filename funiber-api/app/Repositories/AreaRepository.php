<?php


namespace App\Repositories;

use App\Models\Area;

use App\Repositories\Contracts\AreaRepositoryContract;


class AreaRepository implements AreaRepositoryContract
{
   
    public function getAreas()
    {
        // get only id and name from the area table
        $areas = Area::select('id', 'name')->get();

        return $areas;
    }
    
    
}