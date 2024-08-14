<?php

namespace App\Http\Requests\citizen;

use Illuminate\Foundation\Http\FormRequest;

class CitizenFormRequest extends FormRequest
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
            'citizenship_no' => 'required|string|max:255',
            'citizenship_issue_date' => 'required|date',
            'f_name' => 'required|string|max:255',
            'm_name' => 'nullable|string|max:255',
            'l_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            't_province' => 'required|string|max:255',
            't_district' => 'required|string|max:255',
            't_municipality' => 'required|string|max:255',
            't_ward_no' => 'required|integer',
            't_tole' => 'nullable|string|max:255',
            'f_fname' => 'nullable|string|max:255',
            'm_fname' => 'nullable|string|max:255',
            'l_fname' => 'nullable|string|max:255',
            'f_mname' => 'nullable|string|max:255',
            'm_mname' => 'nullable|string|max:255',
            'l_mname' => 'nullable|string|max:255',
            'f_gname' => 'nullable|string|max:255',
            'm_gname' => 'nullable|string|max:255',
            'l_gname' => 'nullable|string|max:255',
            'contact_no' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'gender' => 'required|string|max:10',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'citizenship_no.required' => 'Citizenship No is required.',
            'citizenship_no.max' => 'Citizenship No cannot exceed 255 characters.',
            'citizenship_issue_date.required' => 'Citizenship Issue Date is required.',
            'citizenship_issue_date.date' => 'Citizenship Issue Date must be a valid date format.',
            'f_name.required' => 'First Name is required.',
            'f_name.max' => 'First Name cannot exceed 255 characters.',
            'l_name.required' => 'Last Name is required.',
            'l_name.max' => 'Last Name cannot exceed 255 characters.',
            'full_name.required' => 'Full Name is required.',
            'full_name.max' => 'Full Name cannot exceed 255 characters.',
            't_province.required' => 'Province is required.',
            't_province.max' => 'Province cannot exceed 255 characters.',
            't_district.required' => 'District is required.',
            't_district.max' => 'District cannot exceed 255 characters.',
            't_municipility.required' => 'Municipality is required.',
            't_municipility.max' => 'Municipality cannot exceed 255 characters.',
            't_ward_no.required' => 'Ward No is required.',
            't_ward_no.integer' => 'Ward No must be an integer.',
            'contact_no.required' => 'Contact No is required.',
            'contact_no.max' => 'Contact No cannot exceed 15 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'gender.required' => 'Gender is required.',
        ];
    }
}
