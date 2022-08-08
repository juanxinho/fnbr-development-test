<?php

namespace App\Services\Areas\Contract;

interface AreaService {

  /**
   *
   * List all areas
   *
   * @return \Illuminate\Database\Eloquent\Collection Area
   */
  public function findAll ();
}
