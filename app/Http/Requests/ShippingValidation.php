<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingValidation extends FormRequest
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
            'value' => 'required|regex:/^[\pL\s\-]+$/u',
            'plain_value' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'value.required' => __('admin/sidebar.value.required'),
            'value.regex' => __('admin/sidebar.value.regex'),
            'plain_value.required' => __('admin/sidebar.plain_value.required'),
            'plain_value.numeric' => __('admin/sidebar.plain_value.numeric'),
        ];
    }
}
