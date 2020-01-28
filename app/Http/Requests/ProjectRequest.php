<?php

namespace App\Http\Requests;

use App\Project;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'first_title' => [
                'required'
            ],
            'title' => [
                'required'
            ],
            'image' => [
                'nullable' , 'image'  
            ],
            'description' => [
                'required'
            ],
            'goals' => [
                'required' 
            ]
           
        ];
    }
}
