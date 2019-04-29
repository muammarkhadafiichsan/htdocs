<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Pink Contact Form Responsive Widget Template  :: w3layouts</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pink Contact Form ,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<style>

table.tftable {table-layout:fixed; word-break:break-all; font-size:12px;color:#aaaaaa;width:90%;border-width: 1px;border-collapse: collapse;}
table.tftable th {font-size:12px;background-color:#e5e5e5;border-width: 1px;padding: 4px; border-style: solid;border-color: #cccccc;text-align:center;}
table.tftable tr {background-color:#f6f6f6;}
table.tftable td {font-size:12px;border-width: 1px;padding: 3px;border-style: solid;border-color: #cccccc; text-align:left; }
table.tftable1 {table-layout:fixed; word-break:break-all; font-size:11px;color:#90877c;width:90%;border-width: 1px;border-collapse: collapse;}
table.tftable1 th {font-size:11px;border-width: 0px;padding: 4px; border-style: solid;border-color: #ffffff;text-align:right;}

table.tftable1 td {font-size:11px;border-width: 1px;padding: 3px;border-style: solid;border-color: #ffffff; text-align:left; }

</style>
</head>
<body>
<center>
<br/>
	<div class="login-01">
			<form method="post" id="theform" action="cari.php">
				<ul>
				<li class="first">
					<input type="text" name="nama" class="text" value="Nama" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nama';}" >
					<div class="clear"></div>
				</li>
			    </ul>
			<input type="submit" onclick="myFunction()" value="cari" >
			<div class="clear"></div>
		</form>
</div>
<table class='tftable1'>
<tr>
<th>

<a href='#' alt='back up database'><img src='images/database.png'></img></a>
<a href='javascript:window.print()' alt='print'><img src='images/print.png'></img></a>
<a href='excel.php'><img src='images/excel.png'></img></a>
</th>
</tr>
</table>
<table id='tfhover' class='tftable' border='1' align='center'> <col width='30'><col width='50'><col width='50'><col width='50'><col width='50'><col width='200'><col width='20'><col width='20'>
<tr>
<th >ID</th>
<th >Nama</th>
<th >Telp</th>
<th >Email</th>
<th >Provinsi</th>
<th >Komentar</th>
<th>hapus</th>
<th>edit</th>
</tr>
<?php
include "koneksi.php";
				$batas=4; //satu halaman menampilkan xxx baris
				$halaman=$_GET['halaman'];
				$posisi=null;
				if(empty($halaman)){
					$posisi=0;
					$halaman=1;
				}else{
					$posisi=($halaman-1)* $batas;
				}

				$titel = $_REQUEST['titel'];
				$select = "select * from book order by id desc limit $posisi,$batas ";
				$select_query = mysql_query($select);
				$no=1;

while($select_result = mysql_fetch_array($select_query))
{

$id 			= $select_result['id'] ;
$nama 			= $select_result['nama'] ;
$telp 			= $select_result['telp'] ;
$email 			= $select_result['email'] ;
$prop 			= $select_result['prop'] ;
$comment		= $select_result['comment'] ;

echo"
<tr>
<td style='text-align:center;'>$id</td>
<td>$nama</td>
<td>$telp</td>
<td>$email</td>
<td>$prop</td>
<td>$comment</td>
<td><a href='hapus.php?id=$id'><img src='images/delete.png'></img></a></td>
<td><a href='edit.php?id=$id'><img src='images/edit.png'></img></a></td>
</tr>";
}

?>
</table>
<table id='tfhover' class='tftable1' border='1' align='center'> <col width='30'>
<tr>
<th>
<?php		
					//=============PAGING ========================
							$sql_paging = mysql_query("select * from book ");
							$jmldata = mysql_num_rows($sql_paging);
							$jumlah_halaman = ceil($jmldata / $batas);

							
							for($i = 1; $i <= $jumlah_halaman; $i++)
								if($i != $halaman) {
									echo "<ul class='paginate pag3 clearfix'><li><a href=halaman.php?halaman=$i>$i</a></li>";
								} else {
									echo "<ul class='paginate pag3 clearfix'><li class='current'>$i</li></ul>";
								}
							mysql_close();?>
						<br/><br/>
						<p>Total Data :<?php echo $jmldata;?></p>
</th>
</tr>
</table>
</center>

</body>
</html>