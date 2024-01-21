<!-- Header -->
<?php include "../header.php"; ?>

<?php
// Check if 'delete' is set in the URL
if (isset($_GET['delete'])) {
    $userid = $_GET['delete'];

    // SQL query to delete data from the users table where id = $userid
    $query = "DELETE FROM users WHERE id = {$userid}";
    $delete_query = mysqli_query($conn, $query);

    // Redirect to home.php after deletion
    header("Location: home.php");
}
?>

<!-- Footer -->
<?php include "footer.php"; ?>
