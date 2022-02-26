<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kadharma Outwear | Reset Passwod</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adm/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adm/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adm/dist/css/adminlte.min.css')}}">
  <style type="text/css">
    .login-page, .register-page {
      background-image: url('{{ url('shop/images/LOGOLOGINDAFTAR.jpg') }}');
      background-size:cover;
    }

    .login-card-body, .register-card-body {
      background-color: #212529;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <image src="{{ asset('adm/image/LOGOATAS.png') }}" style="height: 100%; width: 100%;" />
    <!-- <a style="color: yellow; href="../../index2.html"><b>Vano</b>Outwear</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p style="color: #ffc107" class="login-box-msg">Reset Password</p>

      <form method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="new_password" placeholder="New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="new_password_confirm" placeholder="Confirm New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-warning btn-block">Reset</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->

      <div class="row" style="margin-top: 30px;">
        <p class="col-6">
          <a style="color: #dc3545;" href="/login">Masuk untuk Belanja</a>
        </p>
        <p class="col-6">  
          <a style="color: #dc3545;" href="/register" class="">Registrasi Akun Baru</a>
        </p>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('adm/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adm/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adm/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
