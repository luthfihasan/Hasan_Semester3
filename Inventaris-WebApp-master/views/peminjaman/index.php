<?php

// Pemanggilan data Petugas data Database

$query = "SELECT * FROM peminjaman JOIN inventaris ON peminjaman.id_inventaris = inventaris.id_inventaris JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas";
if ($_SESSION['level'] == 3) {
    $id_petugas = $_SESSION['id'];
    $query = "SELECT * FROM peminjaman JOIN inventaris ON peminjaman.id_inventaris = inventaris.id_inventaris JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas WHERE peminjaman.id_petugas = '$id_petugas'";
}
$result = mysqli_query($conn, $query);

?>

<h3 class="no-print">Peminjaman</h3>
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="form-inline">
                    <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman</h6>
                    <span class="ml-auto no-print">
                        <?php if ($_SESSION['level'] == 1) : ?>
                            <button class="btn btn-warning btn-sm mr-3" id="print">Print</button>
                        <?php endif ?>
                        <a href="index.php?page=TambahPeminjaman" class="btn btn-primary btn-sm">Tambah Data</a>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Barang</th>
                                <th>Kode Barang</th>
                                <th>Jumlah Pinjam</th>
                                <th>jumlah Kembali</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Peminjam</th>
                                <th>Status Peminjaman</th>
                                <?php if ($_SESSION['level'] < 3) : ?>
                                    <th class="no-print">Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            while ($p = mysqli_fetch_assoc($result)) {

                                ?>
                                <tr>
                                    <td><?php echo $nomor++ ?></td>
                                    <td><?php echo $p['nama'] ?></td>
                                    <td><strong><?php echo $p['kode_inventaris'] ?></strong></td>
                                    <td><?php echo $p['jumlah_pinjam'] ?></td>
                                    <td>
                                        <?php if ($p['jumlah_kembali'] > 0) {
                                            echo $p['jumlah_kembali'];
                                        } else {
                                            echo "-";
                                        } ?>
                                    </td>
                                    <td><?php echo $p['tanggal_pinjam'] ?></td>
                                    <td>
                                        <?php if ($p['tanggal_kembali'] > 0) {
                                            echo $p['tanggal_kembali'];
                                        } else {
                                            echo "-";
                                        } ?>
                                    </td>
                                    <td><?php echo $p['nama_petugas'] ?></td>
                                    <td>
                                        <?php if ($p['status_peminjaman'] == 1) : ?>
                                            <span class="badge badge-success">Kembali</span>
                                        <?php else : ?>
                                            <span class="badge badge-primary">Dipinjam</span>
                                        <?php endif ?>
                                    </td>
                                    <?php if ($_SESSION['level'] < 3) : ?>
                                        <td class="no-print">
                                            <?php if ($p['status_peminjaman'] == 0) : ?>
                                                <a href="index.php?page=Kembali&id=<?php echo $p['id_peminjaman'] ?>" class="btn btn-primary btn-sm">Kembali</a>
                                            <?php endif ?>
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