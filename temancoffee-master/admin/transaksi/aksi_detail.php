<?php 
include '../../koneksi.php';

$aksi = $_POST['aksi'];
$id_transaksi = $_POST['id_transaksi'];
if($aksi == 'ubah_status'){

	$status = $_POST['status'];

	$update_transaksi = mysqli_query($koneksi,"UPDATE transaksi SET status = '$status' where id_transaksi = '$id_transaksi'");

	if ($update_transaksi) {

		echo '<script>alert("Status Sukses Diupdate!"); document.location="detail_transaksi.php?id_transaksi='.$id_transaksi.'";</script>';

	}else{

		echo '<script>alert("Status Gagal Diupdate!"); document.location="detail_transaksi.php?id_transaksi='.$id_transaksi.'";</script>';

	}
	


}else if ($aksi == 'input_resi') {

	$no_resi = $_POST['no_resi'];

	$update = mysqli_query($koneksi,"UPDATE transaksi SET no_resi = '$no_resi', status = 'Pesanan Dikirim' where id_transaksi = '$id_transaksi'");
	if ($update) {

		echo '<script>alert("No Resi Sukses Diupdate!"); document.location="detail_transaksi.php?id_transaksi='.$id_transaksi.'";</script>';

	}else{

		echo '<script>alert("No Resi Gagal Diupdate!"); document.location="detail_transaksi.php?id_transaksi='.$id_transaksi.'";</script>';

	}
	
}else if ($aksi == 'bukti_transaksi') {

	$status = $_POST['status'];

	$update = mysqli_query($koneksi,"UPDATE bukti_transaksi SET status = '$status' where id_transaksi = '$id_transaksi'");

	if ($status == 'Valid') {
		$update_transaksi = mysqli_query($koneksi,"UPDATE transaksi SET status = 'Pesanan Diproses' where id_transaksi = '$id_transaksi'");
	}
	
	if ($update) {

		echo '<script>alert("Status Bukti Sukses Diupdate!"); document.location="detail_transaksi.php?id_transaksi='.$id_transaksi.'";</script>';

	}else{

		echo '<script>alert("Status Bukti Gagal Diupdate!"); document.location="detail_transaksi.php?id_transaksi='.$id_transaksi.'";</script>';

	}
	
}
?>