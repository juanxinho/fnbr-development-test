<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryContract;

/**
 * Class UserService.
 */
class UserService
{
    protected $userRepositoryContract;

    public function __construct(UserRepositoryContract $userRepositoryContract)
    {
        $this->userRepositoryContract = $userRepositoryContract;
    }

    public function registerUserInfo(array $data)
    {

        echo response()->json($data);
        $userData = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'area_id' => $data['area_id'],
        ];

        $newUser = $this->userRepositoryContract->registerUser($userData);

        return $newUser;
    }


}