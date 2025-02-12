<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCustomerRecordRequest extends FormRequest
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
            'phone_number' => 'required|exists:employees,phone_number',
            'full_name' => 'required|string',
            'email_address' => 'required|email',
            'password' => 'nullable|min:6',
            'cv' => 'file|mimes:pdf,doc,docx|max:5048|nullable'
        ];
    }
    public function messages(): array
    {
        return [
            'phone_number.exists' => 'Invalid Employee phone number.',
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
        return $this->is('api/*') || $this->expectsJson();
    }
}
