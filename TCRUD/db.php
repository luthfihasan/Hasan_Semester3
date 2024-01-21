<?php
//server with default setting (user 'root' with no password)
$host = 'localhost';//server
$user = 'root';
$pass = "";
$database = 'tugascrud';//database Name

// estabilishing connection
$conn = mysqli_connect($host, $user, $pass, $database);

//for displaying an error msg in case the connection is not established
if (!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
