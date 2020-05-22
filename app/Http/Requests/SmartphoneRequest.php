<?php

namespace App\Http\Requests;

use App\Smartphone;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SmartphoneRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_id' => [
                'required'
            ],
            'name' => [
                'required','unique:smartphones'
            ],
            'image' => [
                'nullable' , 'image' 
            ]
        ];
    }
}
