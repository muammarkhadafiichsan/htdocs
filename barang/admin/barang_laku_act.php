<?php 

include 'config.php';
$tgl=$_POST['tgl'];
$nama=$_POST['nama'];
$harga=$_POST['harga'];
$no_hp=$_POST['no_hp'];
$jumlah=$_POST['jumlah'];

$dt=mysqli_query($link,"select * from barang where nama='$nama'");
$data=mysqli_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysqli_query($link,"update barang set jumlah='$sisa' where nama='$nama'");

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;
mysqli_query($link,"insert into barang_laku values('','$tgl','$nama','$jumlah','$harga','$total_harga','$labaa','$no_hp')")or die(mysqli_error($link));
header("location:barang_laku.php");

?>