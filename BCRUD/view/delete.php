<?php
include "../header.php";

if (isset($_GET['delete'])) {
    $surveiid = $_GET['delete'];

    // SQL query to delete data from user table where id = $userid
    $query = "DELETE FROM survei WHERE id = {$surveiid}";
    $delete_query = mysqli_query($conn, $query);

    if ($delete_query) {
        // Tambahkan pesan sukses atau logika tambahan jika diperlukan
        // ...

        // Redirect the user back to the home.php page
        echo '<script>window.location.href = "home.php";</script>';
        exit();
    }
}

include "footer.php";
?>
