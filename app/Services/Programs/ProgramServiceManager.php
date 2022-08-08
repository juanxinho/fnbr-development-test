<?php

namespace App\Services\Programs;

use App\Http\Resources\ProgramResource;
use App\Models\Program;
use App\Services\Programs\Contract\ProgramService;

/**
 * ProgramServiceManager
 */
class ProgramServiceManager implements ProgramService {

  public function findAllByArea ($id) {
    $programs = Program::where('area_id', $id)
      ->orderBy('id')
      ->get();

    return ProgramResource::collection($programs);
  }
}
