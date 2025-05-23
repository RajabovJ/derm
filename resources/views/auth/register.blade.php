{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ro'yxatdan o'tish</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
  <style>
    /* Register box kengligini oshiramiz */
    .register-box {
      width: 800px;       /* Default 360-400px bo'ladi, siz 600px yoki 700px qilib olishingiz mumkin */
      max-width: 90%;     /* Ekran kichik bo'lsa, 90% kenglikda bo'lsin */
      margin: 50px auto;  /* Sahifaning markazida joylashishi uchun */
    }

    /* Ichki karta body qismini kengaytirish */
    .register-card-body {
      padding: 30px 40px; /* paddingni oshirish, kengroq va bo‘sh joyli ko‘rinish uchun */
    }
  </style>

</head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
          <a href="/"><b>Derm</b>Log</a>
        </div>

        <div class="card">
          <div class="card-body register-card-body">
            <form action="{{ route('register') }}" method="POST">
              @csrf

              {{-- Ism --}}
              <div class="form-group">
                  <label for="name">Ism</label>
                  <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" maxlength="50" required>
                  @error('name')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              {{-- Familiya --}}
              <div class="form-group">
                  <label for="surname">Familiya</label>
                  <input type="text" id="surname" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ old('surname') }}" maxlength="50" required>
                  @error('surname')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              {{-- Passport --}}
              <div class="form-group">
                  <label for="passport">Passport raqami</label>
                  <input type="text" id="passport" name="passport" class="form-control @error('passport') is-invalid @enderror" value="{{ old('passport') }}" maxlength="20" required>
                  @error('passport')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              {{-- Telefon --}}
              <div class="form-group">
                  <label for="phone">Telefon raqami</label>
                  <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" maxlength="20" required>
                  @error('phone')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              {{-- Email --}}
              <div class="form-group">
                  <label for="email">Email manzili</label>
                  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                  @error('email')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              {{-- Ikki ustunli: Jinsi va Tug‘ilgan sana --}}
              <div class="row">
                  <div class="form-group col-md-6">
                      <label for="gender">Jinsi</label>
                      <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" required>
                          <option value="">Jinsini tanlang</option>
                          <option value="Erkak" {{ old('gender') == 'Erkak' ? 'selected' : '' }}>Erkak</option>
                          <option value="Ayol" {{ old('gender') == 'Ayol' ? 'selected' : '' }}>Ayol</option>
                      </select>
                      @error('gender')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-group col-md-6">
                      <label for="birth">Tug‘ilgan sana</label>
                      <input type="date" id="birth" name="birth" class="form-control @error('birth') is-invalid @enderror" value="{{ old('birth') }}" required>
                      @error('birth')
                          <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
              </div>

              {{-- Parol --}}
              <div class="form-group">
                  <label for="password">Parol</label>
                  <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                  @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
              </div>

              {{-- Parolni tasdiqlash --}}
              <div class="form-group">
                  <label for="password_confirmation">Parolni tasdiqlang</label>
                  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
              </div>

              {{-- Submit tugmasi --}}
              <div class="form-group mt-3">
                  <button type="submit" class="btn btn-primary btn-block">Ro'yxatdan o'tish</button>
              </div>
          </form>

            <a href="{{route('login')}}" class="btn btn-outline-secondary w-100">Kirish</a>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>

