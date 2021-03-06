<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqStoreRequest extends FormRequest
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
            'ordre' => ['required', 'integer'],
            'title' => ['required', 'string', 'max:400'],
            'content' => ['required', 'string'],
            'statut' => ['required', 'integer'],
        ];
    }
}
