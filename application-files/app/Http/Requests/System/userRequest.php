<?php

namespace App\Http\Requests\System;

use App\Rules\system\UniqueCaseSenstiveValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class userRequest extends FormRequest
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
        $id = $this->route('user');

        $validate = [
            'name' => 'required|string|min:3|max:255',
        ];
        if ($request->method() == 'POST') {
            $validate = array_merge($validate, [
                'email' => ['required', 'string', 'max:255', new UniqueCaseSenstiveValidation('users', 'email')],
                'password' => 'required|confirmed|min:6|max:50',
                'password_confirmation' => 'required',
            ]);
        }
        if ($request->method() == 'PUT') {
            $validate = array_merge($validate, [
                'email' => ['required', 'string', 'max:255', new UniqueCaseSenstiveValidation('users', 'email', $id)],
            ]);
        }
        return $validate;
    }
}
