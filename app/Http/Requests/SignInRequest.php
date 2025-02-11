<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email_address' => ['required','string', 'email'],
            'password' => ['required', 'string']
        ];
    }

    public function messages() : array
    {
        return[
            'email_address.required' => 'Kindly enter your email address',
            'password.required' => 'Kindly enter your password'
        ];
    }
}
