@extends('admin.layouts.app')
@section('title','Tashxis haqida')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Tashxis tafsilotlari</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{localized_route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">Tashxis tafsilotlari</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline shadow-sm">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-notes-medical mr-2"></i>
                Tashxis natijalari
            </h3>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <!-- Vertical Nav Tabs -->
                <div class="col-5 col-sm-3 border-right">
                    <div class="nav flex-column nav-pills h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active d-flex align-items-center mb-2" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">
                            <i class="fas fa-user mr-2 text-primary"></i> Bemor maʼlumotlari
                        </a>
                        <a class="nav-link d-flex align-items-center mb-2" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">
                            <i class="fas fa-stethoscope mr-2 text-info"></i> Baholash
                        </a>
                        <a class="nav-link d-flex align-items-center mb-2" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">
                            <i class="fas fa-notes-medical mr-2 text-success"></i> Tashxis natijasi
                        </a>
                        <a class="nav-link d-flex align-items-center mb-2" id="vert-tabs-diagnosis-tab" data-toggle="pill" href="#vert-tabs-diagnosis" role="tab" aria-controls="vert-tabs-diagnosis" aria-selected="false">
                            <i class="fas fa-pen-alt mr-2 text-warning"></i> Tashxis qo‘yish
                        </a>
                        <a class="nav-link d-flex align-items-center mb-2" id="vert-tabs-ai-analysis-tab" data-toggle="pill" href="#vert-tabs-ai-analysis" role="tab" aria-controls="vert-tabs-ai-analysis" aria-selected="false">
                            <i class="fas fa-robot mr-2 text-info"></i> AI Tahlil Natijalari
                        </a>


                    </div>
                </div>

                <!-- Tab Content -->
                <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        <!-- Bemor maʼlumotlari -->
                        <div class="tab-pane fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <h4 class="mb-4 text-primary border-bottom pb-2"><i class="fas fa-user mr-2"></i>Bemor maʼlumotlari</h4>
                            <dl class="row">
                                <dt class="col-sm-4">Ismi:</dt>
                                <dd class="col-sm-8">{{ $patient->name }}</dd>

                                <dt class="col-sm-4">Familiyasi:</dt>
                                <dd class="col-sm-8">{{ $patient->surname }}</dd>

                                <dt class="col-sm-4">Tug‘ilgan sana:</dt>
                                <dd class="col-sm-8">{{ $patient->birth }}</dd>

                                <dt class="col-sm-4">Passport:</dt>
                                <dd class="col-sm-8">{{ $patient->passport }}</dd>

                                <dt class="col-sm-4">Telefon:</dt>
                                <dd class="col-sm-8">{{ $patient->phone }}</dd>

                                <dt class="col-sm-4">Jinsi:</dt>
                                <dd class="col-sm-8">{{ $patient->gender }}</dd>
                            </dl>
                        </div>

                        <!-- Baholash -->
                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                            <h4 class="mb-4 text-info border-bottom pb-2"><i class="fas fa-stethoscope mr-2"></i>Baholash (Assesment)</h4>
                            <dl class="row">
                                <dt class="col-sm-5">Teri turi:</dt>
                                <dd class="col-sm-7">{{ $assesment->skin_type }}</dd>

                                <dt class="col-sm-5">Oilaviy tarix:</dt>
                                <dd class="col-sm-7">{{ $assesment->family_history ? 'Bor' : 'Yo‘q' }}</dd>

                                <dt class="col-sm-5">Quyoshga taʼsir tarixi:</dt>
                                <dd class="col-sm-7">{{ $assesment->sun_exposure_history }}</dd>

                                <dt class="col-sm-5">Immun holatlar:</dt>
                                <dd class="col-sm-7">{{ $assesment->immune_conditions }}</dd>

                                <dt class="col-sm-5">Olib tashlangan nevi soni:</dt>
                                <dd class="col-sm-7">{{ $assesment->removed_nevi_count }}</dd>

                                <dt class="col-sm-5">Lezyon joylashuvi:</dt>
                                <dd class="col-sm-7">{{ $assesment->lesion_location }}</dd>

                                <dt class="col-sm-5">Lezyon diametri:</dt>
                                <dd class="col-sm-7">{{ $assesment->lesion_diameter }} mm</dd>

                                <dt class="col-sm-5">Lezyon shakli:</dt>
                                <dd class="col-sm-7">{{ $assesment->lesion_shape }}</dd>

                                <dt class="col-sm-5">Teri o‘zgarishlari:</dt>
                                <dd class="col-sm-7">{{ $assesment->skin_changes_description }}</dd>
                            </dl>

                            @if ($assesment->image)
                                <div class="mt-4 text-center">
                                    <img src="{{ asset('storage/' . $assesment->image->url) }}" alt="Lezyon rasmi" class="img-fluid img-thumbnail shadow-sm" style="max-height: 300px;">
                                    <p class="mt-2 text-muted"><small>Lezyon rasmi</small></p>
                                </div>
                            @endif
                        </div>

                        <!-- Tashxis natijasi -->
                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                            <h4 class="mb-4 text-success border-bottom pb-2"><i class="fas fa-notes-medical mr-2"></i>Tashxis natijasi</h4>
                            <dl class="row">
                                <dt class="col-sm-4">Natija:</dt>
                                <dd class="col-sm-8">{{ $diagnosisResult->result }}</dd>

                                <dt class="col-sm-4">Tavsif:</dt>
                                <dd class="col-sm-8">{{ $diagnosisResult->message }}</dd>

                                <dt class="col-sm-4">Doktor:</dt>
                                <dd class="col-sm-8">{{ $user->name }}</dd>
                            </dl>
                        </div>

                        <!-- Tashxis qo‘yish (forma joyi) -->
                        <div class="tab-pane fade" id="vert-tabs-diagnosis" role="tabpanel" aria-labelledby="vert-tabs-diagnosis-tab">
                            <h4 class="mb-4 text-warning border-bottom pb-2"><i class="fas fa-pen-alt mr-2"></i>Tashxis qo‘yish</h4>
                            <h5>Bu yerga forma joylashtiriladi</h5>
                        </div>

                        <div class="tab-pane fade" id="vert-tabs-ai-analysis" role="tabpanel" aria-labelledby="vert-tabs-ai-analysis-tab">
                            <h4 class="mb-4 text-info border-bottom pb-2">
                                <i class="fas fa-robot mr-2"></i>AI Tahlil Natijalari
                            </h4>
                            <p>Bu yerga AI tomonidan berilgan tahlil natijalari, grafiklar va boshqa ma'lumotlar joylashtiriladi.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ localized_route('diagnosis.downloadPdf', $diagnosisResult->id) }}" class="btn btn-app bg-danger">
        <span class="badge bg-teal">PDF</span>
        <i class="fas fa-file-download"></i> Yuklab olish
    </a>

</div>

@endsection