<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSubcategoryValidation extends FormRequest
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
            "parent_id" => "required|exists:categories,id",
            "name"      => "required|regex:/^[\pL\s\-]+$/u",
            "slug"      => "required|unique:categories,slug",
        ];
    }

    public function messages()
    {
        return [
            "parent_id.required" => __("admin/category.subname.required"),
            "parent_id.exist"    => __("admin/category.subname.required"),
            "name.required"      => __("admin/category.subname.required"),
            "name.regex"         => __("admin/category.name.regex"),
            "slug.required"      => __("admin/category.slug.required"),
            "slug.unique"        => __("admin/category.slug.unique"),
        ];
    }
}
