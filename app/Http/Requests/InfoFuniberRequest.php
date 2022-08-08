<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoFuniberRequest extends FormRequest
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
        'names' => 'required|string|max:255',
        'lastnames' => 'required|string|max:255',
        'email' => 'required|email|unique:info_funiber,email',
        'country' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'program_id' => 'required|integer|exists:programs,id',
        'area_id' => 'required|integer|exists:areas,id',
        'phone' => 'required|string|max:10',
      ];
    }
}
