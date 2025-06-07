@extends('admin.layouts.app')
@section('title','Jami urinishlarim')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Jami urinishlarim</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{localized_route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">Jami urinishlarim</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Jami urinishlarim</h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <div class="table-responsive">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="d-none d-md-table-cell">FIO</th>
                            <th>Natija</th>
                            <th class="d-none d-md-table-cell">Izoh</th>
                            <th>Rasm</th>
                            <th>Sana</th>
                            <th>Amallar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diagnosisResults as $index => $diagnosisResult)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="d-none d-md-table-cell">
                                    {{ $diagnosisResult->patient->name . ' ' . $diagnosisResult->patient->surname }}
                                </td>
                                <td>{{ $diagnosisResult->result }}</td>
                                <td class="d-none d-md-table-cell">
                                    {{ $diagnosisResult->message }}
                                </td>
                                <td>
                                    @if ($diagnosisResult->assesment && $diagnosisResult->assesment->image)
                                        <img src="{{ asset('storage/' . $diagnosisResult->assesment->image->url) }}"
                                             alt="Lezyon rasmi"
                                             style="max-height: 50px;"
                                             class="img-thumbnail">
                                    @else
                                        <span class="text-muted">Yo‘q</span>
                                    @endif
                                </td>
                                <td>{{ $diagnosisResult->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ localized_route('diagnosis-results.show', $diagnosisResult->id) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i> Batafsil
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection