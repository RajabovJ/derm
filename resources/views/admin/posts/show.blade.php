@extends('admin.layouts.app')
@section('title','E\'lon')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">E'lon</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{localized_route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item "><a href="{{localized_route('posts.index')}}">E'lonlar</a></li>
        <li class="breadcrumb-item active">E'lon</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Post Card -->
            <div class="card shadow-sm">
                @if($post->image_url)
                <div class="card-img-top" style="max-height: 400px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $post->image_url) }}" class="img-fluid w-100" style="object-fit: cover;" alt="Post rasmi">
                </div>
                @endif

                <div class="card-body">
                    <h3 class="card-title font-weight-bold text-primary mb-3 mr-2">
                        {{ $post->title }}
                    </h3>

                    <div class="mb-3 text-muted d-flex flex-wrap align-items-center" style="font-size: 0.9rem;">
                        <div class="mr-3">
                            <i class="fas fa-user"></i> {{ $post->user->name ?? 'Admin' }}
                        </div>
                        <div class="mr-3">
                            <i class="far fa-calendar-alt"></i> {{ $post->created_at->format('d.m.Y') }}
                        </div>
                        <div class="mr-3">
                            <i class="far fa-clock"></i> {{ $post->created_at->format('H:i') }}
                        </div>
                        <div>
                            <i class="fas fa-eye"></i> {{ $post->views }} ta ko‘rilgan
                        </div>
                    </div>

                    <div class="text-justify" style="line-height: 1.7;">
                        {!! nl2br(e($post->content)) !!}
                    </div>
                </div>

                <div class="card-footer bg-white text-right">
                    <a href="{{ localized_route('posts.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Orqaga
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection