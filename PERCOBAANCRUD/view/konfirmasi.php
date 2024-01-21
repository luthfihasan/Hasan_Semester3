<?php
include "../header.php";

if (isset($_GET['delete'])) {
    $survei_id = $_GET['delete'];

    // Set sesi untuk menandai bahwa popup harus ditampilkan
    $_SESSION['show_delete_modal'] = true;

    // Redirect kembali ke read.php
    header("Location: home.php");
    exit();
}

// Cek apakah sesi menandakan bahwa popup harus ditampilkan
if (isset($_SESSION['show_delete_modal']) && $_SESSION['show_delete_modal']) {
    unset($_SESSION['show_delete_modal']); // Hapus sesi setelah digunakan

    // Tampilkan popup modal
    ?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-zicons@1.3.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Modal -->
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
                    <button type="button" class="btn btn-danger btn-block" id="deleteButton">Delete</button>
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
            $('#deleteModal').modal('show');

            $('#deleteButton').on('click', function () {
                window.location.href = 'delete.php?delete=<?php echo $survei_id; ?>';
            });
        });
    </script>
    <?php
    exit(); // Pastikan untuk keluar dari script setelah menampilkan modal
}

// Sisipkan footer.php setelah mengecek dan menampilkan modal
include "footer.php";
?>
