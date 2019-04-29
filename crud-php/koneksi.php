<?php
$host = "localhost";
$user_name = "root";
$password = "1234";
$database = "db";

$koneksi = mysql_connect($host, $user_name, $password);
$pilihdatabase = mysql_select_db($database, $koneksi);

// if ($pilihdatabase) echo"Berhasil";
// else echo "Gagal Koneksi";
?>