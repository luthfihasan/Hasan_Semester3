<?php
$id = $_GET['id'];

$query = "SELECT * FROM supplier WHERE id_supplier = $id";
$result = mysqli_query($conn, $query);
$supplier = mysqli_fetch_assoc($result);

?>

<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Supplier</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" class="mb-3">
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama ruangan" autocomplete="off" value="<?php echo $supplier['nama_supplier'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat_supplier" class="form-control" placeholder="ketikan alamat disini..."><?php echo $supplier['alamat_supplier'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" autocomplete="off" value="<?php echo $supplier['kota'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telephone">Telepon</label>
                        <input type="number" class="form-control" name="no_telephone" id="no_telephone" placeholder="Nomor telepon" autocomplete="off" value="<?php echo $supplier['no_telephone'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option <?php if ($supplier['status'] == 1) : echo "selected" ?><?php endif ?> value="1">Aktif</option>
                            <option <?php if ($supplier['status'] == 0) : echo "selected" ?><?php endif ?> value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <a href="index.php?page=HapusSupplier&id=<?php echo $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda yakin ingin menghapus data <?php echo $supplier['nama_supplier'] ?>')">Hapus</a>
                        <span class="ml-auto">
                            <a href="index.php?page=Supplier" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </span>
                    </div>
                </form>
                <?php
                ob_start();
                if (isset($_POST['submit'])) {
                    $nama_supplier     = $_POST['nama_supplier'];
                    $alamat_supplier = $_POST['alamat_supplier'];
                    $kota = $_POST['kota'];
                    $no_telephone = $_POST['no_telephone'];
                    $status = $_POST['status'];

                    $query = "UPDATE supplier SET nama_supplier = '$nama_supplier', alamat_supplier = '$alamat_supplier', kota = '$kota', no_telephone = '$no_telephone', status = '$status' WHERE id_supplier = $id";
                    if (mysqli_query($conn, $query)) {
                        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Supplier">';
                } else {
                    ?>
                        <div class="alert alert-danger">
                            Gagal mengubah Data!
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