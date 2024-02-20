<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Angkasa Pura II | Log in</title>

  <link rel="stylesheet" href="{{url('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}} ">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
      body {
        font-family: 'Source Sans Pro', sans-serif;
        background-color: #0072BD; /* Background color with #0072BD */
        height: 100vh;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
      }

      .logo {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 150px; /* Sesuaikan dengan ukuran logo */
        height: auto;
      }

      .login-box {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.9); /* Ubah ke opasitas yang diinginkan */
      }

      .login-logo {
        text-align: center;
        margin-bottom: 20px;
      }

      .login-logo a {
        color: #333;
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
      }

      .login-card-body {
        padding: 30px;
      }

      .form-control {
        padding: 15px;
        font-size: 16px;
        border-radius: 5px;
        margin-bottom: 15px;
      }

      .btn {
        padding: 15px;
        font-size: 16px;
        border-radius: 5px;
      }

      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        width: 100%; /* Agar tombol sejajar dengan input form */
      }

      .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
      }
    </style>
</head>
<body>
  <div class="login-box">
    <div class="login-logo">
      <a href="/"><img src="{{ url('/logo/Logo.svg') }}">
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

        <form action="{{route('login')}}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="username" class="form-control" id="username" name="username" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
