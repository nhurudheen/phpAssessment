<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateEmployeeRequest extends FormRequest
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
            'full_name' => 'required|string',
            'phone_number' => 'required|numeric|unique:employees,phone_number',
            'email_address' => 'required|email|unique:employees,email_address',
            'password' => 'required|min:6',
            'cv' => 'file|mimes:pdf,doc,docx|max:5048|nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'email_address.unique' => 'The email address already exists. Please use a different one.',
            'phone_number.unique' => 'The phone number already exists. Please use a different one.',
            'password.min' => 'The password must be at least 6 characters long.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        if ($this->expectsJson() || $this->isApiRequest()) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => 'Invalid data provided',
                'errors' => $validator->errors(),
            ], 422));
        }
        parent::failedValidation($validator);
    }

    private function isApiRequest(): bool
    {
        return $this->is('api/*') || $this->wantsJson();
    }
}
