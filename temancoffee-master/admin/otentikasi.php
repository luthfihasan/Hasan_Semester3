<?php
include '../koneksi.php';
session_start();
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$data1 = mysqli_fetch_array($data);
$id_admin = $data1['id_admin'];
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	
	$_SESSION['id_admin'] = $id_admin;

		
	echo '<script>alert("Login Sukes!"); document.location="index.php";</script>';

} else {
	
	echo '<script>alert("Login Gagal!");  document.location="login.php"</script>';
	
}

?>