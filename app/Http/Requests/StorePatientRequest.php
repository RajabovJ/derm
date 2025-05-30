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
        'passport' => [
            'required',
            'regex:/^[A-Z]{2}[0-9]{7}$/'
        ],
        'phone' => [
            'required',
            'regex:/^\+998\s\(\d{2}\)\s\d{3}-\d{2}-\d{2}$/'
        ],
        'gender' => 'required|in:Erkak,Ayol',
    ];
}

public function messages(): array
{
    return [
        'name.required' => 'Ism kiritilishi shart.',
        'surname.required' => 'Familiya kiritilishi shart.',
        'birth.required' => 'Tug‘ilgan sana kiritilishi shart.',
        'passport.required' => 'Pasport seriyasi kiritilishi shart.',
        'passport.regex' => 'Pasport formati noto‘g‘ri. Masalan: AB1234567',
        'phone.required' => 'Telefon raqami kiritilishi shart.',
        'phone.regex' => 'Telefon raqami formati noto‘g‘ri. Masalan: +998 (90) 123-45-67',
        'gender.required' => 'Jins tanlanishi shart.',
        'gender.in' => 'Jins faqat Erkak yoki Ayol bo‘lishi kerak.',
    ];
}

}
