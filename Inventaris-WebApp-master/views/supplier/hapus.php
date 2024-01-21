<?php
$id = $_GET['id'];

$queryBarang = "UPDATE barang_masuk SET id_supplier = 1 WHERE id_supplier = $id";
mysqli_query($conn, $queryBarang);

$query = "DELETE FROM supplier WHERE id_supplier = $id";
mysqli_query($conn, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Supplier">';
