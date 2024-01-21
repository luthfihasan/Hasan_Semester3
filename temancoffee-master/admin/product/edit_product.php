
    <?php
        include"../../koneksi.php";
        $no = 1;
        $id = $_POST['id'];
        $data = mysqli_query($koneksi, " select*from product where id_product = '$id'");
        $row = mysqli_fetch_array($data);
    ?>
                <form role="form" id="form-edit" method="post" action="aksi_query.php">
       
                <input type="hidden" name="id_product" value="<?php echo $row['id_product']; ?>">
       
                <input type="hidden" name="aksi" value="update">
             
                <div class="form-group">
                     <label>Nama Product</label>
                     <input class="form-control" id="product" name="nama"  required="required" value="<?php echo $row['nama_product']; ?>">
                </div>
                <div class="form-group">
                     <label>Harga</label>
                     <input class="form-control" id="product" name="harga"  required="required" value="<?php echo $row['harga']; ?>">
                </div>
                <div class="form-group">
                     <label>Description</label>
                     <textarea class="form-control" id="nama" name="desc"  required="required" placeholder="Deskripsi Product"><?php echo $row['description']; ?></textarea> 
                </div>
                <div class="form-group">
                     <label>Stok</label>
                     <input class="form-control" id="product" name="stok"  required="required" value="<?php echo $row['stok']; ?>">
                </div>

                <div class="form-group">
                     <label>Kategori</label>
                     <select class="form-control" id="kategori" name="kategori" required="required">
                     <option value="<?php echo $row['kategori']; ?>"><?php echo $row['kategori']; ?></option>
                     <?php 
                          $q_kategori = mysqli_query($koneksi,"SELECT*FROM kategori"); 
                           while ($data_kat = mysqli_fetch_array($q_kategori)) {

                     if($row['kategori'] == $data_kat['kategori']){
                        continue;
                     }
                     ?>
                      <option value="<?php echo $data_kat['kategori']; ?>"><?php echo $data_kat['kategori']; ?></option>
                       <?php } ?>
                      </select>
              </div>
                 <div class="form-group">
                     <label>Gambar</label>
                     <input type="hidden" name="gambar1" value="<?php echo $row['gambar']; ?>">
                     <input type="file" class="form-control" id="product" name="gambar2">
                     <?php echo $row['gambar']; ?>
                </div>
            
        </form>