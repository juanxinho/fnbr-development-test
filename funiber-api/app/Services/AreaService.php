<?php

namespace App\Services;

use App\Repositories\Contracts\AreaRepositoryContract;

/**
 * Class AreaService.
 */
class AreaService
{

    protected $areaRepositoryContract;

    public function __construct(AreaRepositoryContract $areaRepositoryContract)
    {
        $this->areaRepositoryContract = $areaRepositoryContract;
    }

    public function getAreas()
    {
        return $this->areaRepositoryContract->getAreas();
    }

    

}