<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // Maks 2MB rasm
            'visibility' => 'required|in:public,doctor_only',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Sarlavha majburiy.',
            'title.max' => 'Sarlavha maksimal 255 ta belgidan iborat bo‘lishi kerak.',
            'image_url.image' => 'Fayl rasm bo‘lishi kerak.',
            'image_url.mimes' => 'Rasm faqat jpeg, png, jpg yoki gif formatida bo‘lishi kerak.',
            'image_url.max' => 'Rasm hajmi maksimal 2MB bo‘lishi kerak.',
            'visibility.required' => 'Ko‘rinish maydoni majburiy.',
            'visibility.in' => 'Ko‘rinish faqat public yoki doctor_only bo‘lishi mumkin.',
        ];
    }
}
