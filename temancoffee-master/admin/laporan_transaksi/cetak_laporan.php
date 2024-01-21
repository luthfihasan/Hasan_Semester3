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
  <div class="container">

    <br><br>
    <?php
    $mulai1 =  $_GET['mulai'];
    $selesai1 =  $_GET['selesai'];
    ?>

    <h2 class="text-center">Laporan Transaksi Tanggal <?php echo $mulai1; ?> - <?php echo $selesai1; ?></h2>
    <hr><br><br>

    <?php

    $semuadata=array(); 

    $ambil = $koneksi->query("SELECT * FROM transaksi WHERE tgl_transaksi BETWEEN '$mulai1' AND '$selesai1'");
    while($pecah = $ambil->fetch_assoc()) {
      $semuadata[] = $pecah;
    }

    ?>
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

            <?php } ?>
          </tr>
        </tfoot>
      </table>
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


<script>
  window.print();
</script>