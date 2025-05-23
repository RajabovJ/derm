@extends('doctor.layouts.app')
@section('title','E\'lonlar')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">E'lonlar</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">E'lonlar</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Yangiliklar</h3>
        </div>
        <div class="card-body p-0">
            <ul class="products-list product-list-in-card m-0">
                @forelse ($posts as $post)
                <li class="item d-flex align-items-start border-bottom px-2 py-3 position-relative">
                    <a href="{{ route('posts.show', $post->id) }}" class="stretched-link"></a>

                    <div class="mr-3" style="width: 50px; height: 50px; border-radius: 5px; overflow: hidden; flex-shrink: 0;">
                        <img src="{{ $post->image_url ? asset('storage/' . $post->image_url) : asset('default-post-image.jpg') }}"
                             alt="Yangilik rasmi"
                             style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="flex-grow-1 overflow-hidden">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <span class="font-weight-bold text-dark text-truncate d-block" style="max-width: 75%;">
                                {{ Str::limit($post->title, 50) }}
                            </span>
                            <span class="badge badge-info text-sm">{{ $post->views }} marta</span>
                        </div>

                        <p class="text-muted mb-1 text-truncate" style="font-size: 0.85rem;">
                            {{ Str::limit(strip_tags($post->content), 150) }}
                        </p>

                        <small class="text-muted d-flex align-items-center" style="font-size: 0.8rem;">
                            <i class="far fa-calendar-alt mr-1"></i> {{ $post->created_at->format('d.m.Y') }}
                            <i class="far fa-clock ml-3 mr-1"></i> {{ $post->created_at->format('H:i') }}
                        </small>
                    </div>
                </li>


                @empty
                    <li class="item text-center py-4 text-muted">Hozircha yangiliklar mavjud emas.</li>
                @endforelse
            </ul>
        </div>
        <div class="card-footer text-center">
            {{ $posts->links() }}
        </div>
    </div>

</div>
@endsection