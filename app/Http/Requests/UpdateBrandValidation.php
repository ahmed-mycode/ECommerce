<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandValidation extends FormRequest
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
            "name"  => "required|regex:/^[\pL\s\-]+$/u",
            "photo" => "required_without:id|mimes:jpeg,jpg,png",
        ];
    }

    public function messages()
    {
        return [
            "name.required"  => __("admin/brand.name.required"),
            "name.regex"     => __("admin/brand.name.regex"),
            "photo.required" => __("admin/brand.photo.required"),
            "photo.mimes"    => __("admin/brand.photo.mimes"),
        ];
    }
}
