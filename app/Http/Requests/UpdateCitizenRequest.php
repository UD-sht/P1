<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCitizenRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'nullable|string|max:255',
            'citizenship_no' => 'nullable|string|max:255',
            'citizenship_issue_date' => 'nullable|date',
            'contact_no' => 'nullable|string|max:255',
            'email' => 'nullable|email',
         
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'full_name.required' => 'Full name is required',
    //         'citizenship_no.required' => 'Citizenship number is required',
    //         'citizenship_issue_date.required' => 'Citizenship issue date is required',
    //         'contact_no.required' => 'Contact number is required',
    //         'email.required' => 'Email address is required',
    //     ];
    // }
}
