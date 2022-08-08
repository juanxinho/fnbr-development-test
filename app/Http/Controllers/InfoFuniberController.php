<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoFuniberRequest;
use App\Models\InfoFuniber;
use App\Services\Info\Contract\InfoService;

/**
 * InfoFuniberController
 */
class InfoFuniberController extends Controller
{

  private $infoService;

  public function __construct(InfoService $infoService) {
    $this->infoService = $infoService;
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(InfoFuniberRequest $request)
  {
    $infoFuniber = new InfoFuniber($request->all());
    $info = $this->infoService
      ->validatePolicy($infoFuniber)
      ->sendMail($infoFuniber)
      ->saveInfo($infoFuniber);

    return $info;
  }
}
