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
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,100italic,300italic,400italic|Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,800,700,900' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body>
<h1>Edit</h1>
<?php
include "koneksi.php";
$id = $_GET['id'];
$select = "select * from book where id='$id'";
$select_query = mysql_query($select);


while($select_result = mysql_fetch_array($select_query))
{

$id 			= $select_result['id'] ;
$nama			= $select_result['nama'] ;
$telp			= $select_result['telp'] ;
$email			= $select_result['email'] ;
$comment		= $select_result['comment'] ;

echo"	
	<div class='login-01'>
			<form method='post' id='theform' action='update.php'>
				<ul>
				<input type='text' name='id' class='text' value='$id'>
				<li class='first'>
					<a href='#' class=' icon user'></a><input type='text' name='nama' class='text' value='$nama' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'Name';}' >
					<div class='clear'></div>
				</li>
				<li class='first'>
					<a href='#' class=' icon email'></a><input type='text' name='email' class='text' value='$email' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'Email';}' >
					<div class='clear'></div>
				</li>
				<li class='first'>
					<a href='#' class=' icon phone'></a><input type='text' name='telp' class='text' value='$telp' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'Phone';}' >
					<div class='clear'></div>
				</li>
				<li class='first'>
				<a href='#' class=' icon selc'></a>
				<select name='prop' form='theform'>
				 <option value='pilih'>Provinsi</option>
				  
				  <option value='Jawa Tengah'>Jawa Tengah</option>
				  <option value='Jawa Barat'>Jawa Barat</option>
				  <option value='DIY'>DIY</option>
				  <option value='Jawa Timur'>Jawa Timur</option>
				</select>
				<div class='clear'></div>
				</li>
				<li class='second'>
				<a href='#' class=' icon msg'></a><textarea name='comment' value='$comment' onfocus='this.value = '';' onblur='if (this.value == '') {this.value = 'Comments';}'>$comment</textarea>
				<div class='clear'></div>
				</li>
			</ul>
			<input type='submit' onclick='myFunction()' value='Submit' >
			<div class='clear'></div>
		</form>
</div>";}?>
	<!--start-copyright-->
   		<div class="copy-right">
   			<div class="wrap">
				<p>Copyright &copy; 2015  All rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>
	<!--//end-copyright-->
</body>
</html>