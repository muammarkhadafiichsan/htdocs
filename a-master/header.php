<?php require_once "koneksi.php"; ?>

    <?php $login = false;
            if(isset($_SESSION['nama'])){
                $login = true;
            }
    ?>

        
   
<!DOCTYPE html>
<html lang="en-us">
<meta charset="utf-8">
    <head>
    <title>Website Pertama | saya</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div class="top">
                <p id="judul_web">Dinas Pariwisata Kabupaten Lebak</p>
            </div>
    <header>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="">Destinasi Favorit</a></li>
            <li><a href="">Wilayah</a></li>
            <li><a href="">Galeri foto</a></li>
            <?php if($login == true): ?>
              <li><a href="tambah_data.php">Tambah Data</a></li>
            <?php endif;?>
            
            <?php if($login == true):?>
                <li><a href="logout.php">Logout</a></li>
            <?php else:?>
                <li><a href="login.php">Login</a></li>
            <?php endif;?>
        </ul>    
    </header>
           
        
            
        
        </div>
    
</html>