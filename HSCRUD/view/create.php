<!-- Header -->
<?php include "../header.php"?>

<?php 
// Check if the form is submitted
if (isset($_POST['create'])) {
    $judul = $_POST['judul'];
    $link = $_POST['link'];
    $icon = $_FILES['icon']['name'];
    $tmp = $_FILES['icon']['tmp_name'];

    $fotobaru = date('dmYHis').$icon;
    $path = "images/".$fotobaru;

    if(move_uploaded_file($tmp, $path)){
        $query = "INSERT INTO survei(icon,judul, link) VALUES('{$fotobaru}','{$judul}','{$link}')";
        $add_judul = mysqli_query($conn, $query);

        if (!$add_judul) {
            echo "something went wrong ". mysqli_error($conn);
        } else {
            $successModal = true;
        }
    }
}
?>

<!-- Success Modal -->
<?php if (isset($successModal) && $successModal): ?>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <h1 class="mt-4"><i class="fas fa-check-circle text-success fa-3x"></i></h1>
                    <h2 class="mb-4"><b>Berhasil</b></h2>
                    <p>Data anda berhasil ditambahkan!</p>
                </div>
                <div class="modal-footer justify-content-center border-0">
                    <a href="home.php" class="btn btn-success btn-block">OK</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Display the success modal when the page loads -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#successModal').modal('show');
        });
    </script>
<?php endif; ?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
<div class="container mt-5 border p-5 d-flex flex-column align-items-center col-md-5 position-relative">
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

            <!-- Close button (X) in the top right corner -->
            <a href="home.php" class="btn btn-secondary position-absolute top-0 end-0 m-3"><i class="bi bi-backspace-fill"></i></a>
        </fieldset>
    </form>
</div>

<!-- Footer -->
<?php include "../footer.php" ?>
