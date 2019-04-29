<!DOCTYPE HTML>
<?php
    $pgTitle = 'Login';
?>
<html>
<head>
<meta charset="utf-8">
<meta name='viewport' content='initial-scale=1.0, width=decive-width'/>
<title><?php echo $pgTitle; ?></title>
<script   src="https://code.jquery.com/jquery-3.0.0.min.js"   integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="   crossorigin="anonymous"></script>
<script src='Scripts/main.js' type='text/javascript'></script>
<link href='CSS/reset-meyer.css' rel='stylesheet' type="text/css">
<link href='CSS/main.css' rel='stylesheet' type="text/css">
</head>
<body>
<!--Header-->
<header class='header'>
    <?php
      require 'Includes/Header.php';
    ?>
</header>

<!--Login Processing-->
<div class='maincontent'>
    <?php
    //Login for Admin Page
    $msg='';
    $username='';
    if (array_key_exists('LoggingIn', $_POST))
    {
    $username = $_POST['username'];
    $pw = $_POST['password'];
    //Hardcoded UserName and Password
    if ($username == 'sandyspetshop' && $pw == 'ilovedogs') 
    {
        header("Location:admin.php");
        exit();
    } else {
        echo '<h1 id="loginerror" align="center">Login Failed! Please Try Again</h1>'; 
        unset ($_POST['LoggingIn']);
        }
    }
?>
</div>

<!--Login Form-->
<section id='formcontent'>
    <h1>Login Form</h1>
    <form id='loginform' method='post' action='login.php'>
        <input type="hidden" name='LoggingIn' value='true'>
        <label for='username'>Username:</label>
        <br>
        <input type='text' name='username' id='username' size='20' placeholder="Username">
        <br>
        <label for='password'>Password:</label>
        <br>
        <input type='password' name='password' id='password' size='20' placeholder="Password">
        <br>
        <input type='submit' value='Log In'>
    </form><br>
</section>

<!--Footer-->
<footer class='footer'>
    <?php
    require 'Includes/Footer.php';
     ?>
</footer>
</body>

</html>