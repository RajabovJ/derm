@extends('admin.layouts.app')
@section('title','Tashxis qo\'yish')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Tashxis qo'yish</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item "><a href="{{route('patients.create')}}">Bemor qo'shish</a></li>
        <li class="breadcrumb-item active">Tashxis qo'yish</li>
      </ol>
    </div>
  </div>
@endsection
<link rel="stylesheet" href="{{asset('adminlte/plugins/bs-stepper/css/bs-stepper.min.css')}}">
@section('content')
<div style="font-size: 0.9rem;" class="col-md-12">
    <form action="{{ route('assesments.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Tashxis qo'yish</h3>
            </div>

            <div class="card-body p-1">

                <div class="bs-stepper" id="stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#physiological-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="physiological-part" id="physiological-part-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Tibbiy ma'lumotlar</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#image-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="image-part" id="image-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Lezyon rasmi yuklash</span>
                            </button>
                        </div>
                    </div>

                    <div class="bs-stepper-content">
                        <!-- Step 1: Tibbiy ma'lumotlar -->
                        <div id="physiological-part" class="content" role="tabpanel" aria-labelledby="physiological-part-trigger">

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label class="form-label fs-6" for="patient_select">Bemorni tanlash</label>
                                    <select name="patient_id" id="patient_select" class="form-control form-control-sm" required>
                                        <option value="" disabled selected>Bemorni tanlang</option>
                                        @foreach($patients as $patient)
                                            <option value="{{ $patient->id }}">
                                                {{ $patient->name.' '.$patient->surname }} (Passport: {{ $patient->passport }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('patient_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label  class="form-label fs-6" for="skin_type">Terining turi</label>
                                    <select name="skin_type" class="form-control form-control-sm" id="skin_type" required>
                                        <option value="" disabled selected>Terining turini tanlang</option>
                                        <option value="I">I - Doim quyoshda kuydiradi, hech qachon qoraymaydi</option>
                                        <option value="II">II - Oson kuydiradi, biroz qorayadi</option>
                                        <option value="III">III - Ba’zan kuydiradi, o‘rtacha qorayadi</option>
                                        <option value="IV">IV - Kam kuydiradi, oson qorayadi</option>
                                        <option value="V">V - Kam kuydiradi, qorong‘i teri</option>
                                        <option value="VI">VI - Hech qachon kuymaydi, juda qorong‘i teri</option>
                                    </select>
                                    @error('skin_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fs-6" for="family_history">Oilada Melanoma bilan kasallangan inson mavjudmi?</label>
                                    <select name="family_history" class="form-control form-control-sm" id="family_history">
                                        <option value="">Tanlang</option>
                                        <option value="0">Yo‘q</option>
                                        <option value="1">Ha</option>
                                    </select>
                                    @error('family_history')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label  class="form-label fs-6" for="sun_exposure_history">Quyosh ta’siri tarixini tanlang</label>
                                    <select name="sun_exposure_history" id="sun_exposure_history" class="form-control form-control-sm" required>
                                        <option value="" disabled selected>Tanlang</option>
                                        <option value="Kam">Kam (minimal quyosh ta’siri)</option>
                                        <option value="O‘rta">O‘rta (vaqt-vaqti bilan quyoshga ta’sir)</option>
                                        <option value="Ko‘p">Ko‘p (tez-tez va uzoq quyoshda bo‘lish)</option>
                                        <option value="Juda ko‘p">Juda ko‘p (kundalik quyoshda ishlash/yashash)</option>
                                    </select>
                                    @error('sun_exposure_history')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fs-6" for="removed_nevi_count">Olib tashlangan nevilarning soni</label>
                                    <input type="number" name="removed_nevi_count" id="removed_nevi_count" class="form-control form-control-sm @error('removed_nevi_count') is-invalid @enderror" value="{{ old('removed_nevi_count') }}" placeholder="Sonini kiriting">
                                    @error('removed_nevi_count')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fs-6" for="immune_conditions">Immunitet holati</label>
                                    <select name="immune_conditions" id="immune_conditions" class="form-control form-control-sm" required>
                                        <option value="" disabled selected>Tanlang</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Immunitet pasaygan">Immunitet pasaygan (masalan, immunosupressiya, o‘tgan kasalliklar)</option>
                                        <option value="Autoimmun kasalliklar mavjud">Autoimmun kasalliklar mavjud</option>
                                        <option value="Noma’lum">Noma’lum</option>
                                    </select>
                                    @error('immune_conditions')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label fs-6" for="lesion_location">Lezyon joylashuvi</label>
                                    <select name="lesion_location" id="lesion_location" class="form-control form-control-sm" required >
                                        <option value="" disabled selected>Tanlang</option>
                                        <option value="Bosh">Bosh</option>
                                        <option value="Bo‘yin">Bo‘yin</option>
                                        <option value="Qo‘l">Qo‘l</option>
                                        <option value="Qo‘ltiq">Qo‘ltiq</option>
                                        <option value="Tana (torso)">Tana (torso)</option>
                                        <option value="Oyoq">Oyoq</option>
                                        <option value="Orqa">Orqa</option>
                                        <option value="Boshqa">Boshqa</option>
                                    </select>
                                    @error('lesion_location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fs-6" for="lesion_diameter">Lezyon diametri (mm)</label>
                                    <input type="number" step="0.1" name="lesion_diameter" id="lesion_diameter" class="form-control form-control-sm @error('lesion_diameter') is-invalid @enderror" value="{{ old('lesion_diameter') }}" placeholder="Masalan, 3.5">
                                    @error('lesion_diameter')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label fs-6" for="lesion_shape">Lezyon shakli</label>
                                    <select name="lesion_shape" id="lesion_shape" class="form-control form-control-sm" required >
                                        <option value="" disabled selected>Tanlang</option>
                                        <option value="Doira">Doira</option>
                                        <option value="Ellips">Ellips</option>
                                        <option value="Noto‘g‘ri">Noto‘g‘ri</option>
                                        <option value="Boshqa">Boshqa</option>
                                    </select>
                                    @error('lesion_shape')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label  class="form-label fs-6" for="skin_changes_description">Teridagi o‘zgarishlar tavsifi</label>
                                    <textarea name="skin_changes_description" id="skin_changes_description" class="form-control form-control-sm" rows="4" placeholder="Tavsif kiriting...">{{ old('skin_changes_description') }}</textarea>
                                    @error('skin_changes_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary" onclick="stepper.next()">Keyingi</button>
                        </div>



                        <!-- Step 2: Lezyon rasmi yuklash -->
                        <div id="image-part" class="content" role="tabpanel" aria-labelledby="image-part-trigger">
                            <div class="form-group col-md-12">
                                <label class="form-label fs-6" for="lesion_photo">Lezyon rasmi (JPEG, PNG, maksimal 10MB)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="lesion_photo" id="lesion_photo" required>
                                        <label class="custom-file-label fs-6" for="lesion_photo">Fayl tanlang</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Yuklash</span>
                                    </div>
                                </div>
                                @error('lesion_photo')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="button" class="btn btn-secondary" onclick="stepper.previous()">Orqaga</button>
                            <button type="submit" class="btn btn-success">Saqlash</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-center text-muted">
                <small>Iltimos, barcha ma’lumotlarni to‘liq to‘ldiring va tasdiqlang.</small>
            </div>
        </div>
    </form>

    <script>
        // bs-stepperni ishga tushirish
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('#stepper'));
        });

        // custom-file-label fayl nomini ko'rsatish uchun
        document.querySelector('.custom-file-input').addEventListener('change', function(e){
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    </script>

</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })
</script>

<!-- BS-Stepper -->
<script src="{{asset('adminlte/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>

