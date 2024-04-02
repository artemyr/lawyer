<?php

namespace App\Http\Requests\Instation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstationRequest extends FormRequest
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
            'name' => 'string',
            'link' => 'string',
            'icon_id' => 'integer|nullable',
            'sort' => 'integer|nullable',
            'instation_type_id' => 'integer',
            'city_id' => 'integer',
            'district' => 'string|nullable',
            'address' => 'string|nullable',
            'telephone' => 'string|nullable',
            'opening_hours' => 'string|nullable',
        ];
    }
}
