<?php
// Konsep 1: Tipe Data String
$nama = "Luthfi Hasan";

// Konsep 2: Tipe Data Integer
$umur = 20;

// Konsep 3: Tipe Data Float
$tinggiBadan = 173.5;

// Konsep 4: Tipe Data Array
$hobi = array("Musik", "Olahraga", "Menulis");

// Menampilkan informasi dengan menggunakan echo
echo "Nama : $nama<br>";
echo "Umur : $umur tahun<br>";
echo "Tinggi Badan : $tinggiBadan cm<br>";
echo "Hobi : ";
foreach ($hobi as $h) {
    echo "$h, ";
}
?>
