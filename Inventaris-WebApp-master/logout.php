<?php
session_start();

session_destroy();
session_unset();
$_SESSION = [];

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.php">';
