<!DOCTYPE HTML>

<?php
    $pgTitle = 'About Us';
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
   
<!--Main Content-->
<div class='maincontent'>
    <section id='overview'>
         <h1>Our Mission</h1><br>
         <p>At Sandy's Pet Shop we all share a love of animals and eachother's company.  Founded by Wes and Rachel and named after thier first pet Sandy, SPS prides itself on providing a professional and loving environment for its employees and patrons.</p><br>
         
         <h1>Our Staff</h1><br>
         <ul>
            <li>Wes</li>
            <li>Rachel</li>
            <li>Chandler</li>
            <li>Jenn</li>
            <li>Rosie</li>
            <li>Joe</li>
            <li>Mike</li>
            <li>Sarah</li>
         </ul>   
    </section>
    
    <section id='grouppic'>
        <h1>The Crew</h1><br>
        <img src='Images/grouppic.jpg' alt='Staff'>        
    </section>
</div>

<!--Footer--> 
    <footer class='footer'>
        <?php
        require 'Includes/Footer.php';
        ?>
    </footer>
</body>
</html>