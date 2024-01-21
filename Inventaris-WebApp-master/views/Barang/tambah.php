<?php 

    // Membuat Kode Barang //

    $query = "SELECT RIGHT(kode_inventaris,4) as kode FROM inventaris ORDER BY kode DESC LIMIT 1";
    
    $result = mysqli_query($conn, $query);
    

    if (mysqli_num_rows($result) <> 0) {
        //jika kode sudah ada.      
        $data = mysqli_fetch_assoc($result);
        $kode = intval($data['kode']) + 1;
    } else {
        //jika kode belum ada      
        $kode = 1;
    }

    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); // Membuat Kode jadi 4 Digit
    $kodebarang = "BRG" . $kodemax;    // Hasil

 ?>

<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Barang</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" class="mb-3">
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama barang" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_inventaris">Kode</label>
                        <input type="text" class="form-control" name="kode_inventaris" id="kode_inventaris" placeholder="Nama barang" value="<?php echo $kodebarang ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="kondis barang" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="ketikan keterangan disini..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_ruang">Ruangan</label>
                        <select name="id_ruang" id="id_ruang" class="form-control">
                            <option value="" selected disabled>-- pilih ruangan --</option>
                            <option value="4">A</option>
                            <option value="5">B</option>
                        </select>
                            <?php 
                                $query = "SELECT * FROM ruang WHERE status = 1";
                                $result = mysqli_query($conn, $query);
                                while ($ruang = mysqli_fetch_assoc($result)) {
                                    if ($ruang['id_ruang'] != 1) {
                                        ?>
                                        <option value="<?php echo $ruang['id_ruang'] ?>"><?php echo $ruang['nama_ruang']; ?></option>
                                        <?php
                                    }
                                }
                             ?>
                        </select>
                    </div>
                    <div class="form-inline">
                        <span class="ml-auto">
                            <a href="index.php?page=Barang" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </span>
                    </div>
                </form>
                <?php
                ob_start();
                if (isset($_POST['submit'])) {
                    $nama     = $_POST['nama'];
                    $kode_inventaris     = $_POST['kode_inventaris'];
                    $kondisi = $_POST['kondisi'];
                    $keterangan = $_POST['keterangan'];
                    $id_ruang = $_POST['id_ruang'];

                    $query = "INSERT INTO inventaris (nama, kode_inventaris, kondisi, keterangan, id_ruang) VALUES ('$nama', '$kode_inventaris', '$kondisi', '$keterangan', '$id_ruang')";
                    if (mysqli_query($conn, $query)) {
                        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Barang">';
                } else {
                    ?>
                        <div class="alert alert-danger">
                            Gagal Menambahkan Data!
                        </div>
                    <?php
                }
            }
            ob_flush();
            ?>
            </div>
        </div>
    </div>
</div>