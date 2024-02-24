<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'active' => 'boolean',
            'sort' => 'integer',
            'parent_id' => [
                'integer',
                Rule::exists('categories', 'id')
            ],
            'name' => 'string',
            'link' => 'string',
            'city_id' => [
                'integer',
                Rule::exists('cities', 'id')
            ],
            'icon_id' => [
                'integer',
                Rule::exists('icons', 'id')
            ]
        ];
    }
}
