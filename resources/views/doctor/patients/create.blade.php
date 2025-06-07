@extends('doctor.layouts.app')
@section('title', __('Bemor qo\'shish'))
@section('breadcrumb')
<div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0">{{ __('Bemor ma\'lumotlarini kiritish moduli') }}</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ localized_route('dashboard') }}">{{ __('Bosh sahifa') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Bemor qo\'shish') }}</li>
      </ol>
    </div>
</div>
@endsection

@section('content')
<div class="col-md-12">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ __('Eslatma:') }}</strong> {{ __('Agar bemor allaqachon bazada mavjud ekanligini bilsangiz, ushbu bosqichni') }}
        <b>{{ __('o‘tkazib yuborishingiz') }}</b> {{ __('mumkin.') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('Yopish') }}">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="{{ localized_route('patients.store') }}" method="POST">
        @csrf
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{ __('Bemor ma\'lumotlarini kiritish moduli') }}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{-- Ism --}}
                        <div class="form-group">
                            <label for="name">{{ __('Ismi:') }}</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- Familiya --}}
                        <div class="form-group">
                            <label for="surname">{{ __('Familiyasi:') }}</label>
                            <input type="text" name="surname" class="form-control" required value="{{ old('surname') }}">
                            @error('surname')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        {{-- Tug‘ilgan sana --}}
                        <div class="form-group">
                            <label>{{ __('Tug‘ilgan sana:') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="date" name="birth" class="form-control"
                                    ata-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy"
                                    data-mask required value="{{ old('birth') }}">
                                @error('birth')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="passport">{{ __('Passport seriya va raqami:') }}</label>
                            <input type="text" name="passport" id="passport" class="form-control"
                                maxlength="9" required placeholder="AA1234567" value="{{ old('passport') }}">
                            @error('passport')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>{{ __('Telefon raqami:') }}</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    placeholder="+998 (__) ___-__-__" required>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        {{-- Jinsi --}}
                        <div class="form-group">
                            <label for="gender">{{ __('Jinsi:') }}</label>
                            <select name="gender" class="form-control" required>
                                <option value="">{{ __('Tanlang') }}</option>
                                <option value="Erkak">{{ __('Erkak') }}</option>
                                <option value="Ayol">{{ __('Ayol') }}</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-success mr-2">
                    <i class="fas fa-save"></i> {{ __('Saqlash') }}
                </button>
                <a href="{{ localized_route('assesments.create') }}" class="btn btn-outline-primary">
                    <i class="fas fa-forward"></i> {{ __('O‘tkazib yuborish') }}
                </a>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.getElementById('passport').addEventListener('input', function (e) {
        let value = e.target.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
        let letters = value.slice(0, 2).replace(/[^A-Z]/g, '');
        let numbers = value.slice(2).replace(/[^0-9]/g, '');
        e.target.value = letters + numbers;
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>
<script>
  $(document).ready(function () {
    $('#phone').inputmask({
      mask: "+998 (99) 999-99-99",
      placeholder: "_",
      showMaskOnFocus: true,
      showMaskOnHover: false,
      clearIncomplete: true,
      definitions: {
        '9': {
          validator: "[0-9]",
          cardinality: 1
        }
      }
    });
  });
</script>
@endsection
