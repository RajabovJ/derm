@extends('doctor.layouts.app')
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
    <div class="card card-outline card-primary shadow-sm">
   <div class="card-header border-transparent" >
                <h3 class="card-title">
                    <i class="fas fa-project-diagram mr-2"></i> Loyiha haqida
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">

                <p>
                    Ushbu loyiha sun’iy intellekt texnologiyalaridan foydalangan holda <strong>teri kasalliklarini tasvir asosida aniqlash</strong> imkonini beradi. Asosiy maqsad — shifokorlarning tashxis qo‘yishdagi ishini yengillashtirish va xatoliklarni kamaytirishdir.
                </p>

                <hr>

                <h5><strong>Asosiy funksiyalari:</strong></h5>
                <ul class="mb-3 list-unstyled">
                    <li><i class="fas fa-check-circle text-success mr-2"></i> Rasm yuklash orqali avtomatik tashxis qo‘yish</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i> Tashxis natijalarini saqlash va tarixini ko‘rish</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i> Tashxisga asoslangan tavsiyalar</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i> Foydalanuvchi uchun oddiy va tushunarli interfeys</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i> Melanoma tashxisli tasvirlardan API orqali foydalanish</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i> Fiziologik belgilar (yosh, jins, joylashuv) asosida tashxis qo‘yish</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i> AI natijalarining tahlili: aniqlik va xatolik darajasi</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i> Segmentatsiya: zararlangan hududlarni aniqlab ajratish</li>
                    <li><i class="fas fa-check-circle text-success mr-2"></i> Model tahliliga asoslangan kengaytirilgan diagnostika funksiyalari</li>
                </ul>



                <hr>

                <h5><strong>Nima uchun bu loyiha zarur?</strong></h5>
                <p>
                    Hozirgi kunda dermatologik kasalliklar ko‘payib bormoqda va ularni erta aniqlash bemorning hayot sifati va hayotini saqlab qolishda muhim rol o‘ynaydi.
                    Bu tizim yordamida shifokorlar:
                </p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-angle-right text-primary mr-1"></i> Tezkor tashxis qo‘yish</li>
                    <li><i class="fas fa-angle-right text-primary mr-1"></i> Ob’ektiv natijaga asoslanish</li>
                    <li><i class="fas fa-angle-right text-primary mr-1"></i> Ilmiy tahlillarga tayanish imkoniyatiga ega bo‘ladi</li>
                </ul>

                <hr>

                <p class="mb-0 text-muted">
                    <i class="fas fa-info-circle mr-1"></i>
                    Loyihaning sun’iy intellekt modeli <strong>Melanoma</strong> va boshqa 6 turdagi teri o‘zgarishlarini aniqlashga qodir.
                </p>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-header border-transparent">
                <h3 class="card-title">DermLog loyihasi</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <h5><i class="fas fa-layer-group mr-1"></i> Platforma</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Tibbiy yo‘riqnoma loyihasi</a></li>
                            <li><a href="#">Mahsulotlar</a></li>
                            <li><a href="#">API Xizmatlar</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><i class="fas fa-stethoscope mr-1"></i> Xizmatlarimiz</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Belgi aniqlovchi tizim</a></li>
                            <li><a href="#">Tibbiy qabuldan oldingi so‘rov</a></li>
                            <li><a href="#">Kuzatuv va monitoring</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><i class="fas fa-hospital-user mr-1"></i> Kimlar uchun</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Tibbiy muassasalar</a></li>
                            <li><a href="#">Telemeditsina xizmatlari</a></li>
                            <li><a href="#">Davlat tashkilotlari</a></li>
                            <li><a href="#">Sug‘urta kompaniyalari</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><i class="fas fa-brain mr-1"></i> Sun’iy intellekt yadrosi</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Tibbiy bilimlar bazasi</a></li>
                            <li><a href="#">Inferensiya mexanizmi</a></li>
                            <li><a href="#">AI va Analitika</a></li>
                        </ul>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-3">
                        <h5><i class="fas fa-handshake mr-1"></i> Hamkorlar</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Hamkorlik dasturi</a></li>
                            <li><a href="#">Hamkorlar yechimlari</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><i class="fas fa-book-reader mr-1"></i> Resurslar</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Tadqiqot ishlari</a></li>
                            <li><a href="#">Amaliy tadqiqotlar</a></li>
                            <li><a href="#">Bemor hikoyalari</a></li>
                            <li><a href="#">Blog va maqolalar</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><i class="fas fa-code mr-1"></i> Dasturchilar uchun</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">API hujjatlari</a></li>
                            <li><a href="#">Hisob ochish</a></li>
                            <li><a href="#">API holati</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5><i class="fas fa-users-cog mr-1"></i> Kompaniya</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Biz haqimizda</a></li>
                            <li><a href="#">Jamoamiz</a></li>
                            <li><a href="#">Aloqa</a></li>
                            <li><a href="#">Tadbirlar</a></li>
                            <li><a href="#">Axborot siyosati</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</div>
