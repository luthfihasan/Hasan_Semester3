<?php
$id = $_GET['id'];
$query = "SELECT * FROM inventaris WHERE id_inventaris = $id";
$result = mysqli_query($conn, $query);
$barang = mysqli_fetch_assoc($result);
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
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama barang" autocomplete="off" value="<?php echo $barang['nama'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_inventaris">Kode</label>
                        <input type="text" class="form-control" name="kode_inventaris" id="kode_inventaris" placeholder="Nama barang" value="<?php echo $barang['kode_inventaris'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="text" class="form-control" name="kondisi" id="kondisi" placeholder="kondis barang" autocomplete="off" value="<?php echo $barang['kondisi'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" placeholder="ketikan keterangan disini..."><?php echo $barang['keterangan'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="id_ruang">Ruangan</label>
                        <select name="id_ruang" id="id_ruang" class="form-control">
                            <option value="" selected disabled>-- pilih ruangan --</option>
                            <?php 
                                $query = "SELECT * FROM ruang WHERE status = 1";
                                $result = mysqli_query($conn, $query);
                                while ($ruang = mysqli_fetch_assoc($result)) {
                                    if ($ruang['id_ruang'] != 1) {
                                        ?>
                                        <option <?php if ($barang['id_ruang'] == $ruang['id_ruang']): echo "selected"; ?><?php endif ?> value="<?php echo $ruang['id_ruang'] ?>"><?php echo $ruang['nama_ruang']; ?></option>
                                        <?php
                                    }
                                }
                             ?>
                        </select>
                    </div>
                    <div class="form-inline">
                        <a href="index.php?page=HapusBarang&id=<?php echo $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda yakin ingin menghapus data <?php echo $barang['nama'] ?>')">Hapus</a>
                        <span class="ml-auto">
                            <a href="index.php?page=Barang" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
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

                    $query = "UPDATE inventaris SET nama = '$nama', kode_inventaris = '$kode_inventaris', kondisi = '$kondisi', keterangan = '$keterangan', id_ruang = '$id_ruang' WHERE id_inventaris = $id";
                    if (mysqli_query($conn, $query)) {
                        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Barang">';
                } else {
                    ?>
                        <div class="alert alert-danger">
                            Gagal Mengubah Data!
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