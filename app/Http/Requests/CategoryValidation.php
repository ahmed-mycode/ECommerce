<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidation extends FormRequest
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
            "name" => "required|regex:/^[\pL\s\-]+$/u",
            "slug" => "required|unique:categories,slug,".$this->id
        ];
    }

    public function messages()
    {
        return [
            "name.required" => __("admin/category.name.required"),
            "name.regex" => __("admin/category.name.regex"),
            "slug.required" => __("admin/category.slug.required"),
        ];
    }
}
