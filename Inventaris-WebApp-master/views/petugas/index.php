<?php

// Pemanggilan data Petugas data Database

$queryPetugas = "SELECT * FROM petugas JOIN level ON petugas.id_level = level.id_level";
$result = mysqli_query($conn, $queryPetugas);

?>

<h3 class="no-print">Halaman Petugas</h3>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-inline">
                    <h6 class="m-0 font-weight-bold text-primary">Data Petugas</h6>
                    <span class="ml-auto no-print">
                        <button class="btn btn-warning btn-sm mr-3" id="print">Print</button>
                        <a href="index.php?page=TambahPetugas" class="btn btn-primary btn-sm">Tambah Data</a>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatables">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">username</th>
                                <th scope="col">Level</th>
                                <th class="no-print">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $nomor = 1;
                            while ($petugas = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $nomor++ ?></td>
                                    <td><?php echo $petugas['nama_petugas'] ?></td>
                                    <td><?php echo $petugas['username'] ?></td>
                                    <td><?php echo $petugas['nama_level'] ?></td>
                                    <td class="no-print">
                                        <a href="index.php?page=UbahPetugas&id=<?php echo $petugas['id_petugas'] ?>" class="btn btn-info btn-sm">Ubah</a>
                                    </td>
                                </tr>
                            <?php
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>