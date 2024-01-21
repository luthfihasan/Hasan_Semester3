<?php 
include '../../koneksi.php';

	$aksi = $_POST['aksi'];
	if($aksi == 'insert'){		
		
			$kategori = $_POST['kategori'];
			$query = "INSERT INTO kategori VALUES('','$kategori')";

			mysqli_query($koneksi, $query) or die ("Gagal Perintah SQL".mysqli_error($koneksi));
	
	}else if ($aksi == 'update'){

			$id_kategori = $_POST['id_kategori'];
			$kategori = $_POST['kategori'];

			$query = "UPDATE kategori SET  kategori = '$kategori' where id_kategori = '$id_kategori'";

			mysqli_query($koneksi, $query)
			or die ("Gagal Perintah SQL".mysql_error());


	}else {

			$id = $_POST['id'];
			$query = "DELETE FROM kategori WHERE id_kategori ='$id'";
			mysqli_query($koneksi, $query) or die ("Gagal Perintah SQL".mysql_error());
	}



 ?>
