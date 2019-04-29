 <!-- Aplikasi CRUD
 ************************************************
 * Developer    : Indra Styawantoro
 * Company      : Indra Studio
 * Release Date : 1 Maret 2016
 * Website      : http://www.indrasatya.com, http://www.kulikoding.net
 * E-mail       : indra.setyawantoro@gmail.com
 * Phone        : +62-856-6991-9769
 * BBM          : 7679B9D9
 -->

<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	$nis           = mysql_real_escape_string(trim($_POST['nis']));
	$nama          = mysql_real_escape_string(trim($_POST['nama']));
	$tempat_lahir  = mysql_real_escape_string(trim($_POST['tempat_lahir']));

	$tanggal       = $_POST['tanggal_lahir'];
	$tgl           = explode('-',$tanggal);
	$tanggal_lahir = $tgl[2]."-".$tgl[1]."-".$tgl[0];

	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama         = $_POST['agama'];
	$alamat        = mysql_real_escape_string(trim($_POST['alamat']));
	$no_telepon    = $_POST['no_telepon'];

	// perintah query untuk menyimpan data ke tabel is_siswa
	$query = mysql_query("INSERT INTO is_siswa(	nis,
											 	nama,
												tempat_lahir,
												tanggal_lahir,
												jenis_kelamin,
												agama,
												alamat,
												no_telepon)	
										VALUES(	'$nis',
												'$nama',
												'$tempat_lahir',
												'$tanggal_lahir',
												'$jenis_kelamin',
												'$agama',
												'$alamat',
												'$no_telepon')");		

	// cek hasil query
	if ($query) {
		// jika berhasil tampilkan pesan berhasil insert data
		header('location: index.php?alert=2');
	} else {
		// jika gagal tampilkan pesan kesalahan
		header('location: index.php?alert=1');
	}						
}
?>