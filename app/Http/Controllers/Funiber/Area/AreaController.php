<?php

namespace App\Http\Controllers\Funiber\Area;

use App\Http\Controllers\Controller;
use App\Models\Funiber\Area\Area;

class AreaController extends Controller
{
    /**
     * Método para llamar toda la lista de registro de áreas.
     *
     * @return \Illuminate\Http\Response
     */

    public function getAreas()
    {
        $objArea = Area::all();

        return response()->json([
            'objArea' =>  $objArea
        ]);
    }
}
