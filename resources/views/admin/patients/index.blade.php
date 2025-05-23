@extends('admin.layouts.app')
@section('title','Mening bemorlarim')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Mening bemorlarim</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">Mening bemorlarim</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Mening bemorlarim</h3>

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
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ism va Familiya</th>
                    <th>Pasport seriya va raqami</th>
                    <th>Tug'ilgan kun</th>
                    <th>Telefon raqami</th>
                    <th>Jinsi</th>
                    <th>Sana</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $index => $patient)
                <tr onclick="window.location='{{ route('patients.show', $patient->id) }}'" style="cursor: pointer;">
                    <td>{{ $loop->iteration + ($patients->currentPage() - 1) * $patients->perPage() }}</td>
                    <td>{{ $patient->name . ' ' . $patient->surname }}</td>
                    <td>{{ $patient->passport }}</td>
                    <td>{{ $patient->birth }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->gender }}</td>
                    <td>{{ $patient->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
            <div class="d-flex justify-content-center mt-3">
            {{ $patients->links() }}
            </div>
        </div>
        <!-- /.card-body -->
      </div>
    {{-- <div class="card">
        <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>

            </thead>
            <tbody>

            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div> --}}
</div>
@endsection