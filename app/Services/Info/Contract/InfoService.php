<?php

namespace App\Services\Info\Contract;

use App\Models\InfoFuniber;

interface InfoService {

  /**
   * Validate if policy has check
   *
   * @return InfoService
   */
  public function validatePolicy (InfoFuniber $infoFuniber);

  /**
   * saveInfo
   *
   * @param  mixed $infoFuniber
   * @return \App\Models\InfoFuniber
   */
  public function saveInfo (InfoFuniber $infoFuniber);

  /**
   * sendMail
   *
   * @param  mixed $infoFuniber
   * @return \App\Models\InfoFuniber
   */
  public function sendMail (InfoFuniber $infoFuniber);
}
