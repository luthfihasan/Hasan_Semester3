<?php
// Deklarasi Variabel
$txt = "Halo Polibang!";
$number = 10;
$nama = "Luthfi Hasan";
$matkul = "Pemrograman Web 1";
$nim = 2022010133;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- Menampilkan nilai variabel -->
    <h1>
        <?php echo $txt; ?>
    </h1> 

    <h2>
        <?php echo $number; ?>
    </h2>

    <p>
        <?php echo "Nama Saya " . $nama . "<br>"; ?>  
    </p>

    <p>
        <?php echo "NIM " . $nim . "<br>"; ?>
    </p>

    <p>
        <?php echo "Mata Kuliah " . $matkul . "<br>"; ?>  
    </p>

</body>
</html>