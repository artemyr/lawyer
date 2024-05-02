<?php

namespace App\Http\Requests\InstationType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstationTypeUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'link' => 'required|string|max:255',
            'icon_id' => 'nullable|integer|min:1|exists:icons,id',
            'city_id' => 'required|array',
            'city_id.*' => 'integer|min:1|exists:cities,id',
        ];
    }
}
