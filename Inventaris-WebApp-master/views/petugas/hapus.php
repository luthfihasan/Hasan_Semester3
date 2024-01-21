<?php
$id = $_GET['id'];

$query = "DELETE FROM petugas WHERE id_petugas = $id";
mysqli_query($conn, $query);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?page=petugas">';
