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
      <li><a class="app-menu__item" href="../kategori/kategori.php"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Kategori</span></a></li>
      <li><a class="app-menu__item" href="../rekening/rekening.php"><i class="app-menu__icon fa fa-credit-card"></i><span class="app-menu__label">No Rekening</span></a></li>
      <li><a class="app-menu__item" href="../product/product.php"><i class="app-menu__icon fa fa-desktop"></i><span class="app-menu__label">Product</span></a></li>
      <li><a class="app-menu__item" href="../kurir/kurir.php"><i class="app-menu__icon fa fa-truck"></i><span class="app-menu__label">Kurir</span></a></li>
      <li><a class="app-menu__item" href="../transaksi/transaksi.php"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Transaksi</span></a></li>
      <li><a class="app-menu__item" href="../customer/customer.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Customer</span></a></li>
      <li><a class="app-menu__item active" href="laporan_transaksi.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Laporan Transaksi</span></a></li>
    </ul>

  </aside>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-desktop"></i> Laporan Transaksi</h1>
        <p>Data Laporan Transaksi TEMAN COFFEE</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Laporan Transaksi</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

            <?php

            $semuadata=array(); 
            $mulai="-";
            $selesai="-";
            if (isset($_POST['lihat'])) {
              $mulai = $_POST['tglm'];
              $selesai = $_POST['tgls'];
              $mulai1 =  date("d M Y h:i", strtotime($mulai));
              $selesai1 =  date("d M Y h:i", strtotime($selesai));
              $ambil = $koneksi->query("SELECT * FROM transaksi WHERE tgl_transaksi BETWEEN '$mulai1' AND '$selesai1'");
              while($pecah = $ambil->fetch_assoc()) {
                $semuadata[] = $pecah;
              }
    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>";
            }

            ?>

            <form method="post">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="tglm" class="form-control" value="<?php echo $mulai ?>">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="tgls" class="form-control" value="<?php echo $selesai ?>">
                  </div>
                </div>
                <div class="col-md-2">
                  <label>&nbsp;</label><br>
                  <button class="btn btn-primary" name="lihat">Lihat</button>
                </div>
              </div>
            </form>
            <div id="laporan_transaksi">
              <table class="table">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <?php $total=0; ?>
                <?php foreach ($semuadata as $key => $value): ?>
                  <?php $total+=$value['total']; ?>

                  <tbody>
                    <tr>
                      <td><?php echo $key+1; ?></td>
                      <td><?php echo $value['nama_customer']; ?></td>
                      <td><?php echo $value['tgl_transaksi']; ?></td>
                      <td>Rp. <?php echo number_format($value['total']); ?></td>
                      <td><?php echo $value['status']; ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>

                <tfoot>
                  <tr>
                    <?php if ($semuadata == null){ ?>

                    <th colspan="2"></th>
                    <th>Tidak Ada Data</th>
                    <th colspan="2"></th>
                    <?php }else{ ?>
                    <th colspan="3">Total</th>
                    <th>Rp. <?php echo number_format($total); ?></th>
                    <th></th>
                    
                     <a href="" onclick="window.open('cetak_laporan.php?mulai=<?php echo $mulai1; ?>&selesai=<?php echo $selesai1; ?> ', 'newwindow','width=800,height=500'); 
                     return false;">Print</a>
                    <?php } ?>
                  </tr>
                  <tr>
                  </tr>
                </tfoot>
              </table>
            </div>


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
</body>
</html>