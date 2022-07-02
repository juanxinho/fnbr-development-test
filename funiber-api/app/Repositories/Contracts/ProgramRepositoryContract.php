<?php


namespace App\Repositories\Contracts;


interface ProgramRepositoryContract
{
    /**
     * @param array $data
     * @return mixed
     */
    public function getProgramByAreaId($areaId);


}