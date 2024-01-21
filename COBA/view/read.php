<!-- Header -->
<?php include '../header.php'; ?>

<h1 class="text-center">User Details</h1>

<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Icon</th>
                <th scope="col">judul Survei</th>
                <th scope="col">Link</th>
                <th scope="col" colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT * FROM users"; // SQL query to fetch all table data
            $view_users = mysqli_query($conn, $query); // sending the query to the database
            
            // displaying all the data retrieved from the database using while loop
            while ($row = mysqli_fetch_assoc($view_users)) {
                $id = $row['ID'];
                $user = $row['username'];
                $email = $row['email'];
                $pass = $row['password'];

                echo "<tr>";
                echo "<th scope='row'>{$id}</th>";
                echo "<td>{$user}</td>";
                echo "<td>{$email}</td>";
                echo "<td>{$pass}</td>";
                echo "<td class='text-center'><a href='update.php?edit&user_id={$id}' class='btn btn-secondary'><i class='bi bi-pencil'></i> Edit</a></td>";
                echo "<td class='text-center'><a href='delete.php?delete={$id}' class='btn btn-danger'><i class='bi bi-trash'></i> Delete</a></td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
<!-- Back Button to go to the previous page -->
<div class="container text-center mt-5">
    <a href="home.php" class="btn btn-warning mt-5">Back</a>
</div>

<!-- Footer -->
<?php include "../footer.php"; ?>
