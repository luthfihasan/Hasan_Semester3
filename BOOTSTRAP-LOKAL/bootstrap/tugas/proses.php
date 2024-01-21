<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <title>Proses Formulir</title>
</head>
<body>

<div class="container">
    <h2>Data yang Diterima:</h2>

    <?php
    // Informasi koneksi database
    $host = "localhost";
    $username = "username"; // Ganti dengan username database Anda
    $password = ""; // Ganti dengan password database Anda
    $database = "form";

    // Membuat koneksi ke database
    $koneksi = new mysqli($host, $username, $password, $database);

    // Mengecek koneksi
    if ($koneksi->connect_error) {
        die("Koneksi ke database gagal: " . $koneksi->connect_error);
    }

    // Mengecek apakah data telah dikirimkan dari formulir
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil nilai dari formulir
        $nama = $koneksi->real_escape_string($_POST['name']);
        $email = $koneksi->real_escape_string($_POST['email']);
        $subject = $koneksi->real_escape_string($_POST['subject']);
        $comment = $koneksi->real_escape_string($_POST['comment']);

        // Menyimpan data ke database
        $query = "INSERT INTO user (nama, email, subject, comment) VALUES ('$nama', '$email', '$subject', '$comment')";

        if ($koneksi->query($query) === TRUE) {
            echo "<p>Data berhasil disimpan ke database.</p>";
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
        }
    } else {
        echo "<p>Data tidak diterima. Silakan isi formulir.</p>";
    }

    // Menutup koneksi database
    $koneksi->close();
    ?>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
