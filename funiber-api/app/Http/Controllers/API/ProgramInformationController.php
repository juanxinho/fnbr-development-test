<?php

namespace App\Http\Controllers\API;


use App\Services\UserService;
use App\Helpers\ResponseHelper;
use App\Mail\AccessProgramMailable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterInfoRequest;

class ProgramInformationController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var ResponseHelper
     */
    protected $responseHelper;

    /**
     *  constructor.
     * @param UserService $userService
     * @param ResponseHelper $responseHelper
     */
    
    public function __construct(
        UserService $userService,
        ResponseHelper $responseHelper,

    ) {
        $this->userService = $userService;
        $this->responseHelper = $responseHelper;
    }

    /**
     * @param RegisterInfoRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterInfoRequest $request)
    {
        $user = $this->userService->registerUserInfo($request->all());

      
        echo $request;
        if ($user) {
           
            Mail::to($user->email)->send(new AccessProgramMailable($user));
            return $this->responseHelper->successResponse(true, 'Register to program Funiber, Email Sent', $user);
        }

        return $this->responseHelper->errorResponse(false, 'Email not sent', 404);
    }
}