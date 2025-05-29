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
</div>
<div class="col-md-4">
    <div class="card card-primary card-outline">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h3 class="card-title">Melanoma holatlari</h3>
            <a href="javascript:void(0);">Hisobot</a>
          </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                  <div class="d-flex flex-column">
                    <span class="text-bold text-lg">
                      {{ array_sum($this_week) }} ta
                    </span>
                    <span>Melanoma tashxisi (bu hafta)</span>
                  </div>
                </div>

                <div class="col-md-6 text-md-right text-left">
                  @php
                    $thisSum = array_sum($this_week);
                    $lastSum = array_sum($last_week);
                    $diff = $lastSum > 0 ? (($thisSum - $lastSum) / $lastSum) * 100 : 0;
                    $icon = $diff >= 0 ? 'up' : 'down';
                    $color = $diff >= 0 ? 'text-success' : 'text-danger';
                  @endphp
                  <div class="d-flex flex-column align-items-md-end align-items-start">
                    <span class="{{ $color }}">
                      <i class="fas fa-arrow-{{ $icon }}"></i> {{ number_format(abs($diff), 1) }}%
                    </span>
                    <span class="text-muted">O‘tgan haftaga nisbatan</span>
                  </div>
                </div>
              </div>



          <div class="position-relative mb-4">
            <canvas id="sales-chart" height="200"></canvas>
          </div>

          <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
              <i class="fas fa-square text-primary"></i> Bu hafta
            </span>

            <span>
              <i class="fas fa-square text-gray"></i> O‘tgan hafta
            </span>
          </div>

        </div>
      </div>
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
                  <a href="{{route('diagnosis-results.show',$post->id)}}" class="product-title"> {{ Str::limit($post->title, 90) }}
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
      <!-- /.card -->


</div>

@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
      const data = {
        labels: @json($labels),
        this_week: @json($this_week),
        last_week: @json($last_week),
      };

      const ctx = document.getElementById('sales-chart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: data.labels,
          datasets: [
            {
              label: '', // <-- label yo'q
              data: data.this_week,
              backgroundColor: 'rgba(0, 123, 255, 0.6)',
            },
            {
              label: '', // <-- label yo'q
              data: data.last_week,
              backgroundColor: 'rgba(206, 212, 218, 0.6)',
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false // <-- legenda yo'q qilinadi
            }
          },
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                stepSize: 1,
                precision: 0
              }
            }
          }
        }
      });
    });
</script>
@endsection

