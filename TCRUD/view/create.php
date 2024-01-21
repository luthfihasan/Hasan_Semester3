<!-- Header -->
<?php include "../header.php" ?>

<?php


if (isset($_POST['create'])) {
    $judul = $_POST['judul'];
    $link = $_POST['link'];
    $icon = $_FILES['icon']['name'];
    $tmp = $_FILES['icon']['tmp_name'];

    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    $fotobaru = date('dmYHis').$icon;
    // Set path folder tempat menyimpan fotonya
    $path = "images/".$fotobaru;

    // Proses upload
    if (move_uploaded_file($tmp, $path)) {
        // SQL query to insert user data into the survei table
        $query = "INSERT INTO survei(icon, judul, link) VALUES('{$fotobaru}','{$judul}','{$link}')";
        $add_judul = mysqli_query($conn, $query);

        // Display proper message for the user to see whether the query executed perfectly or not
        if (!$add_judul) {
            echo "Something went wrong: " . mysqli_error($conn);
        } else {
            echo "<script type='text/javascript'> alert('Menambahkan Data Berhasil!')</script>";
        }
    }
}
?>

<div class="container mt-5 border p-5 d-flex flex-column align-items-center col-md-5">
    <form action="create.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend class="text-center mb-4">Tambah Data</legend>

            <!-- Browse Feature -->
            <div class="mt-3">
                <label for="icon" class="form-label">Icon/Logo</label>
                <input type="file" name="icon" class="form-control" id="fileInput" required>
            </div>

            <!-- Judul Survei -->
            <div class="mt-3">
                <label for="judul" class="form-label">Judul Survei</label>
                <input type="text" name="judul" class="form-control" id="judul" required>
            </div>

            <!-- Link -->
            <div class="mt-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" name="link" class="form-control" id="link" required>
            </div>

            <!-- Footer -->
            <div class="d-flex justify-content-end mt-3">
                <a href="home.php" class="btn btn-secondary me-2">Kembali</a>
                <input type="submit" name="create" class="btn btn-primary" value="Tambah">
            </div>
        </fieldset>
    </form>
</div>

<!-- Footer -->
<?php include "../footer.php" ?>
