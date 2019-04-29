<?php 
   
    require_once "koneksi.php";
    require_once "header.php";?>

<?php 
$error = "";

    if(isset($_POST['submit'])){
        $judul = $_POST['judul'];
        $isi   = $_POST['isi'];
        $tag   = $_POST['tag'];
        
        if(!empty(trim($judul)) && !empty(trim($isi))){
            if(tambah_data($judul, $isi, $tag)){
                header('Location: index.php');
            }else{
                $error = "ada masalah saat tambah data";
            }
        }else{
            $error = "data harus diisi";
        }
    }

?>

    <style media="screen">
        
        .form_tambah{
            width: 80%;
            height: 900px;
            background: white;
            float: left;
            border-right: 0.5px solid #dddddd;
            box-sizing: border-box;
            padding-top: 20px;
            padding-left: 150px;
}
        
        
        .input{
            width: 400px;
            height: 30px;
            background: #dfdfdf;
            font-size: 18px;
        }
        .isi{
            width: 70%;
            height: 400px;
            background: #dfdfdf;
            font-size: 18px;
        }
        .submit{
            width: 400px;
            height: 30px;
            background: #50a8a9;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
        }
        .submit:hover{
            background: #249697;
        }
        .error{
            color: red;
        }
    </style>
<div class="wrapper">
<div class="form_tambah">
<form action="" method="post">

    <label for="judul">Judul</label><br>
    <input class="input" type="text" name="judul" value=""><br><br>
    
    <label for="isi">Isi</label><br>
    <textarea class="isi" name="isi" value="" rows="19" cols="100"></textarea><br><br>
    
    <label for="tag">Tag</label><br>
    <input class="input" type="text" name="tag" value=""><br><br>
    
    <div class="error"><br>
        <?= $error;?>
    </div>
    <br>
    <input class="submit" type="submit" name="submit" value="Kirim"><br>
    

    </form>
    </div>
    <div class="sidebar"></div>
    <div class="sidebar2"></div>
    </div>
<?php require_once "footer.php";?>