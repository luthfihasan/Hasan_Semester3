
    <?php
        include"../../koneksi.php";
        $no = 1;
        $id = $_POST['id'];
        $data = mysqli_query($koneksi, " select*from rekening where id_rekening = '$id'");
        $row = mysqli_fetch_array($data);
    ?>
                <form role="form" id="form-edit" method="post" action="aksi_query.php">
       
                <input type="hidden" name="id_rekening" value="<?php echo $row['id_rekening']; ?>">
       
                <input type="hidden" name="aksi" value="update">
             
                <div class="form-group">
                     <label>Nama Bank</label>
                     <input class="form-control" id="rekening" name="nama"  required="required" value="<?php echo $row['nama_bank']; ?>">
                </div>
                <div class="form-group">
                     <label>No.Rekening</label>
                     <input class="form-control" id="rekening" name="no_rek"  required="required" value="<?php echo $row['no_rek']; ?>">
                </div>
                <div class="form-group">
                     <label>Atas Nama</label>
                     <input class="form-control" id="rekening" name="atas_nama"  required="required" value="<?php echo $row['atas_nama']; ?>">
                </div>
                 <div class="form-group">
                     <label>Logo Bank</label>
                     <input type="hidden" name="gambar1" value="<?php echo $row['logo_bank']; ?>">
                     <input type="file" class="form-control" id="rekening" name="gambar2">
                     <?php echo $row['logo_bank']; ?>
                </div>
            
        </form>