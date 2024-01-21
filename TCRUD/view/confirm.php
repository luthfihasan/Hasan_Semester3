
<?php
if (isset($_GET['delete'])) {
    $surveiid = $_GET['delete'];
    
    // Menampilkan konfirmasi penghapusan menggunakan JavaScript
    echo "<script>
            var confirmation = confirm('Apakah Anda yakin ingin menghapus data?');
            if (confirmation) {
                // Jika pengguna menekan OK, maka lanjutkan dengan menghapus data 
                window.location.href = 'delete.php?delete={$surveiid}';
            } else {
                // Jika pengguna menekan Cancel, arahkan kembali ke home.php
                window.location.href = 'home.php';
            }
          </script>";
    exit(); // Pastikan untuk keluar dari script setelah menampilkan konfirmasi
}
?>