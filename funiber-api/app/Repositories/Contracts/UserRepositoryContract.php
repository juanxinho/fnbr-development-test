<?php


namespace App\Repositories\Contracts;


interface UserRepositoryContract
{
    /**
     * @param array $data
     * @return mixed
     */
    public function registerUser(array $data);


}