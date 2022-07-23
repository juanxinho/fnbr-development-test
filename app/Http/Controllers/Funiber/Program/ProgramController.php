<?php

namespace App\Http\Controllers\Funiber\Program;

use App\Http\Controllers\Controller;
use App\Models\Funiber\Program\Program;

class ProgramController extends Controller
{
    /**
     * Método para llamar toda la lista de registro de programas.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPrograms()
    {
        $objProgram = Program::all();

        return response()->json([
            'objProgram' =>  $objProgram
        ]);
    }
}
