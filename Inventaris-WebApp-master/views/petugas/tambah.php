<div class="row">
    <div class="col-lg-6 mx-auto">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Petugas</h6>
            </div>
            <div class="card-body">
                <form action="" method="post" class="mb-3">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama petugas" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username petugas" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <select name="id_level" id="level" class="form-control">
                            <option value="" selected disabled>-- pilih level petugas --</option>
                            <option value="1">Admin</option>
                            <option value="2">Operator</option>
                            <option value="3">Peminjam</option>
                        </select>
                    </div>
                    <div class="form-inline">
                        <span class="ml-auto">
                            <a href="index.php?page=petugas" class="btn btn-info btn-sm">Kembali</a>
                            <button type="submit" name="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </span>
                    </div>
                </form>


                <?php

                if (isset($_POST['submit'])) {
                    $nama     = $_POST['nama'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $id_level = $_POST['id_level'];

                    $query = "INSERT INTO petugas (nama_petugas, username, password, id_level) VALUES ('$nama', '$username', '$password', '$id_level')";
                    if (mysqli_query($conn, $query)) {
                        echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=petugas">';
                    } else {
                        ?>
                        <div class="alert alert-danger">
                            Gagal Menambahkan Data!
                        </div>
                    <?php
                }
            }

            ?>

            </div>
        </div>
    </div>
</div>