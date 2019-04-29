<!DOCTYPE HTML>
<?php
    $pgTitle = 'Contact Sandys Pet Shop';
?>
<html>
<head>
<meta charset="utf-8">
<meta name='viewport' content='initial-scale=1.0, width=decive-width'/>
<title><?php echo $pgTitle; ?></title>
<script   src="https://code.jquery.com/jquery-3.0.0.min.js"   integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="   crossorigin="anonymous"></script>
<script src="//oss.maxcdn.com/jquery.form/3.50/jquery.form.min.js"></script>
<script src='Scripts/main.js' type='text/javascript'></script>
<link href='CSS/reset-meyer.css' rel='stylesheet' type="text/css">
<link href='CSS/main.css' rel='stylesheet' type="text/css">
<script type="text/javascript">

//Sumbit the form with Ajax plugin
$(document).ready(function() {
    $('#submit').click(function(){
    $('#contactform').ajaxForm(function(form){
        window.alert('Thank You for emailing us!')
        });    
    });
});

</script>
</head>    
<body> 
<!--Header-->
<header class='header'>
    <?php
      require 'Includes/Header.php';
    ?>
 </header>

<!--Contact Us Form-->
<section id='formcontent'>
    <h1>Contact Us</h1>
<form id='contactform' method='post' action='mailer.php' onsubmit='return contactValidate()'>
    <label for='firstname'>First Name:</label><br>
    <input type='text' id='firstname' name='firstname' size='15' placeholder="Enter First Name"><br>
    <label for='lastname'>Last Name:</label><br>
    <input type='text' id='lastname' name='lastname' size='15' placeholder="Enter Last Name"><br>
    <label for='email'>Email:</label><br>
    <input type='email' name='email' id='email' size='15' placeholder="Enter Your Email"><br>
    <label for='comments'>Message:</label><br>
    <textarea id='comments' name='comments' cols='20' rows='5' placeholder='Comments or Questions'></textarea><br>
    <input id='submit' name="submit" type="submit" value="Submit">
	<input name="reset" type="reset" value="Reset Form">
</form><br>
</section>
<div id='form-messages'></div>
 
<!--Footer--> 
    <footer class='footer'>
        <?php
        require 'Includes/Footer.php';
        ?>
    </footer>
</body>
</html>