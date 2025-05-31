@extends('doctor.layouts.app')
@section('title','Tashxis haqida')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Tashxis tafsilotlari</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">Tashxis tafsilotlari</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title ">
                <i class="fas fa-notes-medical mr-2"></i>
                Tashxis natijalari
            </h3>
        </div>
        <div class="card-body p-3">
            <div class="row">
                <!-- Vertical Nav Tabs -->
                <div class="col-5 col-sm-3 border-right">
                    <div class= "nav flex-column nav-pills h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active d-flex align-items-center mb-2" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">
                            <i class="fas fa-user mr-2 text-primary"></i> Bemor maʼlumotlari
                        </a>
                        <a class="nav-link d-flex align-items-center mb-2" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">
                            <i class="fas fa-stethoscope mr-2 text-info"></i> Baholash
                        </a>
                        <a class="nav-link d-flex align-items-center mb-2" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">
                            <i class="fas fa-notes-medical mr-2 text-success"></i> Tashxis natijasi
                        </a>
                        <a class="nav-link d-flex align-items-center mb-2" id="vert-tabs-ai-analysis-tab" data-toggle="pill" href="#vert-tabs-ai-analysis" role="tab" aria-controls="vert-tabs-ai-analysis" aria-selected="false">
                            <i class="fas fa-robot mr-2 text-info"></i> AI Tahlil Natijalari
                        </a>
                        <a class="nav-link d-flex align-items-center mb-2" id="vert-tabs-diagnosis-tab" data-toggle="pill" href="#vert-tabs-diagnosis" role="tab" aria-controls="vert-tabs-diagnosis" aria-selected="false">
                            <i class="fas fa-pen-alt mr-2 text-warning"></i> Tashxis qo‘yish
                        </a>



                    </div>
                </div>

                <!-- Tab Content -->
                <div class="col-7 col-sm-9">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        <!-- Bemor maʼlumotlari -->
                        <div class="tab-pane fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                            <h4 class="mb-4 text-primary border-bottom pb-2"><i class="fas fa-user mr-2"></i>Bemor maʼlumotlari</h4>
                            <dl class="  row">
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
                            <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                                <h4 class="mb-4 text-success border-bottom pb-2"><i class="fas fa-notes-medical mr-2"></i>Tashxis natijasi</h4>
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
                            <div class="tab-pane fade" id="vert-tabs-ai-analysis" role="tabpanel" aria-labelledby="vert-tabs-ai-analysis-tab">
                                <h4 class="text-info text-center border-bottom pb-2 mb-4">
                                    <i class="fas fa-robot mr-2"></i>AI Tahlil Natijalari
                                </h4>

                                <!-- Accuracy Chart -->
                                <div class="chart-wrapper">
                                    <canvas id="accuracyChart"></canvas>
                                    <div id="accuracyLegend" class="custom-legend mt-3"></div>
                                </div>

                                <!-- Divider -->
                                <hr class="divider">

                                <!-- Loss Chart -->
                                <div class="chart-wrapper">
                                    <canvas id="lossChart"></canvas>
                                    <div id="lossLegend" class="custom-legend mt-3"></div>
                                </div>
                            </div>

                            <style>
                           .chart-wrapper {
    width: 100%;
    max-width: 800px;
    margin: 0 auto 50px;
    padding: 0 15px;
    height: 400px; /* Yagona balandlik */
    position: relative;
}


                            .divider {
                                border: none;
                                border-top: 2px solid #ccc;
                                max-width: 800px;
                                margin: 40px auto;
                            }

                            .custom-legend {
                                display: flex;
                                justify-content: center;
                                flex-wrap: wrap;
                                gap: 15px;
                            }

                            .custom-legend .legend-item {
                                display: flex;
                                align-items: center;
                                gap: 8px;
                                font-size: 14px;
                            }

                            .custom-legend .legend-color-box {
                                width: 16px;
                                height: 16px;
                                border-radius: 3px;
                            }
                            </style>






                        <!-- Tashxis qo‘yish (forma joyi) -->
                            <div class="tab-pane fade" id="vert-tabs-diagnosis" role="tabpanel" aria-labelledby="vert-tabs-diagnosis-tab">
                            <h4 class="mb-4 text-warning border-bottom pb-2"><i class="fas fa-pen-alt mr-2"></i>Tashxis qo‘yish</h4>
                            <h5>Bu yerga forma joylashtiriladi</h5>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('diagnosis.downloadPdf', $diagnosisResult->id) }}" class="btn btn-app bg-danger">
        <span class="badge bg-teal">PDF</span>
        <i class="fas fa-file-download"></i> Yuklab olish
    </a>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Grafiklar konteynerlari (sizda bor) -->
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

@endsection