<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sederhana & Dinamis</title>
</head>
<body>
    <h2>Daftar Nama Barang</h2>
    <ol>
        <?php
        for ($i = 1; $i <= 50; $i++) {
            echo "<li>Barang Ke-$i</li>";
        }
        ?>
    </ol>
</body>
</html>