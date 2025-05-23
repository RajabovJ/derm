<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssesmentRequest extends FormRequest
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
            'skin_type' => 'required|string',
            'family_history' => 'required|in:0,1',
            'sun_exposure_history' => 'required|string',
            'immune_conditions' => 'required|string',
            'removed_nevi_count' => 'required|integer|min:0',
            'lesion_location' => 'required|string',
            'lesion_diameter' => 'required|numeric|min:0',
            'lesion_shape' => 'required|string',
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'birth' => 'required|date',
            'passport' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'gender' => 'required|in:Erkak,Ayol',
            'lesion_photo' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'skin_changes_description'=>'string|max:500',
        ];

    }
    public function messages(): array
    {
        return [
            'name.required' => 'Ism kiritilishi shart.',
            'surname.required' => 'Familiya kiritilishi shart.',
            'birth.required' => 'Tug‘ilgan sana kiritilishi shart.',
            'lesion_photo.required' => 'Lezyon rasmi talab qilinadi.',
            'lesion_photo.image' => 'Faqat rasm fayllari yuklash mumkin.',
            // Qo‘shimcha xatoliklar xabari yozishingiz mumkin
        ];
    }
}
