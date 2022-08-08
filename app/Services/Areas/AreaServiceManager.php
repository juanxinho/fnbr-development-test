<?php

namespace App\Services\Areas;

use App\Http\Resources\AreaResource;
use App\Models\Area;
use App\Services\Areas\Contract\AreaService;

/**
 * AreaServiceManager
 */
class AreaServiceManager implements AreaService {

  public function findAll () {
    $areas = Area::orderBy('id')->get();
    return AreaResource::collection($areas);
  }
}
