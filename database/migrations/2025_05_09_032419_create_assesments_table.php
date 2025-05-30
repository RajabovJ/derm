<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function rules(): array
    {
        return [
            'patient_id' => 'required|exists:patients,id',
            'skin_type' => 'required|string|max:255',
            'family_history' => 'required|in:0,1',
            'sun_exposure_history' => 'required|string|max:1000',
            'immune_conditions' => 'required|string|max:1000',
            'removed_nevi_count' => 'required|integer|min:0',
            'lesion_location' => 'required|string|max:255',
            'lesion_diameter' => 'required|numeric|min:0',
            'lesion_shape' => 'required|string|max:255',
            'lesion_photo' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'skin_changes_description' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'patient_id.required' => 'Bemor tanlanishi shart.',
            'patient_id.exists' => 'Tanlangan bemor bazada topilmadi.',
            'skin_type.required' => 'Teri turi ko‘rsatilishi kerak.',
            'family_history.required' => 'Oilaviy anamnez tanlanishi kerak.',
            'family_history.in' => 'Oilaviy anamnez faqat 0 yoki 1 bo‘lishi kerak.',
            'sun_exposure_history.required' => 'Quyoshga ta’sir tarixi kiritilishi kerak.',
            'immune_conditions.required' => 'Immun holatlari kiritilishi kerak.',
            'removed_nevi_count.required' => 'Nevuslar soni ko‘rsatilishi kerak.',
            'removed_nevi_count.integer' => 'Nevuslar soni butun son bo‘lishi kerak.',
            'removed_nevi_count.min' => 'Nevuslar soni manfiy bo‘lishi mumkin emas.',
            'lesion_location.required' => 'Lezyon joylashuvi ko‘rsatilishi kerak.',
            'lesion_diameter.required' => 'Lezyon diametri kiritilishi kerak.',
            'lesion_diameter.numeric' => 'Lezyon diametri raqam bo‘lishi kerak.',
            'lesion_diameter.min' => 'Lezyon diametri manfiy bo‘lishi mumkin emas.',
            'lesion_shape.required' => 'Lezyon shakli kiritilishi kerak.',
            'lesion_photo.required' => 'Lezyon rasmi talab qilinadi.',
            'lesion_photo.image' => 'Faqat rasm fayllarini yuklash mumkin.',
            'lesion_photo.mimes' => 'Faqat jpeg, png yoki jpg formatidagi rasm bo‘lishi kerak.',
            'lesion_photo.max' => 'Rasm hajmi 10MB dan oshmasligi kerak.',
            'skin_changes_description.max' => 'Teri o‘zgarishlari matni 500 belgidan oshmasligi kerak.',
        ];
    }

    public function down(): void
    {
        Schema::dropIfExists('assesments');
    }
};
