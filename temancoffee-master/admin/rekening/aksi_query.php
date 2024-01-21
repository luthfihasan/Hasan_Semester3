<?php 
include '../../koneksi.php';

	$aksi = $_POST['aksi'];
	if($aksi == 'insert'){	

			$nama = $_POST['nama'];
			$no_rek = $_POST['no_rek'];
			$atas_nama = $_POST['atas_nama'];

		
			// ambil data file
			$namaFile = $_FILES['gambar']['name'];
			$namaSementara = $_FILES['gambar']['tmp_name'];

			// tentukan lokasi file akan dipindahkan
			$dirUpload = "../../assets/img/";

			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

			if ($terupload) {

				$query = "INSERT INTO rekening VALUES('','$nama','$no_rek','$atas_nama','$namaFile')";

				mysqli_query($koneksi, $query) or die ("Gagal Perintah SQL".mysqli_error($koneksi));
			}else{
				 echo '<script>alert("Gagal Upload File!"); document.location="detail_transaksi.php";</script>';
			}
	
	}else if ($aksi == 'update'){

			$id_rekening = $_POST['id_rekening'];
			$nama = $_POST['nama'];
			$no_rek = $_POST['no_rek'];
			$atas_nama = $_POST['atas_nama'];

			$gambar1 = $_POST['gambar1'];


			// ambil data file
			$namaFile = $_FILES['gambar2']['name'];
			$namaSementara = $_FILES['gambar2']['tmp_name'];

			// tentukan lokasi file akan dipindahkan
			$dirUpload = "../../assets/img/";

			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		if ($terupload) {
			$gambar = $namaFile;
		}else{
			$gambar = $gambar1;
		}

			$query = "UPDATE rekening SET nama_bank = '$nama', no_rek = '$no_rek', atas_nama = '$atas_nama', logo_bank='$gambar' where id_rekening = '$id_rekening'";

			mysqli_query($koneksi, $query)
			or die ("Gagal Perintah SQL".mysql_error());


	}else {

			$id = $_POST['id'];
			$query = "DELETE FROM rekening WHERE id_rekening ='$id'";
			mysqli_query($koneksi, $query) or die ("Gagal Perintah SQL".mysql_error());
	}



 ?>
