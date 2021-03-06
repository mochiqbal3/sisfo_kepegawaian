
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>JUDUL</title>
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/css/style.css">
    <link href='<?=base_url("assets/uploads/images/avatar.png"); ?>' rel='shortcut icon' type='image/x-icon' />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="max-height: 60px;">
        <!-- Left navbar links -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" user="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        
        <span class="navbar-text" style="padding-right: .5rem; padding-top: 10px; padding-bottom: 0px; ">
        
        <div class="user-panel mt-3 pb-3 mb-3 d-flex " style="overflow: inherit; ">
        <div class="info">
              <?= $this->session->userdata('name') ?>
        </div>
        <div class="image">
        <div class="dropdown">
        <img src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/img/user2-160x160.jpg" class="img-circle " alt="User Image" id="dropdownMenuButton" data-toggle="dropdown" aria-pressed="true">
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?= base_url();?>profile">Profile</a>
              <a class="dropdown-item" href="<?=base_url();?>auth/logout">Logout</a>
            </div>
            
        </span>
        <!-- Right navbar links -->
      </nav>
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?=base_url();?>/dashboard" class="brand-link">
          <img src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">Working Report</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" user="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
              <li class="nav-item">
                <a href="<?=base_url();?>dashboard" class="nav-link">
                  <i class="nav-icon fa fa-home"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
                <?php
                if($this->session->userdata('role') == 1){
              ?>
              <li class="nav-header">USERS</li>
                <li class="nav-item">
                  <a href="<?=base_url();?>user" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                    <p>
                      Data User
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url();?>role" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p>
                      Role
                    </p>
                  </a>
                </li>
              <?php
                }
              ?>
                
              <?php
                if($this->session->userdata('role') == 2){
                ?>
                <li class="nav-header">CUTI</li>
               <li class="nav-item">
                  <a href="<?=base_url();?>cuti" class="nav-link">
                    <i class="nav-icon fa fa-suitcase"></i>
                    <p>
                      Pengajuan Cuti
                    </p>
                  </a>
                </li>
                <li class="nav-header">PELATIHAN</li>
                <li class="nav-item">
                  <a href="<?=base_url();?>penunjuk_pelatihan" class="nav-link">
                   <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>
                      Permohonan Pelatihan
                    </p>
                  </a>
                </li>
              <?php
                }
              ?>

              <?php
                if($this->session->userdata('role') == 3){
                ?>
                <li class="nav-header">PEGAWAI</li>
                <li class="nav-item">
                  <a href="<?=base_url();?>pegawai" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                    <p>
                      Daftar Pegawai
                    </p>
                  </a>
                </li>
              <li class="nav-header">CUTI</li>
               <li class="nav-item">
                <a href="<?=base_url();?>cuti/approval/" class="nav-link">
                  <i class="nav-icon fa fa-check-square"></i>
                  <p>
                    Persetujuan Cuti
                  </p>
                </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url();?>cuti/riwayat" class="nav-link">
                  <i class="nav-icon fa fa-suitcase"></i>
                    <p>
                      Riwayat Cuti
                    </p>
                  </a>
                </li>
                <li class="nav-header">PELATIHAN</li>
                <li class="nav-item">
                  <a href="<?=base_url();?>penunjuk_pelatihan" class="nav-link">
                   <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>
                      Penunjukan Pelatihan
                    </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?=base_url();?>penunjuk_pelatihan/riwayat" class="nav-link">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>
                      Riwayat Penunjukan Pelatihan
                    </p>
                  </a>
                </li>

                <?php
                }
                ?>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
            </div>
          </div>
        </div>

        <!-- /.content -->
        <?php
            error_reporting(0);
            $this->load->view($content)
          ?>
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <strong>Copyright &copy; 2021 <a href="http://adminlte.io">Working Report</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 1.0.0
        </div>
      </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/moment/moment.min.js"></script>
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/dist/js/demo.js"></script>
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets');?>/vendor/AdminLTE-3.0.5/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

    <script>
    </script>
    <script>
      $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('.select2').select2();
        $('#tanggalMulai').datetimepicker({
            format: 'L'
        });
        $('#tanggalSelesai').datetimepicker({
            format: 'L'
        });
      });
    </script>
  </body>
</html>
