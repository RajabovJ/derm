<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'birth' => 'required|date',
            'passport' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:Erkak,Ayol',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Ism kiritilishi shart.',
            'surname.required' => 'Familiya kiritilishi shart.',
            'birth.required' => 'Tug‘ilgan sana kiritilishi shart.',
        ];
    }
}
