
<?php
include "koneksi.php";
$id	 			= $_POST['id'] ;
$nama	 		= $_POST['nama'] ;
$email			 = $_POST['email'] ;
$telp 			= $_POST['telp'] ;
$prop	 		= $_POST['prop'] ;
$comment		 = $_POST['comment'] ;



$query_update = "update book set
nama	 		= '$nama', 
email			= '$email',
telp			= '$telp',
prop			= '$prop',
comment			= '$comment'
where id='$id'";

$update = mysql_query($query_update);

if($update)
	{
	echo "berhasil update... ";
	echo "<META http-equiv='refresh' content='0;URL=lihat.php'>";
	}

else
	{
	echo "Gagal update ... ";
	
	}

?>