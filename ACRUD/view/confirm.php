<?php include "../header.php"; ?>

<?php
if (isset($_GET['delete'])) {
    $surveiid = $_GET['delete'];

    // Set sesi untuk menandai bahwa popup harus ditampilkan
    $_SESSION['show_delete_modal'] = true;
    
    // Redirect kembali ke home.php
    header("Location: home.php");
    exit();
}

// Cek apakah sesi menandakan bahwa popup harus ditampilkan
if (isset($_SESSION['show_delete_modal']) && $_SESSION['show_delete_modal']) {
    unset($_SESSION['show_delete_modal']); // Hapus sesi setelah digunakan

    // Tampilkan popup modal
?>
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
                <a href="delete.php?delete=<?php echo $surveiid; ?>" class="btn btn-danger btn-block">Delete</a>
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





<?php
    exit(); // Pastikan untuk keluar dari script setelah menampilkan modal
}

// Sisipkan footer.php setelah mengecek dan menampilkan modal
include "footer.php";
?>
