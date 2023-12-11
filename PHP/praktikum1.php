<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Dosen</title>
</head>
<body>
    <h2>Nama-Nama Dosen</h2>

    <?php
    // Nama-nama Dosen disimpan dalam variabel array
    $nama_dosen = array("Bu Sofia Ulfah", "Pak Ahlis Noor Kholili", "Pak Indra Kurniawan");

    // Fungsi untuk menghitung jumlah kata
    function hitungJumlahKata($nama) {
        $jumlah_kata = str_word_count($nama);
        return $jumlah_kata;
    }

    // Fungsi untuk menghitung jumlah huruf
    function hitungJumlahHuruf($nama) {
        $jumlah_huruf = strlen($nama);
        return $jumlah_huruf;
    }

    // Fungsi untuk mendapatkan kebalikan dari nama
    function kebalikanNama($nama) {
        $kebalikan = strrev($nama);
        return $kebalikan;
    }

    // Loop untuk setiap nama Dosen
    foreach ($nama_dosen as $nama) {
        echo "<h3>Nama Dosen: $nama</h3>";
        
        // Menampilkan jumlah kata
        $jumlah_kata = hitungJumlahKata($nama);
        echo "Jumlah Kata : $jumlah_kata <br>";

        // Menampilkan jumlah huruf
        $jumlah_huruf = hitungJumlahHuruf($nama);
        echo "Jumlah Huruf : $jumlah_huruf <br>";

        // Menampilkan kebalikan nama
        $kebalikan = kebalikanNama($nama);
        echo "Kebalikan Nama : $kebalikan <br><br>";
    }
    ?>

</body>
</html>
