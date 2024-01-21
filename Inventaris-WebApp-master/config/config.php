<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'inventaris';

$conn = mysqli_connect($host, $user, $pass, $dbname) or die(mysqli_error($conn));
