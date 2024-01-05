<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\DatosMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:100', 'regex:/^[A-Za-z]+$/', 'alpha'],
            'lastname' => ['required', 'max:100', 'regex:/^[A-Za-z]+$/', 'alpha'],
            'email' => ['required', 'email', Rule::unique('users')],
            'phone' => ['required', 'numeric', 'digits:10', Rule::unique('users')],
        ], [
            'name.regex' => 'The name field should only contain alphabetic characters.',
            'lastname.regex' => 'The lastname field should only contain alphabetic characters.',
            'phone.digits' => 'The phone field must be exactly 10 digits.',
            'email.unique' => 'The email address has already been taken.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'message' => 'Validation failed'], 422);
        }

        $input = $request->input();

        $e = User::with('country', 'state', 'city', 'area', 'program')->create([
            'name' => $input['name'],
            'lastname' => $input['lastname'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'country_id' => $input['country_id'],
            'state_id' => $input['state_id'],
            'city_id' => $input['city_id'],
            'area_id' => $input['area_id'],
            'program_id' => $input['program_id'],
            'comments' => $input['comments'],
            'policy_acceptance_check' => $input['policy_acceptance_check'],
        ]);

        Mail::to($e->email)->send(new DatosMail($e));

        return response()->json([
            'data' => $e,
            'message' => "User registered successfully",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
