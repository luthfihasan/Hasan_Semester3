<?php
include "../db.php"; // Include your database connection file

if (isset($_GET['edit']) && isset($_GET['survei_id'])) {
    $survei_id = $_GET['survei_id'];

    // Fetch the existing data from the database
    $query = "SELECT * FROM survei WHERE id_survei = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $survei_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    // Close the prepared statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect to an error page or homepage if no valid ID is provided
    header("Location: home.php");
    exit();
}

if (isset($_POST['update'])) {
    $survei_id = $_POST['survei_id'];
    $judul = $_POST['judul'];
    $link = $_POST['link'];

    // Handle image upload if a new image is selected
    if ($_FILES['icon']['error'] == 0) {
        $icon = $_FILES['icon']['name'];
        $tmp = $_FILES['icon']['tmp_name'];
        $fotobaru = date('dmYHis') . $icon;
        $path = "images/" . $fotobaru;

        if (move_uploaded_file($tmp, $path)) {
            // Update the data in the database with the new image
            $query = "UPDATE survei SET icon = ?, judul = ?, link = ? WHERE id_survei = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sssi", $fotobaru, $judul, $link, $survei_id);

            if (mysqli_stmt_execute($stmt)) {
                // Display success modal
                $successModal = true;
            } else {
                echo "Error updating data: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        // Update the data without changing the image
        $query = "UPDATE survei SET judul = ?, link = ? WHERE id_survei = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssi", $judul, $link, $survei_id);

        if (mysqli_stmt_execute($stmt)) {
            // Display success modal
            $successModal = true;
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

include "../header.php";
?>

<div class="container mt-4">
    <h1 class="text-center">UPDATE SURVEI</h1>
    <!-- Form to display existing data and allow editing -->
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="survei_id" value="<?php echo $row['id_survei']; ?>">

        <div class="row">
            <div class="col-md-9 offset-md-1 mt-4">
                <!-- Make this column 80% -->

                <div class="form-group">
                    <label for="icon" class="for-label">Icon/Judul</label>
                    <input type="file" name="icon" class="form-control">
                </div>

                <div class="form-group">
                    <label for="judul" class="for-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="<?php echo $row['judul']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="link" class="form-label">Link</label>
                    <input type="text" name="link" class="form-control" value="<?php echo $row['link']; ?>" required>
                </div>

                <div class="form-group">
                    <button type="submit" name="update" class="btn btn-primary mt-2">Update</button>
                </div>
            </div>
            <!-- a BACK button to go to the home page -->
            <div class="container text-center mt-5">
                <a href="home.php" class="btn btn-warning mt-5"> Back </a>
            </div>
        </div>
    </form>
</div>

<!-- Success Modal -->
<?php if (isset($successModal) && $successModal): ?>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <h1 class="mt-4"><i class="fas fa-check-circle text-success fa-3x"></i></h1>
                    <h2 class="mb-4"><b>Berhasil</b></h2>
                    <p>Data anda sudah diperbarui!</p>
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

<?php include "../footer.php"; ?>
