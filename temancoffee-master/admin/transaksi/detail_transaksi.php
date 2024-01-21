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
      <li><a class="app-menu__item" href="../kurir/kurir.php"><i class="app-menu__icon fa fa-truck"></i><span class="app-menu__label">kurir</span></a></li>
      <li><a class="app-menu__item active" href="transaksi.php"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Transaksi</span></a></li>
      <li><a class="app-menu__item" href="../customer/customer.php"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Customer</span></a></li>
      <li><a class="app-menu__item" href="../laporan_transaksi/laporan_transaksi.php"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Laporan Transaksi</span></a></li>
    </ul>

  </aside>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-desktop"></i> Detail transaksi</h1>
        <p>Detail Transaksi TEMAN COFFEE</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">transaksi</a></li>
        <li class="breadcrumb-item"><a href="#">Detail Transaksi</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <?php 
            $id_transaksi = $_GET['id_transaksi'];
            $query= mysqli_query ($koneksi, " select *  from transaksi where id_transaksi = '$id_transaksi' order by id_transaksi desc");
            $data= mysqli_fetch_array ($query);
            ?>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Status</b></label>
              <div class="col-sm-10">
                Saat Ini : <b><?php echo $data['status']; ?></b><br><br>

                <form method="POST" action="aksi_detail.php">
                  <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>">
                  <select class="form-control" id="status" name="status" required="required">
                   <option value="<?php echo $data['status']; ?>" selected disabled="true"><?php echo $data['status']; ?></option>
                   <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                   <option value="Pesanan Diproses">Pesanan Diproses</option>
                   <option value="Pesanan Dikirim">Pesanan Dikirim</option>
                   <option value="Transaksi Selesai">Transaksi Selesai</option>
                 </select>
                 <br>
                 <input type="hidden" name="aksi" value="ubah_status">
                 <input type="submit" name="submit" class="btn btn-primary" value="Submit">
               </form>

             </div>
           </div>

           <hr>
           <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Tgl Transaksi</b></label>
            <div class="col-sm-10">
              <b><?php echo $data['tgl_transaksi']; ?></b>
            </div>
          </div>
          <hr>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Id Transaksi</b></label>
            <div class="col-sm-10">
              <b><?php echo $data['id_transaksi']; ?></b>
            </div>
          </div>
          <hr>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Daftar Product</b></label>
            <div class="col-sm-10">
              <table class="table table-borderless">
                <tr>
                  <th class="text-center">
                    Product
                  </th>
                  <th class="text-center">
                    Harga
                  </th>
                  <th class="text-center">
                    Qty
                  </th>
                  <th class="text-center">
                    Subtotal
                  </th>
                </tr>
                <?php 
                $query_keranjang= mysqli_query ($koneksi, " select *  from keranjang where id_transaksi = '$id_transaksi' order by id_keranjang desc");
                while ($keranjang= mysqli_fetch_array ($query_keranjang))
                  { ?>

                <tr>
                  <td class="text-center">
                    <?php echo $keranjang['nama_product']; ?>
                  </td>
                  <td class="text-center">
                    Rp.<?php echo number_format($keranjang['harga']); ?>
                  </td>
                  <td class="text-center">
                    <?php echo $keranjang['qty']; ?>
                  </td>
                  <td class="text-center">
                    Rp.<?php echo number_format($keranjang['subtotal']); ?>
                  </td>
                </tr>
                <?php } ?>
              </table>

            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Total Harga</b></label>
            <div class="col-sm-10">
              <?php 
              $total_belanja = mysqli_query($koneksi,"SELECT SUM(subtotal) AS total from keranjang where id_transaksi = '$id_transaksi' ");
              $total_harga = mysqli_fetch_array($total_belanja);
              ?>
              Rp.<?php echo number_format($total_harga['total']); ?>
            </div>
          </div>
          <hr>

          <?php 
          $kurir =  $data['kurir'];
          $query_kurir = mysqli_query($koneksi,"SELECT*FROM kurir where nama_kurir = '$kurir' ");
          $kurir = mysqli_fetch_array($query_kurir); ?>

          <div class="form-group">
            <label for="exampleInputEmail1"><b>Informasi Pengiriman</b></label>

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Nama Penerima</b></label>
              <div class="col-sm-10">
                <?php echo $data['nama_customer']; ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Kurir</b></label>
              <div class="col-sm-10">
                <?php echo $kurir['nama_kurir']; ?>
                <br>
                Akan Diterima Sekitar : <?php echo $kurir['waktu_pengiriman']; ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"><b>No Resi</b></label>
              <div class="col-sm-7">
               <form method="POST" action="aksi_detail.php">
                <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>">
                <input type="text" name="no_resi" class="form-control" value="<?php echo $data['no_resi']; ?>"><br>
                <input type="hidden" name="aksi" value="input_resi">
                <input type="submit" name="submit" class="btn btn-primary" value="Update Resi">
              </form>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Alamat Pengiriman</b></label>
            <div class="col-sm-10">
              <?php echo $data['alamat']; ?>
            </div>
          </div>
        </div>
        <hr>
        <div class="form-group">
          <label for="exampleInputEmail1"><b>Informasi Pembayaran</b></label>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Total Harga</label>
            <div class="col-sm-10">

              Rp.<?php echo number_format($total_harga['total']); ?>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Ongkos Kirim</label>
            <div class="col-sm-10">
              Rp.<?php echo number_format($kurir['biaya_kurir']); ?>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label"><b>Total Pembayaran</b></label>
            <div class="col-sm-10">
              Rp.<?php echo number_format($data['total']); ?>
            </div>
          </div>
        </div>
        <hr>
        <?php  
        $no_rek =  $data['no_rek'];

        $query_rek = mysqli_query($koneksi,"SELECT*FROM rekening where no_rek = '$no_rek' ");
        $rek = mysqli_fetch_array($query_rek);
        ?>

        <div class="form-group">
          <label for="exampleInputEmail1"><b>Tujuan Transfer</b></label>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Bank</label>
            <div class="col-sm-10">
             Bank <?php echo $rek['nama_bank']; ?>
           </div>
         </div>
         <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">No Rekening</label>
          <div class="col-sm-10">
           <?php echo $rek['no_rek']; ?>
         </div>
       </div>
       <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Atas Nama</label>
        <div class="col-sm-10">
         <?php echo $rek['atas_nama']; ?>
       </div>
     </div>
   </div>

   <?php 
   $query_bukti = mysqli_query($koneksi,"SELECT*FROM bukti_transaksi where id_transaksi = '$id_transaksi' ");
   $bukti = mysqli_fetch_array($query_bukti);
   ?>

   <div class="form-group">
    <label for="exampleInputEmail1"><b>Bukti Transaksi</b></label>

    <?php if ($bukti == null) {

      ?>
      <h5>Belum Mengirim Bukti Transaksi</h5>
      <?php }else{ ?>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Bukti Transaksi</label>
        <div class="col-sm-10">
          <a href="#" data-toggle="modal" data-target="#detail-transaksi">
            <img src="../../assets/bukti_transaksi/<?php echo $bukti['bukti_transaksi']; ?>" width="100px" height="100px">
          </a>

         <!--  <a href="../../assets/bukti_transaksi/<?php echo $bukti['bukti_transaksi']; ?>" data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
            <img src="../../assets/bukti_transaksi/<?php echo $bukti['bukti_transaksi']; ?>" class="img-fluid rounded" width="100px" height="100px">
          </a> -->



        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
        <div class="col-sm-10">

          Saat Ini : <b><?php echo $bukti['status']; ?></b><br><br>
          <form method="POST" action="aksi_detail.php">
           <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi'] ?>">
           <select class="form-control" id="status" name="status" required="required">
             <option value="<?php echo $data['status']; ?>" selected disabled="true"><?php echo $bukti['status']; ?></option>
             <option value="Valid">Valid</option>
             <option value="Tidak Valid">Tidak Valid</option>
           </select>
           <br>
           <input type="hidden" name="aksi" value="bukti_transaksi">
           <input type="submit" name="submit" class="btn btn-primary" value="Submit">
         </form>

       </div>
     </div>

     <?php } ?>

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
<script src="../docs/js/plugins/pace.min.js"></script>
<script src="ajax_transaksi.js"></script>
<!-- Page specific javascripts-->
<!-- Google analytics script-->
</body>
</html>

<div id="detail-transaksi" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Bukti Transaksi</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
       <img src="../../assets/bukti_transaksi/<?php echo $bukti['bukti_transaksi']; ?>" width="100%" height="100%">
     </div>
   </form>   
 </div>
</div>
</div>
