<?php 
include '../../koneksi.php';

	$aksi = $_POST['aksi'];
	if($aksi == 'insert'){	

			$sql = "SELECT id_product as maxid FROM product order by id_product desc";
			$hasil = mysqli_query($koneksi,$sql);
			$data  = mysqli_fetch_array($hasil);
			$id_user = $data['maxid'];
			$noUrut = (int) substr($id_user, 8);
			$noUrut++;

			$char = "Product_";
			$newID = $char . $noUrut;

			$nama = $_POST['nama'];
			$harga = $_POST['harga'];
			$desc = $_POST['desc'];
			$stok = $_POST['stok'];
			$kategori = $_POST['kategori'];

		
			// ambil data file
			$namaFile = $_FILES['gambar']['name'];
			$namaSementara = $_FILES['gambar']['tmp_name'];

			// tentukan lokasi file akan dipindahkan
			$dirUpload = "../../assets/product/";

			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

			if ($terupload) {

				$query = "INSERT INTO product VALUES('$newID','$nama','$harga','$desc','$stok','$kategori','$namaFile')";

				mysqli_query($koneksi, $query) or die ("Gagal Perintah SQL".mysqli_error($koneksi));
			}else{
				 echo '<script>alert("Gagal Upload File!"); document.location="product.php";</script>';
			}
	
	}else if ($aksi == 'update'){

			$id_product = $_POST['id_product'];
			$nama = $_POST['nama'];
			$harga = $_POST['harga'];
			$desc = $_POST['desc'];
			$stok = $_POST['stok'];
			$kategori = $_POST['kategori'];

			$gambar1 = $_POST['gambar1'];


			// ambil data file
			$namaFile = $_FILES['gambar2']['name'];
			$namaSementara = $_FILES['gambar2']['tmp_name'];

			// tentukan lokasi file akan dipindahkan
			$dirUpload = "../../assets/product/";

			// pindahkan file
			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

		if ($terupload) {
			$gambar = $namaFile;
		}else{
			$gambar = $gambar1;
		}

			$query = "UPDATE product SET nama_product = '$nama', harga = '$harga', description = '$desc',  stok = '$stok', kategori = '$kategori', gambar ='$gambar' where id_product = '$id_product'";

			mysqli_query($koneksi, $query)
			or die ("Gagal Perintah SQL".mysql_error());


	}else {

			$id = $_POST['id'];
			$query = "DELETE FROM product WHERE id_product ='$id'";
			mysqli_query($koneksi, $query) or die ("Gagal Perintah SQL".mysql_error());
	}



 ?>
