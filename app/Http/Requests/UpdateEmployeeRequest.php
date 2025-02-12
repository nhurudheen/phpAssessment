<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateEmployeeRequest extends FormRequest
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
            'id' => 'exists:employees,id',
            'full_name' => 'required|string',
            'phone_number' => 'required|numeric',
            'email_address' => 'required|email',
            'password' => 'nullable|min:6',
            'cv' => 'file|mimes:pdf,doc,docx|max:5048|nullable'
        ];
    }

    public function messages(): array
    {
        return [
            'id.exists' => 'Invalid Employee id.',
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
