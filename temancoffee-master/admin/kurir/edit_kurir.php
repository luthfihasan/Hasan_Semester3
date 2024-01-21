
    <?php
      	include"../../koneksi.php";
       	$no = 1;
      	$id = $_POST['id'];
      	$data = mysqli_query($koneksi, " select*from kurir where id_kurir = '$id'");
      	$row = mysqli_fetch_array($data);
    ?>
        <form role="form" id="form-edit" method="post" action="aksi_query.php">
       
            <input type="hidden" name="id_kurir" value="<?php echo $row['id_kurir']; ?>">
       
            <input type="hidden" name="aksi" value="update">
	     
            		<div class="form-group">
                     <label>Nama Kurir</label>
                     <input class="form-control" id="kurir" name="nama"  required="required" placeholder="Nama Kurir" value="<?php echo $row['nama_kurir']; ?>">
                </div>
                <div class="form-group">
                     <label>Biaya Kurir</label>
                     <input type="number" class="form-control" id="kurir" name="biaya"  required="required" placeholder="Biaya Kurir" value="<?php echo $row['biaya_kurir']; ?>">
                </div>
                <div class="form-group">
                     <label>Waktu Pengiriman</label>
                     <input class="form-control" id="kurir" name="waktu"  required="required" placeholder="Waktu Pengiriman" value="<?php echo $row['waktu_pengiriman']; ?>">
                </div>
            
        </form>