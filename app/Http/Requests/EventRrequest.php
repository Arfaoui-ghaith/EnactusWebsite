<?php

namespace App\Http\Requests;

use App\Event;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EventRrequest extends FormRequest
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
            'title' => [
                'required'
            ],
            'image' => [
                'required'
            ],
            'date' => [
                'required' , 'date'
            ],
            'description' => [
                'nullable'
            ],
            'lien_formulaire' => [
                'nullable' , 'url'

            ]
        ];
    }
}
