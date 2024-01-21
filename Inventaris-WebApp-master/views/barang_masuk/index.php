<?php

// Pemanggilan data Petugas data Database

$query = "SELECT * FROM barang_masuk JOIN inventaris ON barang_masuk.id_inventaris = inventaris.id_inventaris JOIN supplier ON barang_masuk.id_supplier = supplier.id_supplier";
$result = mysqli_query($conn, $query);

?>

<h3 class="no-print">Halaman Barang Masuk</h3>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-inline">
                    <h6 class="m-0 font-weight-bold text-primary">Data barang Masuk</h6>
                    <span class="ml-auto no-print">
                        <button class="btn btn-warning btn-sm mr-3" id="print">Print</button>
                        <a href="index.php?page=TambahBarangMasuk" class="btn btn-primary btn-sm">Tambah Data</a>
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
                                <th scope="col">Kode</th>
                                <th>jumlah</th>
                                <th>Tanggal Masuk</th>
                                <th>Supplier</th>
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
                                    <td><?php echo $barang['jumlah_masuk'] ?></td>
                                    <td><?php echo $barang['tanggal_masuk'] ?></td>
                                    <td>
                                        <?php if ($barang['id_supplier'] == 1) : ?>
                                            <span class="badge badge-danger"><?php echo $barang['nama_supplier'] ?></span>
                                        <?php else : ?>
                                            <?php echo $barang['nama_supplier'] ?>
                                        <?php endif ?></td>
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