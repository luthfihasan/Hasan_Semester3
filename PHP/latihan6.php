<?php
// Informasi tentang Politeknik Balekambang
$nama_kampus = "Politeknik Balekambang";
$lokasi = "Gemiring Lor, Kec. Nalumsari Kab. Jepara";
$tahunBerdiri = 2018;
$jurusan = array("Rekayasa Perangkat Lunak", "Administrasi Bisnis Internasional", "Akuntansi Keuangan Publik");

// Menampilkan informasi menggunakan echo
echo "<h2>Informasi Politeknik Balekambang</h2>";
echo "Nama Kampus : $nama_kampus<br>";
echo "Lokasi : $lokasi<br>";
echo "Tahun Berdiri : $tahunBerdiri<br>";
echo "<h3>Jurusan yang Tersedia :</h3>";
echo "<ul>";
foreach ($jurusan as $jur) {
    echo "<li>$jur</li>";
}
echo "</ul>";
?>
