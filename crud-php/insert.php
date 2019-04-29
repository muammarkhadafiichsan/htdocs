
<?php
include "koneksi.php";

$nama	 		= $_POST['nama'] ;
$email			 = $_POST['email'] ;
$telp 			= $_POST['telp'] ;
$prop	 		= $_POST['prop'] ;
$comment		 = $_POST['comment'] ;



$query_insert = "insert into book (
nama, 
email, 
telp, 
prop, 
comment
)
values(
'$nama', 
'$email', 
'$telp', 
'$prop', 
'$comment'
);";

$insert = mysql_query($query_insert);

if($insert)
	{
	echo "berhasil... ";
	echo "<META http-equiv='refresh' content='0;URL=lihat.php'>";
	}

else
	{
	echo "Gagal update ... ";
	
	}

?>