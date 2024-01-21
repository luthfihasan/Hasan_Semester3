<?php 
include '../../koneksi.php';
include '../ceklogin.php';
 ?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blank Page - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../docs/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../docs/fa/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="../index.php">TEMAN COFFEE</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="../logout.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../../assets/img/admin_icon.png" alt="User Image" width="60px" height="60px">
        <div>
          <?php 
             $id_admin = $_SESSION['id_admin']; 
             $q_user = mysqli_query($koneksi,"SELECT*FROM admin where id_admin = '$id_admin'"); 
             $user = mysqli_fetch_array($q_user);
          ?>
          <p class="app-sidebar__user-name"><?php echo $user['nama_admin']; ?></p>
          <p class="app-sidebar__user-designation">Admin</p>
        </div>
      </div>

     <ul class="app-menu">
        <li><a class="app-menu__item" href="../index.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item active" href="kategori.php"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Kategori</span></a></li>
         <li><a class="app-menu__item" href="../rekening/rekening.php"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">No Rekening</span></a></li>
        <li><a class="app-menu__item" href="../product/product.php"><i class="app-menu__icon fa fa-desktop"></i><span class="app-menu__label">Product</span></a></li>
        <li><a class="app-menu__item" href="../kurir/kurir.php"><i class="app-menu__icon fa fa-truck"></i><span class="app-menu__label">Kurir</span></a></li>
         <li><a class="app-menu__item" href="../transaksi/transaksi.php"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Transaksi</span></a></li>
         <li><a class="app-menu__item" href="../customer/customer.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Customer</span></a></li>
         <li><a class="app-menu__item" href="../laporan_transaksi/laporan_transaksi.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Laporan Transaksi</span></a></li>
      </ul>

    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-desktop"></i> kategori</h1>
          <p>Data kategori TEMAN COFFEE</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">kategori</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">Add New</button><br> <br>

              <div id="data-kategori"></div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../docs/js/jquery-3.2.1.min.js"></script>
    <script src="../docs/js/popper.min.js"></script>
    <script src="../docs/js/bootstrap.min.js"></script>
    <script src="../docs/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../docs/js/plugins/pace.min.js"></script>
    <script src="ajax_kategori.js"></script>

  </body>
</html>

<div id="modal-tambah" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form role="form" id="form-tambah" method="post" action="aksi_query.php">
        <div class="modal-header">
          <h4 class="modal-title">Menambahkan kategori</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <div class="modal-body">
                <div class="form-group">
                     <label>Kategori</label>
                     <input class="form-control" id="kategori" name="kategori"  required="required" placeholder="Kategori">
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          <input type="hidden" name="aksi" value="insert">
        </form>   
      </div>
    </div>
  </div>
  
  
  <div id="modal-edit" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form role="form" id="form-edit" method="post" action="update_kategori.php">
        <div class="modal-header">
          <h4 class="modal-title">Edit kategori</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <div class="modal-body">
            <div id="data-edit">
            </div>        
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
          </div>
        </form>   
      </div>
    </div>
  </div> 

  <div id="modal-hapus" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Delete kategori</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <div class="modal-body">
           <div id="delete-kategori"></div>
          </div>
        </form>   
      </div>
    </div>
  </div>