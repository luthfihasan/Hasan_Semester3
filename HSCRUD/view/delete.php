<?php
include "../header.php";

if (isset($_GET['delete'])) {
    $survei_id = $_GET['delete'];

    // SQL query to delete data from survei table where id_survei = $survei_id
    $query = "DELETE FROM survei WHERE id_survei = {$survei_id}";
    $delete_query = mysqli_query($conn, $query);

    if ($delete_query) {
        // Tambahkan pesan sukses atau logika tambahan jika diperlukan
        // ...

        // Redirect the user back to the home.php page
        echo '<script>window.location.href = "home.php";</script>';
        exit();
    } else {
        echo "Error deleting data: " . mysqli_error($conn);
    }
}

include "../footer.php";
?>
