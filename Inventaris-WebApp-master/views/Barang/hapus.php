<?php
$id = $_GET['id'];
$query = "DELETE FROM inventaris WHERE id_inventaris = $id";
mysqli_query($conn, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Barang">';
?>
