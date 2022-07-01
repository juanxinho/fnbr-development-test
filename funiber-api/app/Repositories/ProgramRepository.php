<?php 



namespace App\Repositories;

use App\Models\Program;
use App\Repositories\Contracts\ProgramRepositoryContract;


class ProgramRepository implements ProgramRepositoryContract
{
    public function getProgramByAreaId($areaId)
    {
       // get only name by area_id
        $programs = Program::where('area_id', $areaId)->get(['name']);
        return $programs;
        
    }
    
}