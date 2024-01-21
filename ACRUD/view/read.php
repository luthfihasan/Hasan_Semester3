<!-- header -->
<?php
session_start();
include "../header.php";
?>

<div class="container mt-4" class="p-3 mb-2 bg-transparent text-dark">
    <h1 class="text-center">DATA SURVEI</h1>
    <a href="create.php" class="btn btn-outline-dark mb-2 mt-5"><i class="bi bi-person-plus"></i>Buat Survei Baru</a>

    <table class="table table-striped table-bordered border-warning table-hover">
        <thead class="table-dark">
            <tr>
                <!-- <th scope="col">ID Survei</th> -->
                <th scope="col">ID</th>
                <th scope="col">Icon</th>
                <th scope="col">Judul</th>
                <th scope="col">Link</th>
                <th scope="col" colspan="2" class="text-center">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $query = "SELECT * FROM survei"; // SQL query to fetch all table data
            $view_survei = mysqli_query($conn, $query); // sending the query to the database

            // displaying all the data retrieved from the database using while loop
            while ($row = mysqli_fetch_assoc($view_survei)) {
                $id = $row['id_survei'];
                $icon = $row['icon'];
                $judul = $row['judul'];
                $link = $row['link'];

                echo "<tr>";
                echo "<th scope='row' > {$id}</th>";
                echo "<td ><img src='images/" . $icon . "' width='100' height='100'> </td>";
                echo "<td > {$judul}</td>";
                echo "<td > {$link}</td>";
                echo "<td class='text-center'> <a href='update.php?edit&survei_id={$id}' class='btn btn-secondary'> <i class='bi bi-pencil'></i> Edit</a></td>";
                echo "<td class='text-center'> <a href='confirm.php?delete={$id}' class='btn btn-danger delete-btn' data-id='{$id}'><i class='bi bi-trash'></i> Hapus</a></td>";
                echo "</tr>";
            }
            ?>
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
