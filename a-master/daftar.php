<head>
    <link rel="stylesheet" href="sytle.css">
</head>
<body>
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
            margin: auto 35%;
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
    <div class="form_login">
        <p id="judul_login"> Daftar </p>
        
        <form action="" method="post">
            <label for="username">Username</label><br>
            <input class="username" type="text" name="username"><br><br>
            <label for="passsword">Password </label><br>
            <input class="username" type="password" name="password"><br><br>
            
            <input class="submit" type="submit" name="submit" value="Daftar"><br>
        
        </form>
        
        <div id="under_login">Atau <br><br> <a href="login.php">Login</a>
            </div>
    </div>
</body>