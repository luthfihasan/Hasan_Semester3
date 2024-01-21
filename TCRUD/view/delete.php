<!-- footer -->
<?php include "../header.php" ?>
<?php


if (isset($_GET['delete'])) {
    $surveiid = $_GET['delete'];
    // SQL query to delete data from user table where id = $userid
    $query = "DELETE FROM survei WHERE id_survei = {$surveiid}";
    $delete_query = mysqli_query($conn, $query);
    header("Location: home.php");
    
}

?>

<!-- Footer -->
<?php include "footer.php" ?>
