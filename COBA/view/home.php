<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
</head>
<body>
    <!-- Header -->
    <?php include "../header.php" ?>

    <div class="container">
        <h1 class="text-center">Data to Perform CRUD Operations</h1>
        <a href="create.php" class="btn btn-outline-success mb-2">
            <i class="bi bi-person-plus"></i> Create New User
        </a>

        <table class="table table-striped table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Judul Survei</th>
                    <th scope="col">Link</th>
                    <th scope="col" colspan="1" class="text-center">Action</th>
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
                echo "<td class='text-center'><a href='read.php?user_id={$id}' class='btn btn-primary'><i class='bi bi-eye'></i> View</a></td>";
                echo "</tr>";
            }
            ?>

            </tbody>
        </table>
    </div>

    <!-- Back button to go to the index page -->
    <div class="container text-center mt-5">
        <a href="../index.php" class="btn btn-warning mt-5">Back</a>
    </div>

    <!-- Footer -->
    <?php include "../footer.php" ?>
</body>
</html>
