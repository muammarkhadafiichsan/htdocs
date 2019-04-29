<!DOCTYPE HTML>
<?php
    $pgTitle = 'Grooming Appointment';
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
<script>
$(document).ready(function(){
  //Make Breed list appear once dog is selected
  $('#typeofpet').change(function() {
  $('#breed').css('visibility', 'visible');
  });
   
 //AJAX Submit  
  $('#submit').click(function(){
  
  $('#appointmentform').ajaxForm(function(form){  
    window.alert('Thank you for your submission!');
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

<div class='maincontent'>
    <section id='overview'>
        <h1>Grooming Services</h1><br>
        <p>We offer several different services to get your pet looking its best! Prices are based on breed and pet size.</p><br>
        
        <h1>Services</h1><br>
        <ul>
            <li>Bathing: Get your pet washed in luxury with non-irritating oatmeal shampoos.</li>
            <li>Coat Trims: We can offer several types of coat cuts ranging from summer buzzing to traditional poodle cuts.</li>
            <li>De-fur Brushing:  If you have a shaggy dog, we use shedding brushes to remove dead hair and shedding undercoats.</li>
            <li>We also offer extra long brushing sessions to make help cut down on your pet's shedding after thier bath.</li>
            <li>Nail Trimming: We offer to trim your pet's nails to keep them at a safe length.</li>
        </ul>
    </section>
    <div id='output'></div>

<!--Grooming Form-->
<section id='apptformcontent'>
    <h1>Pet Grooming Appointment</h1>
    
    <form id='appointmentform' action='processgrooming.php' method='post' onsubmit= 'return apptValidate()'>
    <label for='firstname'>First Name:</label><br>
    <input type='text' id='firstname' name='firstname' size='15' placeholder="Enter First Name" required><br>
    
    <label for='lastname'>Last Name:</label><br>
    <input type='text' id='lastname' name='lastname' size='15' placeholder="Enter Last Name" required><br>
    
    <label for='address'>Address:</label><br>
    <input type='text' id='address' name='address' size='15' placeholder='Enter Street Address' required><br>
   
    <label for='city'>City:</label><br>
    <input type="text" id='city' name="city" size="15" placeholder='Enter City' required><br>
        
    <label for='state'>State:</label><br>
    <input type="text" id='state' name='state' size="2" placeholder='Enter ST' required><br>
   
    <label for='zip'>Zip Code:</label><br>
    <input type="text" id='zip' name="zip" size="10" placeholder='Enter Zip' required><br> 
     
    <label for='phone'>Phone Number:</label><br>
    <input type='tel' id='phone' name='phone' size='10' placeholder='Phone Number' required><br>
    
    <label for='email'>Email:</label><br>
    <input type='email' name='email' id='email' size='15' placeholder="Enter Your Email" required><br>
    
    <label for='typeofpet'>Type of Pet:</label><br>
    <select id='typeofpet' name="typeofpet" size="1" required>
        <option value='Cat'>Cat</option>
        <option value='Dog'>Dog</option>
        </select>  
        
    <select id='breed' name='breed' size='1'>
        <option value='Cat'>Select Breed</option>
        <option value='Retriever'>Retriever</option>
        <option value='Sheperd'>Sheperd</option>
        <option value='Bulldog'>Bulldog</option>
        <option value='Collie'>Collie</option>
        <option value='Poodle'>Poodle</option>
        <option value='Terrier'>Terrier</option>
        <option value='Husky'>Husky</option>
        <option value='Large Breed'>Large Breed</option>
        <option value='Toy Breed'>Toy Breed</option>
        </select><br>
    
    <label for='petname'>Pet's Name:</label><br>
    <input type='text' id='petname' name='petname' size='15' placeholder='Enter Pets Name' required><br>
    
    <label for='altered'>Spayed or Neutered?</label>
    <input type='checkbox' value='Yes' name='altered'>Yes
    <input type='checkbox' value='No' name='altered'>No<br>
    
    <label for='petage'>Pet's Age:</label><br>
    <input type='text' id='petage' name='petage' size='15' placeholder='Enter Pets Age'><br>
    
   <br><input id='submit' name="submit" type="submit" value="Submit">
	   <input name="reset" type="reset" value="Reset Form">
    </form>
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