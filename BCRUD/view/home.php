<!-- header -->
<?php
session_start();
include "../header.php";
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

<div class="container" class="p-3 mb-2 bg-transparent text-dark">
    <h1 class="text-center">Data Survei HS Store</h1>
    <a href="create.php" class="btn  btn-success mb-2"><i class="bi bi-person-plus"></i> Create New Survei</a>

    <table class="table table-striped table-bordered border-warning table-hover">
        <thead class="table-warning">
            <tr>
                <!-- <th scope="col">ID Survei</th> -->
                <th scope="col">Icon</th>
                <th scope="col">Judul Survei</th>
                <th scope="col">Link</th>
                <th scope="col" class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
        <tr>
            <?php
            $query = "SELECT * FROM survei";//SQL query to fecth all  table daa
            $view_survei = mysqli_query($conn, $query); //sending the query to the database

            //displaying all the data retrieved from the database using while lop
            while ($row = mysqli_fetch_assoc($view_survei)){
                $id = $row ['id_survei'];
                $icon = $row ['icon'];
                $judul = $row['judul'];
                $link = $row['link'];
                
                echo "<tr>";
                // echo "<th scope='row'> {$id}</th>";
                echo "<td ><img src='images/".$icon."' width='100' height='100'> </td>";
                echo "<td > {$judul}</td>";
                echo "<td > {$link}</td>";
                echo "<td class='text-center'> <a href='read.php?survei_id={$id}' class='btn btn-outline-success'> <i class='bi bi-eye'></i> Lihat</a></td>";
            }
            ?>
        </tr>
    </tbody>
    </table>
</div>


<!-- Modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-body">
                <h1 class="mt-4"><i class="fas fa-trash-alt text-danger fa-3x"></i></h1>
                <h2 class="mb-4"><b>DELETE</b></h2>
                <p>Yakin data akan dihapus?</p>
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger btn-block" id="deleteButton">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Sesuaikan skrip jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {
        $('.delete-btn').on('click', function (e) {
            e.preventDefault(); // Mencegah peristiwa default tautan

            var id = $(this).data('id');
            $('#deleteModal').modal('show');

            $('#deleteButton').on('click', function () {
                window.location.href = 'delete.php?delete=' + id;
            });
        });
    });
</script>


<?php include "../footer.php"; ?>
