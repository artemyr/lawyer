<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
            'parent_id' => 'integer',
            'name' => 'string',
            'link' => 'string',
            'city_id' => 'nullable|array',
            'city_id.*' => 'integer|min:1',
            'icon_id' => 'nullable|integer|min:1',
        ];
    }
}
