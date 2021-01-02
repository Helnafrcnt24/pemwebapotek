<?php 

$server 	= "localhost";
$username 	= "root";
$password	= "";
$database	= "apotek";

$mysqli = mysqli_connect($server, $username, $password, $database) or die('Koneksi Database Gagal : '.$mysqli->connect_error)
?>