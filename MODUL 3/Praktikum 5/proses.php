<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Di sini, Anda dapat menambahkan kode untuk menyimpan data ke database atau melakukan tindakan lain sesuai kebutuhan.
    
    // Contoh: Menyimpan data ke dalam file teks
    $data = "Nama: $nama\nAlamat Email: $email\nKata Sandi: $password\n";
    file_put_contents("data_registrasi.txt", $data, FILE_APPEND);
    
    echo "Registrasi berhasil! Terima kasih, $nama.";
} else {
    echo "Akses tidak sah.";
}
?>
