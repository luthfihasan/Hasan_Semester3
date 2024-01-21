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
                    $jumlah_pinjam     = $_POST['jumlah_pinjam'];
                    $id_petugas = $_POST['id_petugas'];
                    $tanggal_pinjam = date('Y-m-d H:i:s');
                    $status_peminjaman = 0;

                    $queryBarang = "SELECT jumlah FROM inventaris WHERE id_inventaris = $id_inventaris";
                    $resultBarang = mysqli_query($conn, $queryBarang);
                    $jumlah = mysqli_fetch_assoc($resultBarang);

                    $hasil = $jumlah['jumlah'] - $jumlah_pinjam;

                    if ($hasil >= 0) {
                        mysqli_query($conn, "UPDATE inventaris SET jumlah = '$hasil' WHERE id_inventaris = $id_inventaris");

                        $query = "INSERT INTO peminjaman (id_inventaris, jumlah_pinjam, id_petugas, tanggal_pinjam, status_peminjaman) VALUES ('$id_inventaris', '$jumlah_pinjam', '$id_petugas', '$tanggal_pinjam', '$status_peminjaman')";

                        if (mysqli_query($conn, $query)) {
                            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Peminjaman">';
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
                            <option value="4">A</option>
                            <option value="5">B</option>
                        </select>
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
                        <label for="jumlah_pinjam">Jumlah Pinjam</label>
                        <input type="number" class="form-control" name="jumlah_pinjam" id="jumlah_pinjam" placeholder="Jumlah Pinjam" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="id_petugas">Peminjam</label>
                        <select name="id_petugas" id="id_petugas" class="form-control" required>
                            <option value="" selected disabled>-- pilih peminjam --</option>
                            <option value="4">y</option>
                            <option value="5">wB</option>
                        </select>
                            <?php
                            $query = "SELECT * FROM petugas WHERE id_level = 3";
                            if ($_SESSION['level'] == 3) {
                                $id_petugas = $_SESSION['id'];
                                $query = "SELECT * FROM petugas WHERE id_level = 3 AND id_petugas = '$id_petugas'";
                            }
                            $result = mysqli_query($conn, $query);
                            while ($peminjam = mysqli_fetch_assoc($result)) {

                                ?>
                                <option value="<?php echo $peminjam['id_petugas'] ?>"><?php echo $peminjam['nama_petugas']; ?></option>
                            <?php
                        }

                        ?>
                        </select>
                    </div>
                    <div class="form-inline">
                        <span class="ml-auto">
                            <a href="index.php?page=Peminjaman" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </span>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>