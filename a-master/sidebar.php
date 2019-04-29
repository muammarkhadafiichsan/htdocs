<?php   require_once "header.php";
        require_once "koneksi.php";
?>
<?php 
    $side = tampilkan_side();
    ?>
<style media="screen">
    .sidebar{
    width: 99%;
    height: auto;
    background: white;
}
    .artikel_side{
        width: 90%;
        height: auto;
        background: white;
        text-align: center;
        margin: 0 auto;
    }
        #judul_side{
    width: 90%;
    height: auto;
    margin: 5px auto;
    background: white;
    padding: 10px 0; 
    color: black;
    margin-left: 0;
    border-bottom: 0.5px solid #dddddd;
    color: green;
}
    #judul_side a{
        color: gray;
    }
    
    .side_top{
        float: right;
        width: 20%;
        height: auto;
        background: white;
    }
</style>
<div class="side_top">
<div class="sidebar">
                <div id="top_sidebar">
                    <p id="teks_top_sidebar">Profil tempat</p>
                </div>
                <?php while($row= mysqli_fetch_assoc($side)):?>
                <div class="artikel_side">
                    
                    <p id="judul_side"><a href="single.php?id=<?= $row['id'];?>"><?= $row['judul'];?></a></p>
                </div>
                <?php endwhile;?>
            </div>
            <div class="sidebar2">
                <div id="top_sidebar2">
                    <p id="teks_top_sidebar2">Wilayah Favorit</p>
                </div>
            </div>
    </div>