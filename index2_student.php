<?php session_start();
  if(!isset($_SESSION['no_peserta'])){
    header('location:index_student.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dashboard Siswa</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Febrian</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Registrasi Ulang
              </p>
            </a>
          </li>
          <?php
            
            if(isset($_SESSION['no_peserta'])){?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p id="logout">
                    Logout
                  </p>
                </a>
              </li>
            <?php } 
          ?>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Biodata Siswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form_biodata" role="form" action="#" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="no_peserta">No. Peserta</label>
                                            <input type="text" class="form-control" id="no_peserta" placeholder="Nomor Peserta" nama="no_peserta" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tempat_tanggal_lahir">Tempat Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="tempat_tanggal_lahir" placeholder="Tempat Tanggal Lahir" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="sekolah_asal">Sekolah Asal</label>
                                          <input type="text" class="form-control" id="sekolah_asal" placeholder="Sekolah Asal" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pilihan Jurusan</label>
                                            <select id="jurusan" class="form-control select2" style="width: 100%;">
                                              <option selected="selected">IPA</option>
                                              <option>IPS</option>
                                              <option>Bahasa</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" id="alamat" placeholder="Alamat" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="rata_rata_nilai_akhir">Rata Rata Nilai Akhir</label>
                                          <input type="text" class="form-control" id="rata_rata_nilai_akhir" placeholder="Rata Rata Nilai Akhir" required>
                                      </div>
                                      <div class="form-group">
                                        <label for="tahun_lulus">Tahun Lulus</label>
                                        <input type="text" class="form-control" id="tahun_lulus" placeholder="Tahun Lulus" required>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                                <input type="submit" class="btn btn-success swalDefaultSuccess" value="SIMPAN"/>
                            </div>
                        </form>
                    </div>
                <!-- /.card -->
                </div>
            </div>
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
    $('.select2').select2();

    $(function() {
        $('.swalDefaultSuccess').click(function(e) {
          e.preventDefault();
            Swal.fire({
            title: 'Are you sure want to save this ?',
            // text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save',
            confirmButtonClass: 'save_btn'
            });

            let form_biodata = document.querySelector('#form_biodata');

            form_biodata.addEventListener('submit', storeData);

              function storeData(e){
                let no_peserta= document.querySelector('#no_peserta').value;
                let nama_lengkap = document.querySelector('#nama_lengkap').value;
                let tempat_tanggal_lahir = document.querySelector('#tempat_tanggal_lahir').value;
                let jurusan = document.querySelector('#jurusan').value;
                let alamat = document.querySelector('#alamat').value;
                let rata_rata_nilai_akhir = document.querySelector('#rata_rata_nilai_akhir').value;
                let tahun_lulus = document.querySelector('#tahun_lulus').value;

                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

                  $.ajax({
                      type: 'POST',
                      url: 'php/core.php',
                      data: {
                        type:'store_biodata',
                        no_peserta: no_peserta, 
                        nama_lengkap : nama_lengkap,
                        tempat_tanggal_lahir : tempat_tanggal_lahir, 
                        jurusan : jurusan, 
                        alamat : alamat,
                        rata_rata_nilai_akhir : rata_rata_nilai_akhir,
                        tahun_lulus : tahun_lulus
                        },
                      // dataType: 'json',
                      success: function(data) {
                        console.log(data);
                        if(data == 1){
                          Swal.fire(
                          {
                              position: 'center',
                              icon: 'success',
                              title: 'Your Data Successfully Saved',
                              showConfirmButton: false,
                              timer: 1500
                          });
                        }else{
                          Swal.fire(
                          {
                              position: 'center',
                              icon: 'error',
                              title: 'Your Data Failed to be Saved',
                              showConfirmButton: false,
                              timer: 1500
                          });
                        }
                      },
                      error: function(data) {
                          console.log(data);
                          Swal.fire(
                          {
                              position: 'center',
                              icon: 'error',
                              title: 'Your Data Failed to be Saved',
                              showConfirmButton: false,
                              timer: 1500
                          });
                      }
                  });

                  e.preventDefault();
              }

        });
});

let logout = document.getElementById('logout');
logout.addEventListener('click', logoutProc);

function logoutProc(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'POST',
        url: 'php/core.php',
        data: {
          type:'logout'
          },
        // dataType: 'json',
        success: function(data) {
          console.log(data);
          if(data == 1){
            Swal.fire(
            {
                position: 'center',
                icon: 'success',
                title: 'Your Data Successfully Saved',
                showConfirmButton: false,
                timer: 1500
            });
            location.href = 'index_student.php';
          }else{
            Swal.fire(
            {
                position: 'center',
                icon: 'error',
                title: 'Your Data Failed to be Saved',
                showConfirmButton: false,
                timer: 1500
            });
          }
        },
        error: function(data) {
            console.log(data);
            Swal.fire(
            {
                position: 'center',
                icon: 'error',
                title: 'Your Data Failed to be Saved',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });
}
</script>
<script src="js/crud_ajax.js"></script>
</body>
</html>
