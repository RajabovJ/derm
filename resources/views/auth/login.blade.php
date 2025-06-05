
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kirish</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
    <style>
        body {
            background: linear-gradient(135deg, #f0f2f5, #d9e2ec);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-box {
            max-width: 900px;
            width: 100%;
            margin: auto;
        }

        .rotate-on-hover {
            transition: transform 0.3s ease;
        }

        .rotate-on-hover:hover {
            transform: rotate(3deg) scale(1.05);
        }

        .card {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
        }

        .login-logo a {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
            text-decoration: none;
        }

        .login-logo a:hover {
            text-decoration: underline;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }

        .btn-primary {
            border-radius: 0.5rem;
        }
    </style>

    <div class="login-box">
        <div class="login-logo text-center mb-4">
            <a href="{{localized_route('dashboard')}}"><b>Derm</b>Log</a>
        </div>

        <div class="card">
            <div class="row g-0">
                <!-- Chap taraf: logo va matn -->
                <div class="col-md-5 d-flex flex-column justify-content-center align-items-center p-4 bg-white">
                    <img src="{{ asset('project/logo.jpg') }}"
                         class="img-fluid shadow rounded-circle rotate-on-hover mb-3"
                         style="max-width: 130px;">
                    <p class="text-muted text-center px-3">
                        <em>DermLog — teri kasalliklarini sun’iy intellekt yordamida aniqlovchi onlayn platforma.</em>
                    </p>
                </div>

                <!-- O'ng taraf: login forma -->
                <div class="col-md-7 p-5 bg-white">
                    <h4 class="text-center mb-4">Hisobga kirish</h4>
                    <form action="{{ localized_route('login') }}" method="POST">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email manzil</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                       class="form-control" placeholder="Email" required autofocus>
                            </div>
                        </div>

                        <!-- Parol -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Parol</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" name="password" id="password"
                                       class="form-control" placeholder="Parol" required>
                            </div>
                        </div>

                        <!-- Eslab qol -->
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="remember" id="remember_me">
                            <label class="form-check-label" for="remember_me">Eslab qol</label>
                        </div>

                        <!-- Kirish tugmasi -->
                        <button type="submit" class="btn btn-primary w-100 mb-3">Kirish</button>
                    </form>

                    <!-- Ro'yxatdan o'tish tugmasi -->
                    <div class="text-center">
                        <a href="{{ localized_route('register') }}" class="btn btn-outline-secondary w-100">
                            Ro'yxatdan o'tish
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
