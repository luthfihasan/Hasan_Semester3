<?php
$id = $_GET['id'];

$queryBarang = "UPDATE inventaris SET id_ruang = 1 WHERE id_ruang = $id";
mysqli_query($conn, $queryBarang);

$query = "DELETE FROM ruang WHERE id_ruang = $id";
mysqli_query($conn, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=Ruang">';
