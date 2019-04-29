<?php


    $login = false;
    if(isset($_SESSION['nama'])){
        $login = true;
    }

?>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<div class="wrapper">
<footer>
    <li><a href="index.php">Home</a></li>
            <li><a href="single.php">Destinasi Favorit</a></li>
            <li><a href="">Wilayah</a></li>
            <li><a href="">Galeri foto</a></li>
                <?php if($login == true): ?>
            <li><a href="logout.php">Logout</a></li><br>
                <?php else:?>
            <li><a href="login.php">Login</a></li><br>
                <?php endif;?>
  <div class="in-footer">
      
</div>
</footer>
<div class="footer">
    <li>Jalan Dewi Sartika No 61L Kelurahan Muara Ciujung Timur</li>
      <li>SMK Negeri 1 Rangkasbitung</li>
      <li>Telp. 021-0120-1201</li><br>
    
    <p id="copyright">&copy; Dinas Pariwisata Kabupaten Lebak</p>
</div>
    </div>
