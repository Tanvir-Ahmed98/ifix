<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
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
            'name' => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'The name field is required',
            'password.required'=>'The password field is required',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator) : void
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => 'Validation failed!',
            'errors' => $validator->errors()
        ], 422));
    }
}