@extends('admin.layouts.app')
@section('title','Bosh sahifa')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Bosh sahifa</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active"><a href="{{route('dashboard')}}">Bosh sahifa</a></li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection
@section('content')
<div class="col-md-8">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tashxis qo'yish</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('assesments.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Ismi</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Ismi" required>
                  @error('name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="surname">Familiyasi</label>
                  <input type="text" name="surname" class="form-control" id="surname" placeholder="Familiyasi" required>
                  @error('surname')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="birth">Tug'ilgan kuni</label>
                  <input type="date" name="birth" class="form-control" id="birth" required>
                  @error('birth')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="passport">Pasport seriya va raqami</label>
                  <input type="text" name="passport" class="form-control" id="passport" placeholder="AA1234567" required>
                  @error('passport')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-4">
                  <label for="phone">Telefon raqami</label>
                  <input type="tel" name="phone" class="form-control" id="phone" placeholder="+998901234567" required>
                  @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="gender">Jinsi</label>
                  <select name="gender" class="form-control" id="gender" required>
                    <option value="" disabled selected>Jinsini tanlang</option>
                    <option value="Erkak">Erkak</option>
                    <option value="Ayol">Ayol</option>
                  </select>
                  @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group col-md-8">
                  <label for="skin_type">Terining turi</label>
                  <select name="skin_type" class="form-control" id="skin_type" required>
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
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="family_history">Oilada Melanoma bilan kasallangan inson mavjudmi?</label>
                  <select name="family_history" class="form-control">
                    <option value="">Tanlang</option>
                    <option value="0">Yo‘q</option>
                    <option value="1">Ha</option>
                  </select>
                  @error('family_history')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="sun_exposure_history">Quyosh ta’siri tarixini tanlang</label>
                  <select name="sun_exposure_history" id="sun_exposure_history" class="form-control" required>
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
              </div>

                <div class="form-row">
                    <div class="form-group col-md-4 pl-0">
                        <label for="removed_nevi_count">Olib tashlangan nevilarning soni</label>
                        <input type="number" name="removed_nevi_count" id="removed_nevi_count" class="form-control @error('removed_nevi_count') is-invalid @enderror" value="{{ old('removed_nevi_count') }}" placeholder="Sonini kiriting">
                        @error('removed_nevi_count')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group col-md-8 pl-0">
                        <label for="immune_conditions">Immunitet holati</label>
                        <select name="immune_conditions" id="immune_conditions" class="form-control" required>
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


                <div class="form-row">
                    <div class="form-group col-md-4 pl-0">
                        <label for="lesion_location">Lezyon joylashuvi</label>
                        <select name="lesion_location" id="lesion_location" class="form-control" required >
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

                      <div class="form-group col-md-4 pl-0">
                        <label for="lesion_diameter">Lezyon diametri (mm)</label>
                        <input type="number" step="0.1" name="lesion_diameter" id="lesion_diameter" class="form-control @error('lesion_diameter') is-invalid @enderror" value="{{ old('lesion_diameter') }}" placeholder="Masalan, 3.5">
                        @error('lesion_diameter')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group col-md-4 pl-0">
                        <label for="lesion_shape">Lezyon shakli</label>
                        <select name="lesion_shape" id="lesion_shape" class="form-control" required >
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
                      <div class="form-group col-md-12 pl-0">
                        <label for="skin_changes_description">Teridagi o‘zgarishlar tavsifi</label>
                        <textarea name="skin_changes_description" id="skin_changes_description" class="form-control" rows="4" placeholder="Tavsif kiriting...">{{ old('skin_changes_description') }}</textarea>
                        @error('skin_changes_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>


                <div class="form-group col-md-12 ">
                    <label for="lesion_photo">Lezyon rasmi (JPEG, PNG, maksimal 10MB)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="lesion_photo" id="lesion_photo" required>
                        <label class="custom-file-label" for="lesion_photo">Fayl tanlang</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Yuklash</span>
                      </div>
                    </div>
                    @error('lesion_photo')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>


              <button type="submit" class="btn btn-primary">Yuborish</button>
            </div>
          </form>

          <script>
            function toggleOtherLocation(value) {
              const otherInput = document.getElementById('lesion_location_other');
              otherInput.style.display = (value === 'Boshqa') ? 'block' : 'none';
              if(value !== 'Boshqa') otherInput.value = '';
            }

            function toggleOtherShape(value) {
              const otherInput = document.getElementById('lesion_shape_other');
              otherInput.style.display = (value === 'Boshqa') ? 'block' : 'none';
              if(value !== 'Boshqa') otherInput.value = '';
            }
          </script>

    </div>
</div>
<div class="col-md-4">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">So'ngi yangiliklar</h3>
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
    </div>

</div>
@endsection