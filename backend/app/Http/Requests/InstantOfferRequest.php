<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstantOfferRequest extends FormRequest
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
            'email'          => ['required', 'email', 'between:0,255'],
            'address'        => ['required', 'string'],
            'city'           => ['required', 'string', 'between:0,255'],
            'state'          => ['required', 'string', 'size:2'],
            'zip'            => ['required', 'integer', 'digits:5'],
            'bedrooms'       => ['required', 'integer',  'between:0,255'],
            'bathrooms'      => ['required', 'integer', 'between:0,255'],
            'square_footage' => ['required', 'integer', 'between:0,65535'],
        ];
    }
}
