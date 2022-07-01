<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Services\ProgramService;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{
      /**
     * @var ProgramService
     
     */
    protected $programService;

     /**
     * @var ResponseHelper
     */
    protected $responseHelper;

    /**
     *  constructor.
     * @param ProgramService $programService
     * @param ResponseHelper $responseHelper
     */
    public function __construct(
        ProgramService $programService,
        ResponseHelper $responseHelper,
    ) {
        $this->programService = $programService;
        $this->responseHelper = $responseHelper;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProgramsByAreaId($areaId)
    {
        $programs = $this->programService->getProgramsByAreaId($areaId);

        if ($programs) {
            return $this->responseHelper->successResponse(true, 'Programs available', $programs);
        }

        return $this->responseHelper->errorResponse(false, 'Programs not found', 404);
    }
    

}