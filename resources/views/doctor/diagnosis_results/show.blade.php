@extends('doctor.layouts.app')
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
@section('styles')
<style>
    .nav-tabs {
      flex-wrap: nowrap !important;
      overflow-x: auto;
      overflow-y: hidden;
      white-space: nowrap;
    }

    .nav-tabs .nav-item {
      flex: 0 0 auto;
    }
  </style>

<style>
    .img-container {
        height: 250px; /* yoki sizga mos balandlik */
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .fixed-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>

@endsection

@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs shadow-sm">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs d-flex" id="custom-tabs-four-tab" role="tablist" style="flex-wrap: nowrap; overflow-x: auto; overflow-y: hidden;">

                  <li class="nav-item">
                    <a class="nav-link active d-flex align-items-center" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">
                      <i class="fas fa-user mr-2 text-primary"></i> Bemor maʼlumotlari
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">
                      <i class="fas fa-stethoscope mr-2 text-info"></i> Fiziologik ko'rsatkichlar
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">
                      <i class="fas fa-notes-medical mr-2 text-success"></i> Tashxis natijasi (Tasvir)
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" id="custom-tabs-four-ai-tab" data-toggle="pill" href="#custom-tabs-four-ai" role="tab" aria-controls="custom-tabs-four-ai" aria-selected="false">
                      <i class="fas fa-robot mr-2 text-info"></i> AI Tahlil Natijalari
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link d-flex align-items-center" id="custom-tabs-four-diagnosis-tab" data-toggle="pill" href="#custom-tabs-four-diagnosis" role="tab" aria-controls="custom-tabs-four-diagnosis" aria-selected="false">
                      <i class="fas fa-pen-alt mr-2 text-warning"></i> Tashxis qo‘yish
                    </a>
                  </li>
                </ul>
              </div>

              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                    <p class="mb-4 text-primary border-bottom pb-2"><i class="fas fa-user mr-2"></i>Bemor maʼlumotlari</p>
                    <dl class=" row">
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

                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                        <p class="mb-4 text-info border-bottom pb-2"><i class="fas fa-stethoscope mr-2"></i>Fiziologik ko'rsatkichlar</p>
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
                        <div class="row mt-4 justify-content-center">
                            {{-- Asl lezyon rasmi --}}
                            <div class="col-md-4 text-center lesion-container">
                                <img src="{{ asset('storage/' . $assesment->image->url) }}"
                                     alt="Lezyon rasmi"
                                     class="img-fluid img-thumbnail lesion-image shadow-sm">
                                <p class="mt-2 text-muted"><small>Asl lezyon rasmi</small></p>
                            </div>
                        </div>
                        @endif
                    </div>
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
                    <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                        <p class="mb-4 text-success border-bottom pb-2"><i class="fas fa-notes-medical mr-2"></i>Tashxis natijasi(Tasvir)</p>
                        <dl class="row">
                            <dt class="col-sm-4">Natija:</dt>
                            <dd class="col-sm-8">
                                <span class="badge {{ $badgeClass }} p-2">{{ $label }}</span>
                            </dd>

                            <dt class="col-sm-4">Tavsif:</dt>
                            <dd class="col-sm-8">{{ $diagnosisResult->message }}</dd>

                            <dt class="col-sm-4">Doktor:</dt>
                            <dd class="col-sm-8">{{ $user->name }}</dd>
                        </dl>
                    </div>

                    <div class="tab-pane fade" id="custom-tabs-four-ai" role="tabpanel" aria-labelledby="custom-tabs-four-ai-tab">
                        <p class="text-info text-center border-bottom pb-2 mb-4">
                            <i class="fas fa-robot mr-2"></i>AI Tahlil Natijalari
                        </p>

                        {{-- Lezyon va Segmentatsiya Tasvirlari --}}
                        @if ($assesment->image)
                        <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">

                            {{-- Asl lezyon --}}
                            <div class="col">
                                <div class="card shadow-sm border-primary h-100">
                                    <div class="img-container">
                                        <img src="{{ asset('storage/' . $assesment->image->url) }}" alt="Lezyon rasmi" class="card-img-top fixed-img">
                                    </div>
                                    <div class="card-body text-center">
                                        <p class="text-primary mb-0"><i class="fas fa-image mr-1"></i>Asl Lezyon</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Segmentatsiya maskasi --}}
                            @if (!empty($diagnosisResult->segmentation_mask))
                            <div class="col">
                                <div class="card shadow-sm border-info h-100">
                                    <div class="img-container">
                                        <img src="data:image/png;base64,{{ $diagnosisResult->segmentation_mask }}" alt="Segmentatsiya maskasi" class="card-img-top fixed-img">
                                    </div>
                                    <div class="card-body text-center">
                                        <p class="text-info mb-0"><i class="fas fa-layer-group mr-1"></i>Segmentatsiya Maskasi</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            {{-- Ajratilgan lezyon --}}
                            @if (!empty($diagnosisResult->extracted_lesion))
                            <div class="col">
                                <div class="card shadow-sm border-success h-100">
                                    <div class="img-container">
                                        <img src="data:image/png;base64,{{ $diagnosisResult->extracted_lesion }}" alt="Ajratilgan lezyon" class="card-img-top fixed-img">
                                    </div>
                                    <div class="card-body text-center">
                                        <p class="text-success mb-0"><i class="fas fa-cut mr-1"></i>Ajratilgan Lezyon</p>
                                    </div>
                                </div>
                            </div>
                            @endif

                        </div>
                        @endif
                        <div class="container-fluid">

                            {{-- 1-qator: Ehtimolliklar va AI model statistikasi --}}
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="p-3 rounded shadow-sm bg-light border border-info h-100">
                                        <p class="text-info font-weight-bold mb-3">
                                            <i class="fas fa-percentage mr-2"></i>{{ __('Tasniflash ehtimolliklari') }}
                                        </p>
                                        <canvas id="probabilityChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="p-3 rounded shadow-sm bg-light border border-primary h-100">
                                        <p class="text-primary font-weight-bold mb-3">
                                            <i class="fas fa-chart-line mr-2"></i>AI Model O‘quv Statistikasi
                                        </p>
                                        <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                    </div>
                                </div>
                            </div>

                            {{-- 2-qator: Accuracy va Loss grafiklari --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bg-light p-3 rounded shadow-sm border border-success h-100">
                                        <p class="text-success font-weight-bold mb-3">
                                            <i class="fas fa-check-circle mr-2"></i>Model Accuracy Grafigi
                                        </p>
                                        <canvas id="accuracyChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        <div id="accuracyLegend" class="custom-legend mt-3"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="bg-light p-3 rounded shadow-sm border border-danger h-100">
                                        <p class="text-danger font-weight-bold mb-3">
                                            <i class="fas fa-times-circle mr-2"></i>Model Loss Grafigi
                                        </p>
                                        <canvas id="lossChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        <div id="lossLegend" class="custom-legend mt-3"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="custom-tabs-four-diagnosis" role="tabpanel" aria-labelledby="custom-tabs-four-diagnosis-tab">
                        <p class="mb-4 text-warning border-bottom pb-2"><i class="fas fa-pen-alt mr-2"></i>Tashxis qo‘yish</p>
                        <p>Bu yerga forma joylashtiriladi</p>
                    </div>
                    <div class="col-md-12 mt-2">
                        <a href="{{ localized_route('diagnosis.downloadPdf', $diagnosisResult->id) }}" class="btn btn-app bg-danger">
                            <span class="badge bg-teal">PDF</span>
                            <i class="fas fa-file-download"></i> Yuklab olish
                        </a>
                    </div>

                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const data = @json($chartData);

    function createLegend(containerId, datasets) {
        const container = document.getElementById(containerId);
        container.innerHTML = ''; // avvalgi legendani tozalash

        datasets.forEach(ds => {
            const item = document.createElement('div');
            item.className = 'legend-item';

            const box = document.createElement('span');
            box.className = 'legend-color-box';
            box.style.backgroundColor = ds.borderColor;

            const label = document.createElement('span');
            label.textContent = ds.label;

            item.appendChild(box);
            item.appendChild(label);
            container.appendChild(item);
        });
    }

    // Accuracy grafik
    const accuracyDatasets = [
        {
            label: 'Train Accuracy',
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            data: data.train_accuracy,
            fill: false,
            tension: 0.3,
            pointRadius: 4,
            pointHoverRadius: 6,
        },
        {
            label: 'Validation Accuracy',
            borderColor: 'rgba(255, 159, 64, 1)',
            backgroundColor: 'rgba(255, 159, 64, 0.2)',
            data: data.val_accuracy,
            fill: false,
            tension: 0.3,
            pointRadius: 4,
            pointHoverRadius: 6,
        }
    ];

    const ctxAccuracy = document.getElementById('accuracyChart').getContext('2d');
    new Chart(ctxAccuracy, {
        type: 'line',
        data: {
            labels: data.epochs,
            datasets: accuracyDatasets
        },
        options: {
    responsive: true,
    maintainAspectRatio: false,
    interaction: { mode: 'index', intersect: false },
    plugins: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: 'Train vs Validation Accuracy',
            font: { size: 18, weight: 'bold' }
        },
        tooltip: {
            callbacks: {
                label: ctx => ctx.dataset.label + ': ' + ctx.parsed.y.toFixed(4)
            }
        }
    },
    scales: {
        y: {
            beginAtZero: true,
            max: 1,
            ticks: {
                stepSize: 0.1,
                callback: val => val.toFixed(1),
            },
            title: {
                display: false   // bu yerda y-o'q yozuvi o'chirildi
            }
        },
        x: {
            title: {
                display: true,
                text: 'Epoch',
                font: { size: 14, weight: 'bold' }
            }
        }
    }
        }


    });

    createLegend('accuracyLegend', accuracyDatasets);

    // Loss grafik uchun
    const lossDatasets = [
        {
            label: 'Train Loss',
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            data: data.train_loss,
            fill: false,
            tension: 0.3,
            pointRadius: 4,
            pointHoverRadius: 6,
        },
        {
            label: 'Validation Loss',
            borderColor: 'rgba(255, 99, 132, 1)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            data: data.val_loss,
            fill: false,
            tension: 0.3,
            pointRadius: 4,
            pointHoverRadius: 6,
        }
    ];

    const ctxLoss = document.getElementById('lossChart').getContext('2d');
    new Chart(ctxLoss, {
        type: 'line',
        data: {
            labels: data.epochs,
            datasets: lossDatasets
        },
        options: {
    responsive: true,
    maintainAspectRatio: false,
    interaction: { mode: 'index', intersect: false },
    plugins: {
        legend: { display: false },
        title: {
            display: true,
            text: 'Train vs Validation Loss',
            font: { size: 18, weight: 'bold' }
        },
        tooltip: {
            callbacks: {
                label: ctx => ctx.dataset.label + ': ' + ctx.parsed.y.toFixed(4)
            }
        }
    },
    scales: {
        y: {
            beginAtZero: true,
            title: {
                display: false  // y-o'q yozuvi o'chirildi
            }
        },
        x: {
            title: {
                display: true,
                text: 'Epoch',
                font: { size: 14, weight: 'bold' }
            }
        }
    }
        }

    });

    createLegend('lossLegend', lossDatasets);
});
</script>


<script>
    const ctx = document.getElementById('probabilityChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($labels),
            datasets: [{
                label: 'Ehtimollik (%)',
                data: @json(array_map(fn($val) => round($val * 100, 2), $probabilities)),
                backgroundColor: [
                    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796', '#5a5c69'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    title: {
                        display: true,
                        text: '%'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + '%';
                        }
                    }
                }
            }
        }
    });
</script>
<script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, {
      type: 'line',
      data: lineChartData,
      options: lineChartOptions
    })
</script>
@endsection