<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminEditProfile extends FormRequest
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
            'name'  => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:admins,email,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => __('admin/sidebar.name.required'),
            'name.regex'     => __('admin/sidebar.name.regex'),
            'email.required' => __('admin/sidebar.email.required'),
            'email.email'    => __('admin/sidebar.email.email'),
        ];
    }
}
