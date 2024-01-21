<?php
$id = $_GET['id'];

$query = "SELECT * FROM ruang WHERE id_ruang = $id";
$result = mysqli_query($conn, $query);
$ruang = mysqli_fetch_assoc($result);

?>

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
                        <input type="text" class="form-control" name="nama_ruang" id="nama_ruang" placeholder="Nama ruangan" autocomplete="off" value="<?php echo $ruang['nama_ruang'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_ruang">Kode Ruangan</label>
                        <input type="text" class="form-control" name="kode_ruang" id="kode_ruang" placeholder="Kode Ruangan" autocomplete="off" value="<?php echo $ruang['kode_ruang'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option <?php if ($ruang['status'] == 1) : echo "selected" ?><?php endif ?> value="1">Aktif</option>
                            <option <?php if ($ruang['status'] == 0) : echo "selected" ?><?php endif ?> value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <a href="index.php?page=HapusRuang&id=<?php echo $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda yakin ingin menghapus data <?php echo $ruang['nama_ruang'] ?>')">Hapus</a>
                        <span class="ml-auto">
                            <a href="index.php?page=Ruang" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </span>
                    </div>
                </form>


                <?php

                if (isset($_POST['submit'])) {
                    $nama_ruang     = $_POST['nama_ruang'];
                    $kode_ruang = $_POST['kode_ruang'];
                    $status = $_POST['status'];

                    $query = "UPDATE ruang SET nama_ruang = '$nama_ruang', kode_ruang = '$kode_ruang', status = '$status' WHERE id_ruang = $id";
                    if (mysqli_query($conn, $query)) {
                        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Ruang">';
                } else {
                    ?>
                        <div class="alert alert-danger">
                            Gagal Mengubah Data!
                        </div>
                    <?php
                }
            }

            ?>

            </div>
        </div>
    </div>
</div>