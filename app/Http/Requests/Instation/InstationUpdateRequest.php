<?php

namespace App\Http\Requests\Instation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstationUpdateRequest extends FormRequest
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
            'name' => 'string|required|max:255',
            'link' => 'string|required|max:255',
            'icon_id' => 'nullable|integer|min:1|exists:icons,id',
            'sort' => 'nullable|integer',
            'instation_type_id' => 'integer|required|exists:instation_types,id',
            'city_id' => 'required|array',
            'city_id.*' => 'integer|min:1|exists:cities,id',
            'district' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'opening_hours' => 'nullable|string|max:255',
        ];
    }
}
