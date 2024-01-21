
    <?php
      	include"../../koneksi.php";
       	$no = 1;
      	$id = $_POST['id'];
      	$data = mysqli_query($koneksi, " select*from kategori where id_kategori = '$id'");
      	$row = mysqli_fetch_array($data);
    ?>
        <form role="form" id="form-edit" method="post" action="aksi_query.php">
       
            <input type="hidden" name="id_kategori" value="<?php echo $row['id_kategori']; ?>">
       
            <input type="hidden" name="aksi" value="update">
	     
            		<div class="form-group">
                  <label>kategori</label>
               <input class="form-control" id="kategori" name="kategori"  required="required" value="<?php echo $row['kategori']; ?> ">
                </div>
            
        </form>