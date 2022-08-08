<?php

namespace App\Services\Programs\Contract;

interface ProgramService {

  /**
   * List all programs by area
   *
   * @param  mixed $id
   * @return \Illuminate\Database\Eloquent\Collection Program
   */
  public function findAllByArea ($id);
}
