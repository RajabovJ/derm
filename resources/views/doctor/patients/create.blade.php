@extends('doctor.layouts.app')
@section('title','Bemor qo\'shish')
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">Bemor ma'lumotlarini kiritish moduli</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item "><a href="{{route('dashboard')}}">Bosh sahifa</a></li>
        <li class="breadcrumb-item active">Bemor qo'shish</li>
      </ol>
    </div>
  </div>
@endsection
@section('content')
<div class="col-md-12">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Eslatma:</strong> Agar bemor allaqachon bazada mavjud ekanligini bilsangiz, ushbu bosqichni <b>o‘tkazib yuborishingiz</b> mumkin.
        <button type="button" class="close" data-dismiss="alert" aria-label="Yopish">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Bemor ma'lumotlarini kiritish moduli</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{-- Ism --}}
                        <div class="form-group">
                            <label for="name">Ismi:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        {{-- Familiya --}}
                        <div class="form-group">
                            <label for="surname">Familiyasi:</label>
                            <input type="text" name="surname" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {{-- Tug‘ilgan sana (dd/mm/yyyy mask) --}}
                            <div class="form-group">
                                <label>Tug‘ilgan sana:</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="birth" class="form-control"
                                        ata-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                                    </div>
                            </div>
                    </div>
                    <div class="col-md-3">
                        {{-- Passport --}}
                        <div class="form-group">
                            <label for="passport">Passport raqami:</label>
                            <input type="text" name="passport" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        {{-- Telefon raqam (UZ format) --}}
                        <div class="form-group">
                            <label>Telefon raqami:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phone" class="form-control" data-inputmask="'mask': '+998 (99) 999-99-99'" data-mask required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        {{-- Jinsi --}}
                        <div class="form-group">
                            <label for="gender">Jinsi:</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Tanlang</option>
                                <option value="Erkak">Erkak</option>
                                <option value="Ayol">Ayol</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success mr-2">
                    <i class="fas fa-save"></i> Saqlash
                </button>
                <a href="{{ route('assesments.create') }}" class="btn btn-outline-primary">
                    <i class="fas fa-forward"></i> O‘tkazib yuborish
                </a>
            </div>


        </div>
    </form>
</div>
@endsection