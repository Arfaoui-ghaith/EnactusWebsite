<?php

namespace App\Http\Requests;

use App\Member;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'name' => [
                'required'
            ],
            'role' => [
                'required'
            ],
            'image' => [
                'nullable' , 'image' 
            ],
            'description' => [
                'required'
            ],
            'facebook' => [
                'nullable' , 'url'
            ],
            'instagram' => [
                'nullable' , 'url'
            ],
            'gmail' => [
                'nullable' , 'url'
            ]

        ];
    }
}
