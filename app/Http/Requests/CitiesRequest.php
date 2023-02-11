<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitiesRequest extends FormRequest
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
            'fa' => 'required',
            'en' => 'required',
            'tr' => 'required',
            'location' => 'required',
            'image' => 'required',
            'country' => 'required',
            'province' => 'required',
        ];
    }
}
