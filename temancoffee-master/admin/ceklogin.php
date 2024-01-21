<?php
session_start();

$id_admin = $_SESSION ['id_admin'];

if (!isset($id_admin) || empty($id_admin)) {
	
	header('location:../login.php');
}

?>