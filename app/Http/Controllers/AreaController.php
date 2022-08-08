<?php

namespace App\Http\Controllers;

use App\Services\Areas\Contract\AreaService;

/**
 * AreaController
 */
class AreaController extends Controller
{

  private $areaService;

  public function __construct(AreaService $areaService) {
    $this->areaService = $areaService;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    return $this->success($this->areaService->findAll());
  }
}