<div class="col-md-4">
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">So'nggi yangiliklar</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="products-list product-list-in-card pl-2 pr-2">
            @foreach ($posts as $post)
            <li class="item">
                <div class="product-img">
                  <img src="{{asset('storage/'.$post->image_url)}}" alt="Post Image" class="img-size-50">
                </div>
                <div class="product-info">
                  <a href="{{route('posts.show',$post->id)}}" class="product-title"> {{ Str::limit($post->title, 90) }}
                    <span class="badge badge-warning float-right">{{$post->views}}</span></a>
                </div>
              </li>
              <!-- /.item -->
            @endforeach
          </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
          <a href="{{route('posts.index')}}" class="uppercase">Ko'proq...</a>
        </div>
        <!-- /.card-footer -->
    </div>
    <div class="card card-primary card-outline">
        <div class="card-header border-transparent">
          <h3 class="card-title">So'nggi urinishlarim</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table m-0">
              <thead>
              <tr>
                <th>ID</th>
                <th>FIO</th>
                <th>Natija</th>
                <th>Sana</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($diagnosisResults as $diagnosisResult)
                @php
                    switch ($diagnosisResult->result) {
                        case 'mel':
                            $badgeClass = 'badge-danger'; // eng xavfli
                            $label = 'Melanoma';
                            break;
                        case 'akiec':
                            $badgeClass = 'badge-warning';
                            $label = 'Actinic Keratoses';
                            break;
                        case 'bcc':
                            $badgeClass = 'badge-warning';
                            $label = 'Basal Cell Carcinoma';
                            break;
                        case 'bkl':
                            $badgeClass = 'badge-secondary';
                            $label = 'Benign Keratosis';
                            break;
                        case 'df':
                            $badgeClass = 'badge-info';
                            $label = 'Dermatofibroma';
                            break;
                        case 'nv':
                            $badgeClass = 'badge-primary';
                            $label = 'Melanocytic Nevus';
                            break;
                        case 'vasc':
                            $badgeClass = 'badge-success';
                            $label = 'Vascular Lesions';
                            break;
                        default:
                            $badgeClass = 'badge-dark';
                            $label = ucfirst($diagnosisResult->result);
                            break;
                    }
                @endphp

                <tr>
                    <td><a href="{{ route('diagnosis-results.show', $diagnosisResult->id) }}">{{ $diagnosisResult->id }}</a></td>
                    <td>{{ $diagnosisResult->patient->name . ' ' . $diagnosisResult->patient->surname }}</td>
                    <td><span class="badge {{ $badgeClass }}">{{ $label }}</span></td>
                    <td>{{ $diagnosisResult->created_at->format('d.m.Y H:i') }}</td>
                </tr>
            @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <a href="{{route('patients.create')}}" class="btn btn-sm btn-info float-left">Tashxis qo'yish</a>
          <a href="{{route('diagnosis-results.index')}}" class="btn btn-sm btn-secondary float-right">Jami urinishlarim</a>
        </div>
        <!-- /.card-footer -->
    </div>
      <!-- /.card -->

</div>


@endsection

