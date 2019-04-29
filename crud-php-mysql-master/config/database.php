
<?php
// deklarasi parameter koneksi database
$server   = "localhost";
$username = "root";
$password = "root";
$database = "database";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password,$database) or die("Koneksi MySQL Gagal : " .mysql_error());
mysql_select_db($database) or die ("Koneksi Database Gagal : " .mysql_error());
?>