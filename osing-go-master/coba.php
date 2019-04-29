<?php
include_once("koneksi.php");
$id = $_GET['id_perusahaan'];
$ada= "SELECT * FROM jasaweb WHERE id_perusahaan='$id'";
$pesan = mysqli_query($mysqli,$ada);
while($row = mysqli_fetch_array($pesan))
{	
	$id_pelanggan = $row['id_perusahaan'];
	$nama = $row['nama_perusahaan'];
	
}
?>

<?php echo $nama; ?>
