<!DOCTYPE HTML>
<?php
    $pgTitle = 'Store Location';
?>
<html>
<head>
<meta charset="utf-8">
<meta name='viewport' content='initial-scale=1.0, width=decive-width'/>
<title><?php echo $pgTitle; ?></title>
<script   src="https://code.jquery.com/jquery-3.0.0.min.js"   integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="   crossorigin="anonymous"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
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
        <h1>Address</h1><br>
        <p>Sandy's Pet Shop is located in the Toco Hills Plaza, at the following location:</p><br>
        <p>Sandy's Pet Shop</p>
        <p>Toco Hills Promenade, 2959 N Druid Hills Rd, Atlanta, GA 30329</p><br>
        <h1>Directions</h1><br>
        <p> From I-85 South:  Take Exit 89 and turn left onto N Druid Hills Road.   Sandy's Pet Shop is at the corner of N Druid Hills Road and Lavista Rd.</p><br>
        <p> From I-85 North:  Take Exit 89 and turn right onto N Druid Hills Road.   Sandy's Pet Shop is at the corner of N Druid Hills Road and Lavista Rd.</p><br>
        <h1>Hours of Operation</h1><br>
        <ul>
            <li>Mon: 8am to 5pm</li>
            <li>Tues: 8am to 5pm</li>
            <li>Wed: 8am to 5pm</li>
            <li>Thurs: 8am to 5pm</li>
            <li>Fri: 8am to 5pm</li>
            <li>Sat: 8am to 5pm</li>
            <li>Sun: Closed</li>
        </ul>
        
    </section>

<!--Google Map-->
    <section id='mapcontainer'>
        <script type="text/javascript">  
            //Once loaded, call function to load the map. Location of store is nearby shopping center
            $(document).ready(function(){
            var storeLatLong = {lat: 33.817816, lng: -84.311975};
            var map= new google.maps.Map(document.getElementById("mapcontainer"), { 
                zoom: 15,
                center: storeLatLong
            });
            //Marker for the Store:    
            var marker = new google.maps.Marker({
                position: storeLatLong,
                map: map,
                title: 'Sandys Pet Store'
            });
            
            //create display text for the map popup window and the popup window
            var infoWindowText = "<p>Sandys Pet Shop.2959 N Druid Hills Rd, Atlanta, GA 30329</p>";
            var infowindow = new google.maps.InfoWindow({ 
            content: infoWindowText
            });
            
            //enable clicking on the current-location marker
            google.maps.event.addListener(marker, 'click', function() { 
            infowindow.open(map,marker);
            });        
                    
          });   
        </script>
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