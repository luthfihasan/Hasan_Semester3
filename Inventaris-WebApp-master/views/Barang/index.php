<?php

// Pemanggilan data Petugas data Database

$query = "SELECT * FROM inventaris JOIN ruang ON inventaris.id_ruang = ruang.id_ruang";
$result = mysqli_query($conn, $query);

?>

<h3>Halaman Barang</h3>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-inline">
                    <h6 class="m-0 font-weight-bold text-primary">Data barang</h6>
                    <?php if ($_SESSION['level'] == 1) : ?>
                        <span class="ml-auto">
                            <button class="btn btn-warning btn-sm mr-3" id="print">Print</button>
                            <a href="index.php?page=TambahBarang" class="btn btn-primary btn-sm">Tambah Data</a>
                        </span>
                    <?php endif ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatables">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kode</th>
                                <th>kondisi</th>
                                <th>jumlah</th>
                                <?php if ($_SESSION['level'] == 1) : ?>
                                    <th>Tanggal Register</th>
                                <?php endif ?>
                                <th>Ruang</th>
                                <?php if ($_SESSION['level'] == 1) : ?>
                                    <th>Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            while ($barang = mysqli_fetch_assoc($result)) {

                                ?>
                                <tr>
                                    <td><?php echo $nomor++ ?></td>
                                    <td><?php echo $barang['nama'] ?></td>
                                    <td><strong><?php echo $barang['kode_inventaris'] ?></strong></td>
                                    <td><?php echo $barang['kondisi'] ?></td>
                                    <td><?php echo $barang['jumlah'] ?></td>
                                    <?php if ($_SESSION['level'] == 1) : ?>
                                        <td><?php echo $barang['tanggal_register'] ?></td>
                                    <?php endif ?>
                                    <td>
                                        <?php if ($barang['id_ruang'] == 1) : ?>
                                            <span class="badge badge-danger"><?php echo $barang['nama_ruang'] ?></span>
                                        <?php else : ?>
                                            <?php echo $barang['nama_ruang'] ?>
                                        <?php endif ?>
                                    </td>
                                    <?php if ($_SESSION['level'] == 1) : ?>
                                        <td>
                                            <a href="index.php?page=UbahBarang&id=<?php echo $barang['id_inventaris'] ?>" class="btn btn-info btn-sm">Ubah</a>
                                        </td>
                                    <?php endif ?>
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