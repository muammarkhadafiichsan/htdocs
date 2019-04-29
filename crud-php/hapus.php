
<html>
<head>
<title>MENGHAPUS DATA ANGSURAN KREDIT ... </title>
<META http-equiv="refresh" content="2;URL=lihat.php"> 
</head>
<body>

<?php 
include('koneksi.php');
$id = $_GET['id'];
$query = mysql_query("delete from book where id='$id'") or die(mysql_error());


?>
<center>
<b> DATA BERHASIL DIHAPUS </b><br />
kembali ke tabel data .....<br/><br/><br/>

</center>
</body>
</html>