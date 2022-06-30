<?php

namespace App\Models\Funiber\Form\Traits;

use Illuminate\Support\Facades\Validator;

trait FormRules
{
    //Reglas para la creación de registros
    public static function createdRules($obj)
    {
        $messages = [
            'name.required' => 'The :attribute is required.',
            'name.max' => 'The :attribute must not be greater than :max',
            'lastname.required' => 'The :attribute is required.',
            'lastname.max' => 'The :attribute must not be greater than :max',
            'email.required' => 'The :attribute is required.',
            'email.max' => 'The :attribute must not be greater than :max',
            'email.unique' => 'The :attribute is already registered',
            'phone.required' => 'The :attribute is required.',
            'phone.max' => 'The :attribute must not be greater than :max',
            'country.required' => 'The :attribute is required.',
            'country.max' => 'The :attribute must not be greater than :max',
            'state.required' => 'The :attribute is required.',
            'state.max' => 'The :attribute must not be greater than :max',
            'city.required' => 'The :attribute is required.',
            'city.max' => 'The :attribute must not be greater than :max',
            'comments.max' => 'The :attribute must not be greater than :max',
            'policy_acceptance_check.required' => 'The :attribute is required.',
            'policy_acceptance_check.max' => 'The :attribute must not be greater than :max',
            'city.required' => 'The :attribute is required.',
            'city.max' => 'The :attribute must not be greater than :max',
            'program_id.required' => 'The :attribute is required.',
            'program_id.max' => 'The :attribute must not be greater than :max',
            'area_id.required' => 'The :attribute is required.',
            'area_id.max' => 'The :attribute must not be greater than :max',
        ];

        return Validator::make(
            $obj,
            [
                'name' => 'max:99|required',
                'lastname'  => 'max:99|required',
                'email' => 'max:200|required|email|unique:forms,email',
                'phone' => 'max:99|required',
                'country' => 'max:99|required',
                'state' => 'max:99|required',
                'city'  => 'max:99|required',
                'comments' => 'max:250',
                'policy_acceptance_check' => 'max:3|required',
                'program_id' => 'max:36|required',
                'area_id' => 'max:36|required',
            ],
            $messages
        );
    }
}
