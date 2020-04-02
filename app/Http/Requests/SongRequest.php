<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
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
        $rules = [
            'id' => 'integer|unique:songs,title',
            'title' => 'required|string|unique:songs,title',
            'isActive' => 'required|boolean'
        ];

        switch ($this->getMethod())
        {
            case 'POST':
                return $rules;
            case 'PUT':
                return [
                        'title' => [
                            'required|string|exists:songs,id\'',
                            Rule::unique('songs')->ignore($this->title, 'title')
                        ]
                    ] + $rules;
            case 'DELETE':
                return [
                    'id' => 'required|integer|exists:songs,id'
                ];
        }
    }
}
