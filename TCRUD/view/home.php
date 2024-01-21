<!-- header -->
<?php include "../header.php" ?>

<div class="container" class="p-3 mb-2 bg-transparent text-dark">
    <h1 class="text-center">DATA SURVEI</h1>
    <a href="create.php" class="btn  btn-outline-dark mb-2"><i class="bi bi-person-plus"></i>Create New Survei</a>

    <table class="table table-striped table-bordered border-warning table-hover">
        <thead class="table-warning">
            <tr>
                <th scope="col">ID Survei</th>
                <th scope="col">Icon</th>
                <th scope="col">Judul</th>
                <th scope="col">Link</th>
                <th scope="col" colspan="3" class="text-center">Action</th>
            </tr>
        </thead>

    <tbody>
        <tr>
            <?phpz
            $query = "SELECT * FROM survei";//SQL query to fecth all  table daa
            $view_survei = mysqli_query($conn, $query); //sending the query to the database

            //displaying all the data retrieved from the database using while lop
            while ($row = mysqli_fetch_assoc($view_survei)){
                $id = $row ['id_survei'];
                $icon = $row ['icon'];
                $judul = $row['judul'];
                $link = $row['link'];
                
                echo "<tr>";
                echo "<th scope='row'> {$id}</th>";
                echo "<td ><img src='images/".$icon."' width='100' height='100'> </td>";
                echo "<td > {$judul}</td>";
                echo "<td > {$link}</td>";
                echo "<td class='text-center'> <a href='read.php?survei_id={$id}' class='btn btn-primary'> <i class='bi bi-eye'></i>READ</a></td>";
                echo "<td class='text-center'> <a href='update.php?edit&survei_id={$id}' class='btn btn-secondary'> <i class='bi bi-pencil'></i>UPDATE</a></td>";
                echo "<td class='text-center'> <a href='confirm.php?delete={$id}' class='btn btn-danger'><i class='bi bi-trash'></i>DELETE</a></td>";
            }
            ?>
        </tr>
    </tbody>
    </table>
    
</div>
