<?php require_once "header.php";
      require_once "koneksi.php";

    $id = $_GET['id'];

    if(isset($_GET['id'])){
        $artikel2 = tampilkan_id($id);
        
        while($row= mysqli_fetch_assoc($artikel2)){
            $judul_awal = $row['judul'];
            $isi_awal   = $row['isi'];
            $tag_awal   = $row['tag'];
        }
    }

        
?>
    <style media="screen">
    .form_tambah{
            width: 80%;
            height: 800px;
            background: white;
            float: left;
            padding: 30px;
            box-sizing: border-box;
            border-bottom: 0.5px solid #dddddd;
}
        #judul_single{
            font-size: 25px;
            font-weight: bold;
        }
        #isi_single{
            font-size: 15px;
            margin-top: 20px;
        }
        #tag_awal{
            font-size: 12px;
        }
        
            </style>
       
    <div class="wrapper">
        <div class="form_tambah">
        <p id="judul_single"><?=$judul_awal;?></p><br>

        <p id="isi_single"><?= $isi_awal;?></p><br>

        <p id="tag_awal">Tag: <?= $tag_awal;?></p><br>
</div>
    

<?php  require_once "sidebar.php"; ?>
        </div>
<?php
        require_once "footer.php";

?>