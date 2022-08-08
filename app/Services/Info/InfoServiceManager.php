<?php

namespace App\Services\Info;

use App\Exceptions\Custom\ConflictException;
use App\Mail\InfoContact;
use App\Models\InfoFuniber;
use App\Models\Program;
use App\Services\Info\Contract\InfoService;
use Illuminate\Support\Facades\Mail;

/**
 * InfoServiceManager
 */
class InfoServiceManager implements InfoService {

  public function validatePolicy (InfoFuniber $infoFuniber) : InfoServiceManager {
    if (!$infoFuniber->policy) {
      throw new ConflictException('Debes aceptar las políticas de privacidad.');
    }

    return $this;
  }

  public function sendMail (InfoFuniber $infoFuniber) : InfoServiceManager {
    $program = Program::findOrFail($infoFuniber->program_id);
    Mail::to($infoFuniber->email)->send(new InfoContact($infoFuniber, $program));
    return $this;
  }

  public function saveInfo (InfoFuniber $infoFuniber) {
    $infoFuniber->save();
    return $infoFuniber;
  }
}
