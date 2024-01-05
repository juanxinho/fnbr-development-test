<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Country, State, City};
use App\Models\{Area, Program};

class DropdownController extends Controller
{
    public function getCountries(){
        $data = Country::get(['name', 'id']);
        return response()->json($data);
    }

    public function getStates(Request $request)
    {
        $data = State::where('country_id', $request->country_id)->get(['name', 'id']);

        return response()->json($data);
    }

    public function getCities(Request $request)
    {
        $data = City::where('state_id', $request->state_id)->get(['name', 'id']);

        return response()->json($data);
    }

    public function getAreas(){
        $data = Area::get(['name', 'id']);
        return response()->json($data);
    }

    public function getPrograms(Request $request)
    {
        $data = Program::where('area_id', $request->area_id)->get(['name', 'id']);

        return response()->json($data);
    }
}
