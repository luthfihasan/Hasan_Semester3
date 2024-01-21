<?php include "../header.php"?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<h1 class="text-center mb-3">Detail Survei</h1>
<div class="container">
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col" style="width: 86px;">ID Survei</th>
                <th scope="col">Icon</th>
                <th scope="col">Judul Survei</th>
                <th scope="col">Link</th>
                <th scope="col" colspan="2" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Fetch all survei data
            $query = "SELECT * FROM survei";
            $view_survei = mysqli_query($conn, $query);

            // Displaying all the data retrieved from the database using a while loop
            while ($row = mysqli_fetch_assoc($view_survei)){
                $id = $row['id_survei'];
                $icon = $row['icon'];
                $judul = $row['judul'];
                $link = $row['link'];

                echo "<tr >";
                echo " <td >{$id}</td>";
                echo " <td > <img src='images/".$icon."' width='100' height='100'> </td>";
                echo " <td > {$judul}</td>";
                echo " <td > {$link}</td>";
                echo "<td class='text-center'> <a href='update.php?edit&survei_id={$id}' class='btn btn-primary'> <i class='bi bi-pencil'></i> Edit</a></td>";
                echo "<td class='text-center'> <a href='konfirmasi.php?delete={$id}' class='btn btn-danger delete-btn'><i class='bi bi-trash-fill'></i> Hapus</a></td>";
                echo " </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- a BACK Button to go to the previous page -->
<div class="container text-center mt-2">
    <a href="home.php" class="btn btn-warning text-white"><i class="bi bi-arrow-left-circle-fill"></i> Kembali </a>
</div>

<!-- Footer -->
<?php include "../footer.php"?>
