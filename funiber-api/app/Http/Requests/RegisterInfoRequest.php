<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

   /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|min:2',   
            'last_name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            'area_id' => 'required|exists:areas,id',
            'program_id' => 'required|exists:programs,id',
            
        ];
    }
}