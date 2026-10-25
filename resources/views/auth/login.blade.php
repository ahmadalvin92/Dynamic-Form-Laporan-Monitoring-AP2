<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Monitoring Perangkat - PT Angkasa Pura II</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #0A3A82 0%, #0072BD 50%, #0284C7 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 40%),
                        radial-gradient(circle at 80% 80%, rgba(0, 0, 0, 0.2) 0%, transparent 50%);
            pointer-events: none;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 18px;
            box-shadow: 0 20px 45px -10px rgba(0, 0, 0, 0.35);
            width: 100%;
            max-width: 440px;
            padding: 2.5rem;
            position: relative;
            z-index: 10;
        }

        .btn-ap2 {
            background: linear-gradient(135deg, #0072BD 0%, #0A3A82 100%);
            color: #ffffff;
            font-weight: 700;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 114, 189, 0.35);
            transition: all 0.2s ease;
        }

        .btn-ap2:hover {
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 114, 189, 0.45);
        }

        .form-control-lg {
            border-radius: 10px;
            font-size: 0.95rem;
            border: 1px solid #cbd5e1;
        }

        .form-control-lg:focus {
            border-color: #0072BD;
            box-shadow: 0 0 0 3px rgba(0, 114, 189, 0.15);
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="text-center mb-4">
        <img src="{{ url('/logo/Logo.svg') }}" alt="Angkasa Pura II" style="max-height: 52px;" class="img-fluid mb-2">
        <h4 class="font-weight-bold text-dark mt-2 mb-1" style="letter-spacing: -0.3px;">Sistem Monitoring Perangkat</h4>
        <p class="text-muted small">Information & Communication Technology Bandara Soekarno-Hatta (CGK)</p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger py-2 px-3 small rounded" role="alert">
            <i class="fas fa-exclamation-circle mr-1"></i> {{ $errors->first() }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success py-2 px-3 small rounded" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group mb-3">
            <label class="small font-weight-bold text-dark">Username Akun</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light border-right-0" style="border-radius: 10px 0 0 10px;">
                        <i class="fas fa-user text-muted"></i>
                    </span>
                </div>
                <input type="text" class="form-control form-control-lg border-left-0" id="username" name="username" placeholder="Masukkan username (e.g. alvin)" required autofocus>
            </div>
        </div>

        <div class="form-group mb-4">
            <label class="small font-weight-bold text-dark">Kata Sandi</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-light border-right-0" style="border-radius: 10px 0 0 10px;">
                        <i class="fas fa-lock text-muted"></i>
                    </span>
                </div>
                <input type="password" class="form-control form-control-lg border-left-0" id="password" name="password" placeholder="Masukkan kata sandi" required>
            </div>
        </div>

        <button type="submit" class="btn btn-ap2 btn-block btn-lg mb-3">
            <i class="fas fa-sign-in-alt mr-2"></i> Masuk ke Sistem
        </button>

        <div class="card bg-light border-0 p-3 mt-4" style="border-radius: 10px;">
            <div class="small font-weight-bold text-dark mb-1"><i class="fas fa-key text-warning mr-1"></i> Akun Pengujian Internal:</div>
            <div class="small text-muted">
                <strong>Super Admin:</strong> <code>alvin</code> / <code>password123</code><br>
                <strong>Admin Network:</strong> <code>bryan</code> / <code>password123</code><br>
                <strong>Admin Non Public:</strong> <code>devin</code> / <code>password123</code>
            </div>
        </div>
    </form>

    <div class="text-center mt-4">
        <small class="text-muted">&copy; 2024 PT Angkasa Pura II. All Rights Reserved.</small>
    </div>
</div>

<script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('dist/js/adminlte.min.js') }}"></script>
</body>
</html>
