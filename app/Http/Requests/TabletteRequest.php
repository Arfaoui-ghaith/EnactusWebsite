<?php

namespace App\Http\Requests;

use App\Tablette;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TabletteRequest extends FormRequest
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
                'required','unique:tablettes'
            ],
            'image' => [
                'nullable' , 'image' 
            ]
        ];
    }
}
