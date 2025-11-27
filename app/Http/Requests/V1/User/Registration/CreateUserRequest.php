<?php

namespace App\Http\Requests\V1\User\Registration;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Изменено на true для регистрации
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'gender_id' => ['required', 'integer', 'exists:user_genders,id'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', 'min:8']
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'gender_id.required' => __('validations.registration.gender_id.required'),
            'gender_id.integer' => __('validations.registration.gender_id.integer'),
            'gender_id.exists' => __('validations.registration.gender_id.exists'),

            'email.required' => __('validations.registration.email.required'),
            'email.string' => __('validations.registration.email.string'),
            'email.email' => __('validations.registration.email.email'),
            'email.unique' => __('validations.registration.email.unique'),

            'password.required' => __('validations.registration.password.required'),
            'password.string' => __('validations.registration.password.string'),
            'password.confirmed' => __('validations.registration.password.confirmed'),
            'password.min' => __('validations.registration.password.min')
        ];
    }
}
