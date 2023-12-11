<?php
// Variabel global
$globalVar = "Ini adalah variabel global.";

function exampleFunction() {
    // Variabel lokal
    $localVar = "Ini adalah variabel lokal.";

    // Menggunakan variabel global di dalam fungsi
    global $globalVar;
    echo "Dalam fungsi : $localVar<br>";
    echo "Variabel global di dalam fungsi : $globalVar<br>";
}

// Memanggil fungsi
exampleFunction();

// Mencoba mengakses variabel lokal di luar fungsi (akan menghasilkan error)
// echo "Di luar fungsi: $localVar<br>";

// Menampilkan variabel global di luar fungsi
echo "Di luar fungsi: $globalVar<br>";
?>
