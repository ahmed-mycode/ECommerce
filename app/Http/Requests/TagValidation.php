<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagValidation extends FormRequest
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
            "name"  => "required_without:id|regex:/^[\pL\s\-]+$/u",
            "slug"  => "required_without:id|unique:tag_translations,slug,".$this->id
        ];
    }

    public function messages()
    {
        return [
            "name.required_without"  => __("admin/tags.name.required"),
            "name.regex"             => __("admin/tags.name.regex"),
            "slug.required_without"  => __("admin/tags.slug.required"),
            "slug.unique"            => __("admin/tags.slug.unique"),
        ];
    }
}
