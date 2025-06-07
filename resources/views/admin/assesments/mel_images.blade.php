@extends('admin.layouts.app')
@section('title','Melanoma rasmlar')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">API rasmlar</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{localized_route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">API rasmlar</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="col-md-12 mb-4">
    <h3 class="text-center font-weight-bold">Melanoma tashxisli rasm namunalari</h3>

    <div class="text-center mt-2">
        <div class="input-group justify-content-center" style="max-width: 600px; margin: 0 auto;">
            <input type="text" class="form-control text-center" id="apiUrl" value="{{ url('api/mel-images') }}" readonly>
            <div class="input-group-append">
                <button class="btn btn-outline-primary" onclick="copyApiUrl()">
                    <i class="fas fa-copy mr-1"></i> Nusxalash
                </button>
            </div>
        </div>
        <small class="form-text text-muted mt-1">API havolasi orqali JSON ko‘rinishida barcha <code>mel</code> tashxisli rasm manzillarini olishingiz mumkin.</small>
    </div>
</div>
@forelse ($melAssesments as $assesment)
            <div class="col-md-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body p-0">
                        <img src="{{ asset('storage/' . $assesment->image->url) }}"
                             class="img-fluid w-100 rounded-top"
                             style="object-fit: cover; height: 200px;"
                             alt="Lesion rasm">
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <small class="text-muted mb-0">
                            <i class="far fa-calendar-alt mr-1"></i> {{ $assesment->created_at->format('d.m.Y') }}
                        </small>
                        <small class="text-muted mb-0">
                            <i class="far fa-clock mr-1"></i> {{ $assesment->created_at->format('H:i') }}
                        </small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Mel tashxisli rasm mavjud emas.</div>
            </div>
        @endforelse

        <div class="col-12 d-flex justify-content-center mt-4">
            {{ $melAssesments->links() }}
        </div>

<script>
    function copyApiUrl() {
        const input = document.getElementById("apiUrl");
        input.select();
        input.setSelectionRange(0, 99999); // Mobil uchun
        document.execCommand("copy");

        // Foydalanuvchiga xabar
        alert("API havolasi nusxalandi: " + input.value);
    }
</script>

@endsection