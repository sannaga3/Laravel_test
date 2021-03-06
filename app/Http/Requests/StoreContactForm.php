<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactForm extends FormRequest
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
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:50',
            'url' => 'url|nullable',
            'age' => 'required',
            'gender' => 'required',
            'title' => 'required|string|max:50',
            'content' => 'required|string|max:200',
            'caution' => 'required|accepted',
        ];
    }
}
