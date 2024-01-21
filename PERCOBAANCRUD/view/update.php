<?php include "../header.php"; ?>

<?php
// Checking if the variable is set or not and if set, adding the set data value to the variable $survei_id
if (isset($_GET['survei_id'])) {
    $survei_id = $_GET['survei_id'];
}

// SQL query to select all the data from the table where id_survei = $survei_id
$query = "SELECT * FROM survei WHERE id_survei = $survei_id";
$view_survei = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($view_survei)) {
    $id = $row['id_survei'];
    $icon = $row['icon'];
    $judul = $row['judul'];
    $link = $row['link'];
}

// Processing form data when the form is submitted
if (isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $link = $_POST['link'];
    $icon = $_FILES['icon']['name'];
    $tmp = $_FILES['icon']['tmp_name'];

    $fotobaru = date('dmYHis') . $icon;
    // Set path folder tempat menyimpan fotonya
    $path = "images/" . $fotobaru;

    if (move_uploaded_file($tmp, $path)) {
        $query = "UPDATE survei SET icon = '{$fotobaru}', judul = '{$judul}', link = '{$link}' WHERE id_survei = $survei_id";
        $update_user = mysqli_query($conn, $query);

        // Displaying proper message for the user to see whether the query executed perfectly or not
        if (!$update_user) {
            echo "Something went wrong " . mysqli_error($conn);
        } else {
            echo "<script type='text/javascript'>alert('Mengedit Data Berhasil')</script>";
        }
    }
}
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<!-- Close button (X) in the top right corner -->
<div class="container mt-3 mb-3">
    <a href="read.php" class="btn btn-warning text-white" style="font-style: normal;"><i class="bi bi-arrow-left-circle-fill"></i> Kembali</a>
</div>

<div class="container">
    <h1 class="text-center bg-primary text-white" style="padding: 9px;">Edit Data Survei Pengguna</h1>
</div>

<div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group mt-3">
            <label for="icon">Icon/Logo</label>
            <input type="file" name="icon" class="form-control mt-1" value="<?php echo $fotobaru ?>">
        </div>

        <div class="form-group mt-3">
            <label for="judul">Judul Survei</label>
            <input type="text" name="judul" class="form-control mt-1" value="<?php echo $judul ?>">
        </div>

        <div class="form-group mt-3">
            <label for="link">Link</label>
            <input type="text" name="link" class="form-control mt-1" value="<?php echo $link ?>">
        </div>

        <div class="form-group mt-3">
            <input type="submit" name="update" class="btn btn-primary" value="Simpan">
        </div>
    </form>
</div>

<!-- Footer -->
<?php include "../footer.php"; ?>
