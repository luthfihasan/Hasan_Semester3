<?php

// Pemanggilan data Petugas data Database

$query = "SELECT * FROM barang_keluar JOIN inventaris ON barang_keluar.id_inventaris = inventaris.id_inventaris";
$result = mysqli_query($conn, $query);

?>

<h3 class="no-print">Halaman Barang Keluar</h3>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-inline">
                    <h6 class="m-0 font-weight-bold text-primary">Data barang Keluar</h6>
                    <span class="ml-auto no-print">
                        <button class="btn btn-warning btn-sm mr-3" id="print">Print</button>
                        <a href="index.php?page=TambahBarangKeluar" class="btn btn-primary btn-sm">Tambah Data</a>
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
                                <th>Tanggal Keluar</th>
                                <th>Penerima</th>
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
                                    <td><?php echo $barang['jumlah_keluar'] ?></td>
                                    <td><?php echo $barang['tanggal_keluar'] ?></td>
                                    <td><?php echo $barang['penerima'] ?></td>
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