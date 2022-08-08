<?php

namespace App\Http\Controllers;

use App\Services\Programs\Contract\ProgramService;

/**
 * ProgramController
 */
class ProgramController extends Controller
{

  private $programService;

  public function __construct(ProgramService $programService) {
    $this->programService = $programService;
  }

  /**
   * List all programas by area
   *
   * @return \Illuminate\Http\Response
   */
  public function listByArea ($id) {
    $programs = $this->programService
      ->findAllByArea($id);

    return $this->success($programs);
  }
}
