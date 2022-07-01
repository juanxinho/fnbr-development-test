<?php

namespace App\Http\Controllers\API;

use App\Services\AreaService;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
     /**
     * @var AreaService
     */
    protected $areaService;

     /**
     * @var ResponseHelper
     */
    protected $responseHelper;

        /**
     *  constructor.
     * @param AreaService $userService
     * @param ResponseHelper $responseHelper
     */

     public function __construct(
         AreaService $areaService,
         ResponseHelper $responseHelper,
     ) {
         $this->areaService = $areaService;
         $this->responseHelper = $responseHelper;
     }

         /**
        * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    
    public function getAreas()
     {
            $areas = $this->areaService->getAreas();
    
           if($areas) {
               return $this->responseHelper->successResponse(true, 'Areas available', $areas);
           }

              return $this->responseHelper->errorResponse(false, 'Areas not found', 404);   
     }
       
    
}