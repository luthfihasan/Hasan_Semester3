<?php

// Pemanggilan data Petugas data Database

$query = "SELECT * FROM supplier";
$result = mysqli_query($conn, $query);

?>

<h3 class="no-print">Halaman Supplier</h3>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-inline">
                    <h6 class="m-0 font-weight-bold text-primary">Data Supplier</h6>
                    <span class="ml-auto no-print">
                        <button class="btn btn-warning btn-sm mr-3" id="print">Print</button>
                        <a href="index.php?page=TambahSupplier" class="btn btn-primary btn-sm">Tambah Data</a>
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
                                <th scope="col">Alamat</th>
                                <th>Kota</th>
                                <th>Telepon</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            while ($supplier = mysqli_fetch_assoc($result)) {
                                if ($supplier['id_supplier'] != 1) {
                                    ?>
                                    <tr>
                                        <td><?php echo $nomor++ ?></td>
                                        <td><?php echo $supplier['nama_supplier'] ?></td>
                                        <td><?php echo $supplier['alamat_supplier'] ?></td>
                                        <td><?php echo $supplier['kota'] ?></td>
                                        <td><?php echo $supplier['no_telephone'] ?></td>
                                        <td>
                                            <?php if ($supplier['status'] == 1) : ?>
                                                <span class="badge badge-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger">Tidak Aktif</span>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a href="index.php?page=UbahSupplier&id=<?php echo $supplier['id_supplier'] ?>" class="btn btn-info btn-sm">Ubah</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>