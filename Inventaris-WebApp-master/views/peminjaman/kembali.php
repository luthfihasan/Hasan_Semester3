<?php
$id = $_GET['id'];
$query = "SELECT * FROM peminjaman WHERE id_peminjaman = $id";
$result = mysqli_query($conn, $query);
$peminjaman = mysqli_fetch_assoc($result);

// Update Jumlah Barang //
$id_inventaris = $peminjaman['id_inventaris'];
$queryBarang = "SELECT jumlah FROM inventaris WHERE id_inventaris = $id_inventaris";
$resultBarang = mysqli_query($conn, $queryBarang);
$jumlah = mysqli_fetch_assoc($resultBarang);
$hasil = $jumlah['jumlah'] + $peminjaman['jumlah_pinjam'];
mysqli_query($conn, "UPDATE inventaris SET jumlah = '$hasil' WHERE id_inventaris = $id_inventaris");


// Update Status Peminjaman jadi Kembali //

$jumlah_kembali = $peminjaman['jumlah_pinjam'];
$tanggal_kembali = date('Y-m-d H:i:s');
$status_peminjaman = 1;

$querypeminjaman = "UPDATE peminjaman SET jumlah_kembali = '$jumlah_kembali', tanggal_kembali = '$tanggal_kembali', status_peminjaman = '$status_peminjaman' WHERE id_peminjaman = '$id'";

if (mysqli_query($conn, $querypeminjaman)) {
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Peminjaman">';
} else {
    ?>
    <script>
        alert('Gagal Melakukan Pengembalian Data!');
    </script>
    <?php
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Peminjaman">';
}
