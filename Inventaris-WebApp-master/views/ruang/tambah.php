<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Ruangan</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" class="mb-3">
                    <div class="form-group">
                        <label for="nama_ruang">Nama Ruangan</label>
                        <input type="text" class="form-control" name="nama_ruang" id="nama_ruang" placeholder="Nama ruangan" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_ruang">Kode Ruangan</label>
                        <input type="text" class="form-control" name="kode_ruang" id="kode_ruang" placeholder="Kode Ruangan" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <span class="ml-auto">
                            <a href="index.php?page=Ruang" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </span>
                    </div>
                </form>
                <?php
                ob_start();
                if (isset($_POST['submit'])) {
                    $nama_ruang     = $_POST['nama_ruang'];
                    $kode_ruang = $_POST['kode_ruang'];
                    $status = $_POST['status'];

                    $query = "INSERT INTO ruang (nama_ruang, kode_ruang, status) VALUES ('$nama_ruang', '$kode_ruang', '$status')";
                    if (mysqli_query($conn, $query)) {
                        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Ruang">';
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