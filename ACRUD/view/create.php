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

<h1 class="text-center mt-4">TAMBAHKAN SURVEI</h1>
<div class="container mt-4">
    <form action="" method="post" enctype="multipart/form-data">
        <!-- Your existing form code here -->
        <div class="form-group">
            <label for="icon" class="for-label">Icon</label>
            <input type="file" name="icon" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="judul" class="for-label">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="link" class="form-label">Link</label>
            <input type="text" name="link" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" name="create" class="btn btn-primary mt-2" value="Submit">
        </div>
    </form>
</div>

<!-- Back button to go to the home page -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5"> Back </a>
</div>

<!-- Footer -->
<?php include "../footer.php" ?>
