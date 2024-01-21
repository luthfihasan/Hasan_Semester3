<?php 
include '../../koneksi.php';

	$aksi = $_POST['aksi'];
	$nama = $_POST['nama'];
	$biaya = $_POST['biaya'];
	$waktu = $_POST['waktu'];

	if($aksi == 'insert'){		
		
			$query = "INSERT INTO kurir VALUES('','$nama','$biaya','$waktu')";

			mysqli_query($koneksi, $query) or die ("Gagal Perintah SQL".mysqli_error($koneksi));
	
	}else if ($aksi == 'update'){

			$id_kurir = $_POST['id_kurir'];

			$query = "UPDATE kurir SET  nama_kurir = '$nama', biaya_kurir = '$biaya', waktu_pengiriman = '$waktu' where id_kurir = '$id_kurir'";

			mysqli_query($koneksi, $query)
			or die ("Gagal Perintah SQL".mysql_error());


	}else {

			$id = $_POST['id'];
			$query = "DELETE FROM kurir WHERE id_kurir ='$id'";
			mysqli_query($koneksi, $query) or die ("Gagal Perintah SQL".mysql_error());
	}



 ?>
