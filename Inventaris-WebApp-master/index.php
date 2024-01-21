<?php
session_start();
include 'config/config.php';

if (!isset($_SESSION['nama'])) {
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sarana dan Prasarana | SMKN 1 XXXXX</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion no-print" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center no-print" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-align-right"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inventaris</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=dashboard">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <?php if ($_SESSION['level'] == 1) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
          Main Menu
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=petugas">
            <i class="fas fa-fw fa-users"></i>
            <span>Petugas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=Supplier">
            <i class="fas fa-fw fa-building"></i>
            <span>Supplier</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=Ruang">
            <i class="fas fa-fw fa-building"></i>
            <span>Ruang</span>
          </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

      <?php endif ?>

      <!-- Heading -->
      <div class="sidebar-heading">
        Manajemen Barang
      </div>

      <li class="nav-item">
        <a class="nav-link" href="index.php?page=Barang">
          <i class="fas fa-fw fa-box-open"></i>
          <span>Barang</span>
        </a>
      </li>
      <?php if ($_SESSION['level'] == 1) : ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=BarangMasuk">
            <i class="fas fa-fw fa-download"></i>
            <span>Barang Masuk</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?page=BarangKeluar">
            <i class="fas fa-fw fa-upload"></i>
            <span>Barang Keluar</span>
          </a>
        </li>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="index.php?page=Peminjaman">
          <i class="fas fa-fw fa-hands-helping"></i>
          <span>Peminjaman</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow no-print">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo  $_SESSION['nama']; ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <?php


          if (isset($_GET['page'])) {
            switch ($_GET['page']) {
              case 'dashboard':
                include 'views/dashboard/index.php';
                include 'views/peminjaman/index.php';
                break;
                // Petugas //
              case 'petugas':
                include 'views/petugas/index.php';
                break;
              case 'TambahPetugas':
                include 'views/petugas/tambah.php';
                break;
              case 'UbahPetugas':
                include 'views/petugas/ubah.php';
                break;
              case 'HapusPetugas':
                include 'views/petugas/hapus.php';
                break;

                // Ruang //
              case 'Ruang':
                include 'views/ruang/index.php';
                break;
              case 'TambahRuang':
                include 'views/ruang/tambah.php';
                break;
              case 'UbahRuang':
                include 'views/ruang/ubah.php';
                break;
              case 'HapusRuang':
                include 'views/ruang/hapus.php';
                break;

                // Supplier //
              case 'Supplier':
                include 'views/supplier/index.php';
                break;
              case 'TambahSupplier':
                include 'views/supplier/tambah.php';
                break;
              case 'UbahSupplier':
                include 'views/supplier/ubah.php';
                break;
              case 'HapusSupplier':
                include 'views/supplier/hapus.php';
                break;

                // Barang //
              case 'Barang':
                include 'views/barang/index.php';
                break;
              case 'TambahBarang':
                include 'views/barang/tambah.php';
                break;
              case 'UbahBarang':
                include 'views/barang/ubah.php';
                break;
              case 'HapusBarang':
                include 'views/barang/hapus.php';
                break;

                // Barang Masuk //
              case 'BarangMasuk':
                include 'views/barang_masuk/index.php';
                break;
              case 'TambahBarangMasuk':
                include 'views/barang_masuk/tambah.php';
                break;

                // Barang Keluar //
              case 'BarangKeluar':
                include 'views/barang_keluar/index.php';
                break;
              case 'TambahBarangKeluar':
                include 'views/barang_keluar/tambah.php';
                break;

                // Barang Masuk //
              case 'Peminjaman':
                include 'views/peminjaman/index.php';
                break;
              case 'TambahPeminjaman':
                include 'views/peminjaman/tambah.php';
                break;
              case 'Kembali':
                include 'views/peminjaman/kembali.php';
                break;

              default:

                break;
            }
          } else {
            include 'views/dashboard/index.php';
            include 'views/peminjaman/index.php';
          }

          ?>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan tombol "Logout" jika Anda yakin ingin keluar</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.datatables').DataTable();
      $('#print').on('click', function() {

        window.print();
      });
    });
  </script>

</body>

</html>