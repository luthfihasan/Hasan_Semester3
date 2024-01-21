
<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Barang Masuk</h6>
            </div>
            <div class="card-body">
                <?php
                ob_start();
                if (isset($_POST['submit'])) {
                    $id_inventaris     = $_POST['id_inventaris'];
                    $jumlah_keluar     = $_POST['jumlah_keluar'];
                    $penerima = $_POST['penerima'];
                    $keperluan = $_POST['keperluan'];

                    $queryBarang = "SELECT jumlah FROM inventaris WHERE id_inventaris = $id_inventaris";
                    $resultBarang = mysqli_query($conn, $queryBarang);
                    $jumlah = mysqli_fetch_assoc($resultBarang);

                    $hasil = $jumlah['jumlah'] - $jumlah_keluar;

                    if ($hasil >= 0) {
                        mysqli_query($conn, "UPDATE inventaris SET jumlah = '$hasil' WHERE id_inventaris = $id_inventaris");

                        $query = "INSERT INTO barang_keluar (id_inventaris, jumlah_keluar, penerima, keperluan) VALUES ('$id_inventaris', '$jumlah_keluar', '$penerima', '$keperluan')";

                        if (mysqli_query($conn, $query)) {
                            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=BarangMasuk">';
                        } else {
                            ?>
                                <div class="alert alert-danger">
                                    Gagal Menambahkan Data!
                                </div>
                            <?php
                        }
                    } else {
                        ?>
                            <div class="alert alert-danger">
                                Barang yang tersedia adalah <?php echo $jumlah['jumlah']; ?>
                            </div>
                        <?php
                    }

                    
            }
            ob_flush();
            ?>
                <form action="" method="post" class="mb-3">
                    <div class="form-group">
                        <label for="id_inventaris">Nama Barang</label>
                        <select name="id_inventaris" id="id_inventaris" class="form-control">
                            <option value="" selected disabled>-- pilih barang --</option>
                            <?php 
                                $query = "SELECT * FROM inventaris WHERE jumlah >= 1";
                                $result = mysqli_query($conn, $query);
                                while ($barang = mysqli_fetch_assoc($result)) {
                           
                                    ?>
                                    <option value="<?php echo $barang['id_inventaris'] ?>"><?php echo $barang['nama']; ?> - <?php echo $barang['jumlah']; ?> Tersedia</option>
                                    <?php
                                }
                 
                             ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_keluar">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah_keluar" id="jumlah_keluar" placeholder="Jumlah keluar" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="penerima">Penerima</label>
                        <input type="text" name="penerima" id="penerima" class="form-control" required autocomplete="off" placeholder="Nama penerima">
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <textarea class="form-control" id="keperluan" name="keperluan" placeholder="ketikan keperluan disini..."></textarea>
                    </div>
                    <div class="form-inline">
                        <span class="ml-auto">
                            <a href="index.php?page=BarangKeluar" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </span>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>