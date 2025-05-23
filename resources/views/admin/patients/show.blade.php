@extends('doctor.layouts.app')
@section('title','Bemor  haqida')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Bemor haqida</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item "><a href="{{route('patients.index')}}">Mening bemorlarim</a></li>
        <li class="breadcrumb-item active">Bemor  haqida</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="col-md-12">
    @foreach ($assesments as $assesment)
    <div class="timeline">
        <div class="time-label">
          <span class="bg-red">{{$assesment->created_at->format('d.m.Y')}}</span>
        </div>
        <div>
            <i class="fas fa-user bg-info rounded-circle text-white"></i>

          <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i>{{$assesment->created_at->format('H:i')}}</span>
            <h3 class="timeline-header"><a href="#">Bemor tafsilotlari</a> {{$assesment->patient->name.' '.$assesment->patient->surname}}</h3>
            <div class="timeline-body">
                @forelse ($assesments as $assesment)
                <div class="mb-4 p-3 rounded bg-light border shadow-sm">
                    <dl class="row">
                        <dt class="col-sm-5">Terining turi:</dt>
                        <dd class="col-sm-7">{{ $assesment->skin_type ?? 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Oilaviy tarix:</dt>
                        <dd class="col-sm-7">{{ $assesment->family_history ?? 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Quyosh nurlanish tarixi:</dt>
                        <dd class="col-sm-7">{{ $assesment->sun_exposure_history ?? 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Immun holatlari:</dt>
                        <dd class="col-sm-7">{{ $assesment->immune_conditions ?? 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Olib tashlangan nevuslar soni:</dt>
                        <dd class="col-sm-7">{{ $assesment->removed_nevi_count ?? 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Lezyon joylashuvi:</dt>
                        <dd class="col-sm-7">{{ $assesment->lesion_location ?? 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Teri o‘zgarishlari:</dt>
                        <dd class="col-sm-7">{{ $assesment->skin_changes_description ?? 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Lezyon diametri:</dt>
                        <dd class="col-sm-7">{{ $assesment->lesion_diameter ? $assesment->lesion_diameter . ' mm' : 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Lezyon shakli:</dt>
                        <dd class="col-sm-7">{{ $assesment->lesion_shape ?? 'Kiritilmagan' }}</dd>
                    </dl>
                </div>
            @empty
                <p>Bemor uchun hali hech qanday baholash ma’lumotlari mavjud emas.</p>
            @endforelse

            </div>
            {{-- <div class="timeline-footer">
              <a class="btn btn-primary btn-sm">Read more</a>
              <a class="btn btn-danger btn-sm">Delete</a>
            </div> --}}
          </div>
        </div>

        <div>
          <i class="fas fa-check-circle bg-success rounded-circle text-white"></i>
          <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{$assesment->diagnosisResult->created_at->format('H:i')}}</span>
            <h3 class="timeline-header"><a href="#">Tashxis natijasi</a> {{$assesment->patient->name.' '.$assesment->patient->surname}} </h3>
            <div class="timeline-body">
                @forelse ($assesments as $assesment)
                <div class="mb-4 p-3 rounded bg-light border shadow-sm">
                    <dl class="row">
                        <dt class="col-sm-5">Diagnostika natijasi</dt>
                        <dd class="col-sm-7">{{ $assesment->diagnosisResult->result ?? 'Kiritilmagan' }}</dd>

                        <dt class="col-sm-5">Tashxisga izoh</dt>
                        <dd class="col-sm-7">{{ $assesment->diagnosisResult->message ?? 'Kiritilmagan' }}</dd>
                    </dl>
                </div>
                @if ($assesment->doctorDiagnoses && $assesment->doctorDiagnoses->count())
                    @foreach ($assesment->doctorDiagnoses as $doctorDiagnosis)
                        <div class="post">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="{{ asset('storage'.$doctorDiagnosis->user->image->url) }}" alt="user image">
                                <span class="username">
                                    <a href="#">{{ $doctorDiagnosis->user->name . ' ' . $doctorDiagnosis->user->surname }}</a>
                                </span>
                                <span class="description">Tashxis qo'yilgan vaqt - {{ $doctorDiagnosis->created_at->format('d.m.Y H:i') }}</span>
                            </div>
                            <p>
                                {{ $doctorDiagnosis->diagnosis_text ?? 'Izoh yo‘q' }}
                            </p>
                            @if ($doctorDiagnosis->file)
                            <p>
                                <a href="{{ asset('storage' . $doctorDiagnosis->file->url) }}" class="link-black text-sm" target="_blank">
                                    <i class="fas fa-link mr-1"></i> Faylni ko‘rish
                                </a>
                            </p>
                            @endif
                        </div>
                    @endforeach
                @else
                <p>Shifokor tashxislari mavjud emas.</p>
                @endif


            @empty
                <p>Bemor uchun hali hech qanday baholash ma’lumotlari mavjud emas.</p>
            @endforelse
            </div>
          </div>
        </div>
        <div>
          <i class="fas fa-clock bg-gray"></i>
        </div>
      </div>
    @endforeach

</div>
@endsection
