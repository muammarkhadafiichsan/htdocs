<head>
<!--    <link rel="stylesheet" href="style.css">-->
</head>
<body>
    <?php require_once "koneksi.php";
    $error = "";
    
    if(isset($_SESSION['nama'])){
        header('Location: index.php');
    }else{
    ?>
    
        <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['username'];
        $pass = $_POST['password'];
        
        if(!empty(trim($nama)) && !empty(trim($pass))){
            
            $_SESSION['nama'] = $nama;
            if(cek_data($nama, $pass)){
                header('Location: index.php');
            }else{
                $error = "kombinasi nama dan password salah";
            }
        }else{
            $error = "nama dan password harus diisi";
        }
    }
    
    ?>
    
    <div class="form_login">
        <p id="judul_login"> Login </p>
        
        <form action="" method="post">
            <label for="username">Username</label><br>
            <input class="username" type="text" name="username"><br><br>
            <label for="passsword">Password </label><br>
            <input class="username" type="password" name="password"><br><br>
            <div class="error"><?= $error;?></div>
            
            <input class="submit" type="submit" name="submit" value="Login"><br>
        
        </form>
        
        <div id="under_login">Belum Punya akun, daftar <a href="daftar.php">disini</a>
            </div>
    </div>
    <style media="screen">
        *{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
        }
        body{
            background: #c2c4c2;
        }
        .form_login{
            width: 30%;
            height: 400px;
            background: white;
            margin: 5% auto;  
}
        form{
            padding: 20px;
        }
        #judul_login{
            width: 100%;
            height: 40px;
            background: #50a8a9;
            color: white;
            text-align: center;
            line-height: 40px;
            font-size: 23px;
            margin-bottom: 30px;
        }
        
        .username{
            width: 350px;
            height: 35px;
        }
        .username:focus{
            font-size: 20px;
            background: #dfdfdf;
        }
        .submit{
            width: 350px;
            height: 40px;
            background: #49af49;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: white;
        }
        .submit:hover{
            background: #41b741;
        }
        #under_login{
            padding: 20px;
            
        }
        .error{
            color: red;
        }
        a{
            width: 80px;
            height: 40px;
            background: #50a8a9;
            text-decoration: none;
            padding: 5px;
            color: white;
            font-size:14px;
            border-radius: 3px;
        }
    </style>
</body>
<?php } ?>