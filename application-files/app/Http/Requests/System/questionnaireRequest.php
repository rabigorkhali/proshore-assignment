<?php

namespace App\Http\Requests\system;

use Illuminate\Http\Request;


use Illuminate\Foundation\Http\FormRequest;

class questionnaireRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $validate = [
            'title' => 'required|string|max:255|min:4',
            'expiry_date' => 'date|required|after:today'
        ];
        return $validate;
    }
}
