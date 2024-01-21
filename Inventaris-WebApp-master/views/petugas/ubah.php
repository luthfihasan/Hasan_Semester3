<?php
$id = $_GET['id'];

$queryPetugas = "SELECT * FROM petugas JOIN level ON petugas.id_level = level.id_level WHERE id_petugas = $id";
$result = mysqli_query($conn, $queryPetugas);
$petugas = mysqli_fetch_assoc($result);

?>


<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Petugas</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" class="mb-3">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama petugas" autocomplete="off" value="<?php echo $petugas['nama_petugas'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username petugas" autocomplete="off" value="<?php echo $petugas['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="id_level" id="level" class="form-control">
                            <option value="" selected disabled>-- pilih level petugas --</option>
                            <option <?php if ($petugas['id_level'] == 1) : echo "selected" ?><?php endif ?> value="1">Admin</option>
                            <option <?php if ($petugas['id_level'] == 2) : echo "selected" ?><?php endif ?> value="2">Operator</option>
                            <option <?php if ($petugas['id_level'] == 3) : echo "selected" ?><?php endif ?> value="3">Peminjam</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <a href="index.php?page=HapusPetugas&id=<?php echo $id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apa anda yakin ingin menghapus data <?php echo $petugas['nama_petugas'] ?>')">Hapus</a>
                        <span class="ml-auto">
                            <a href="index.php?page=petugas" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                        </span>
                    </div>
                </form>


                <?php

                if (isset($_POST['submit'])) {
                    $nama     = $_POST['nama'];
                    $username = $_POST['username'];
                    $id_level = $_POST['id_level'];

                    

                        $query = "UPDATE petugas SET nama_petugas = '$nama', username = '$username', id_level = '$id_level' WHERE id_petugas = $id";

                        if (mysqli_query($conn, $query)) {
                            echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=petugas">';
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