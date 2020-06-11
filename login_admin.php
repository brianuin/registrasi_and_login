<?php
session_start();

if(isset($_SESSION['user'])){
  header('location:dashboard_admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        <div class="login-logo">
            <a href="#"><b>Login</b> Admin</a>
        </div>

      <form id="form_login_admin" action="#" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="nip" placeholder="NIP" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
    </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  let form_login = document.querySelector('#form_login_admin');

form_login.addEventListener('submit', login);

function login(e){
  console.log('test');
  let nip = document.getElementById('nip').value;
  let password = document.getElementById('password').value;

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
      type: 'POST',
      url: 'php/core.php',
      data: {
        type: 'login',
        nip : nip,
        password : password,
        table : 'login_admin'
      },
      // dataType: 'json',
      success: function(data) {
        if(data == 1){
          Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Your Data Successfully Saved',
              showConfirmButton: false,
              timer: 1500
          });
          location.href = 'dashboard_admin.php';
        }else{
          Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Failed to Login',
              showConfirmButton: false,
              timer: 1500
          });
        }
        
      },
      error: function(data) {
          console.log(data);
          
      }
  });

  e.preventDefault();
  
}
</script>

</body>
</html>
