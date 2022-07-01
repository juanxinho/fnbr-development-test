<?php

namespace App\Services;

use App\Repositories\Contracts\ProgramRepositoryContract;

/**
 * Class ProgramService.
 */
class ProgramService
{
    protected $programRepositoryContract;
    
    public function __construct(ProgramRepositoryContract $programRepositoryContract)
    {
        $this->programRepositoryContract = $programRepositoryContract;
    }
    
    public function getProgramsByAreaId($areaId)
    {
        return $this->programRepositoryContract->getProgramByAreaId($areaId);
    }
    

}