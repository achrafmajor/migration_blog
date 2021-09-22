<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceStoreRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:400'],
            'slug' => ['required', 'string', 'max:400'],
            'content' => ['required', 'string'],
            'icon' => ['nullable', 'string'],
            'desciption' => ['required', 'string'],
            'seo_titel' => ['required', 'string', 'max:400'],
            'seo_description' => ['required', 'string', 'max:400'],
            'seo_keyword' => ['required', 'string', 'max:400'],
            'content' => ['required', 'string', 'max:400'],
            'statut' => ['required', 'integer'],
            'position' => ['nullable', 'integer'],
            'type' => ['required', 'integer'],
            'image' => "nullable|image",
        ];
    }
}
