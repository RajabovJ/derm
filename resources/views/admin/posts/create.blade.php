@extends('admin.layouts.app')
@section('title','Post yaratish')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Post yaratish</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{localized_route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">Post yaratish</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="col-md-12">
        <form action="{{ localized_route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Yangi Post Yaratish</h3>
                </div>
                <div class="card-body">
                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Sarlavha</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Post sarlavhasini kiriting" required>
                    </div>

                    <!-- Content -->
                    <div class="form-group">
                        <label for="content">Kontent</label>
                        <textarea name="content" class="form-control" id="content" rows="4" required placeholder="Post matnini kiriting (ixtiyoriy)"></textarea>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image_url">Rasm yuklash</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image_url" class="custom-file-input" id="image_url" accept="image/*" >
                                <label class="custom-file-label" for="image_url">Rasm tanlang</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Yuklash</span>
                            </div>
                        </div>
                    </div>

                    <!-- Visibility -->
                    <div class="form-group">
                        <label for="visibility">Ko‘rinish</label>
                        <select name="visibility" id="visibility" class="form-control" required>
                            <option value="public">Jamoatchilik uchun (public)</option>
                            <option value="doctor_only">Faqat shifokorlar uchun (doctor_only)</option>
                        </select>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </div>
            </div>
        </form>

        <!-- Agar AdminLTE JS ishlatilsa, custom-file-input uchun labelni yangilash uchun skript -->
        <script>
            document.querySelectorAll('.custom-file-input').forEach(input => {
                input.addEventListener('change', function(){
                    let fileName = this.files[0] ? this.files[0].name : '';
                    this.nextElementSibling.innerText = fileName;
                });
            });
        </script>
</div>
@endsection