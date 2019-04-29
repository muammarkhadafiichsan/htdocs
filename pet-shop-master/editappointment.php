<!DOCTYPE HTML>
<?php 
$pgTitle = 'Edit Appointment';
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
</head>
<body>
<!--Header-->
<header class='header'>
    <?php
      require 'Includes/Header.php';
    ?>
</header>

<?php
//Initialize Variables from Edit button Post request
$groomingID= $_POST['GroomingID'];

//Connect to Database 
$connect = mysqli_connect ('localhost', 'root', 'pwdpwd', 'pet_shop');

//Check Connection
if (mysqli_connect_errno()) {
    echo 'Cannot connect to database: ' . mysqli_connect_error();
} else {
//SELECT Query to populate form
$select = "SELECT GroomingID, FirstName, LastName, Address, City, State, Zip, PhoneNumber, Email, PetType, Breed, PetName, NeuteredOrSpayed, PetBirthday
FROM grooming WHERE GroomingID = '$groomingID'"; 
}
$result = mysqli_query ($connect,$select);
$value = mysqli_fetch_assoc($result);
?> 

<section id='formcontent'>
<h1>Edit Appointment</h1>
<form id='editappointmentform' action='updategrooming.php' method='post' onsubmit='return apptValidate()'>
    <input type="hidden" name="GroomingID" value= <?php echo $value['GroomingID']?> >
    
    <label for='firstname'>First Name:</label><br>
    <input type='text' id='firstname'name='firstname' size='20' value =<?php echo $value['FirstName'] ?> required><br>
    
    <label for='lastname'>Last Name:</label><br>
    <input type='text' id='lastname' name='lastname' size='20' value = <?php echo $value['LastName'] ?> required><br>
    
    <label for='address'>Address:</label><br>
    <input type='text' id='address' name='address' size='20'  value = "<?php echo $value['Address'] ?>" required><br>
   
    <label for='city'>City:</label><br>
    <input type="text" id='city' name="city" size="20"  value = <?php echo $value['City'] ?> required><br>
        
    <label for='state'>State:</label><br>
    <input type="text" id='state' name='state' size="2"  value = <?php echo $value['State'] ?> required><br>
   
    <label for='zip'>Zip Code:</label><br>
    <input type="text" id='zip' name="zip" size="10"  value = <?php echo $value['Zip'] ?> required><br> 
     
    <label for='phone'>Phone Number:</label><br>
    <input type='tel' id='phone' name='phone' size='10'  value = <?php echo $value['PhoneNumber'] ?> required><br>
    
    <label for='email'>Email:</label><br>
    <input type='email' name='email' id='email' size='20'  value = <?php echo $value['Email'] ?> required><br>
    
    <label for='typeofpet'>Type of Pet:</label><br>
    <select id='typeofpet' name="typeofpet" size="1" required>
        <option selected='selected'><?php echo  $value['PetType']; ?></option>
        <option value='Cat'>Cat</option>
        <option value='Dog'>Dog</option>
        </select>  
        
    <select id='editbreed' name='breed' size='1'>
        <option selected="selected"><?php echo $value['Breed']; ?> </option>
        <option value='Cat'>Cat</option>
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
    <input type='text' id='petname' name='petname' size='20'  value = "<?php echo $value['PetName']?>" required><br>
    
    <label for='altered'>Spayed or Neutered?</label>
    <input type='checkbox' value='Yes' name='altered'>Yes
    <input type='checkbox' value='No' name='altered'>No<br>
    
    <label for='petage'>Pet's Age:</label><br>
    <input type='text' id='petage' name='petage' size='20'  value = <?php echo $value['PetBirthday'] ?>><br>
    
   <br><input id='submit' id="submit" name="submit" type="submit" value="Update">
	   <input name="reset" type="reset" value="Reset Form">
</form><br>

<?php  
  mysqli_close($connect);
?>

</section>
  

<!--Footer--> 
<footer class='footer'>
    <?php
    require 'Includes/Footer.php';
     ?>
</footer>  
</body>
</html>