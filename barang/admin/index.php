<?php 
include 'header.php';
?>

<?php
$a = mysqli_query($link,"select * from barang_laku");
?>

<div class="col-md-10">
	<h3>Selamat datang di website PULSA ONLINE</h3>	
    <h3>Selamat Berbelanja ^_^</h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>