<!DOCTYPE HTML>
<?php
    $pgTitle = 'Admin';
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
   
   //Sumbit the forms with Ajax plugin
   $('#submit').click(function(){
        $('#addappointmentform').ajaxForm(function(form){
       window.location.reload();
       });
   });
   
   $('#delete').click(function(){   
    $('#deleteappointmentform').ajaxForm(function(form){
       window.location.reload();
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

<?php
//Connect to Database 
$connect = mysqli_connect ('localhost', 'root', 'pwdpwd', 'pet_shop');

//Check Connection
if (mysqli_connect_errno()) {
    echo 'Cannot connect to database: ' . mysqli_connect_error();
} else {  
//SELECT Query
$select = "SELECT * FROM grooming";
}
$result = mysqli_query ($connect,$select);
?>

<!--Main Content-->
<div class='maincontent'>
      <table id='admintable'>
        <tr>
            <th>Grooming ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Zip</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Pet Type</th>
            <th>Breed</th>
            <th>Pet Name</th>
            <th>Altered</th>
            <th>Pet Age</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    <?php 
         while ($row = mysqli_fetch_assoc($result)){
         echo '<tr>';
         echo '<td>' . $row['GroomingID'] . '</td>';
         echo '<td>' . $row['FirstName'] . '</td>';
         echo '<td>' . $row['LastName'] . '</td>';
         echo '<td>' . $row['Address'] . '</td>';
         echo '<td>' . $row['City'] . '</td>';
         echo '<td>' . $row['State'] . '</td>';
         echo '<td>' . $row['Zip'] . '</td>';
         echo '<td>' . $row['PhoneNumber'] . '</td>';
         echo '<td>' . $row['Email'] . '</td>';
         echo '<td>' . $row['PetType'] . '</td>';
         echo '<td>' . $row['Breed'] . '</td>';
         echo '<td>' . $row['PetName'] . '</td>';
         echo '<td>' . $row['NeuteredOrSpayed'] . '</td>';
         echo '<td>' . $row['PetBirthday'] . '</td>';
         echo '<td><form method="post" action="editappointment.php" id="editappointment">
         <input type="hidden" name="GroomingID" value="' . $row['GroomingID'] . '">
         <input type="submit" id="editing" name="editing" value="Edit">
         </form></td>';
         echo '<td><form method="post" action="deleteappointment.php" id="deleteappointmentform">
         <input type="hidden" name="GroomingID" value="' . $row['GroomingID'] . '">
         <input type="submit" id="delete" name="delete" value="Delete">
         </form></td>';
         echo '</tr>';
         }   
    ?>
    </table>
    <?php 
        mysqli_free_result($result);
        mysqli_close($connect);
    ?>
</div>


<!--Grooming Form-->
<section id='formcontent'>
    <h1>Add Appointment</h1>
    
<form id='addappointmentform' action='processgrooming.php' method='post' onsubmit='return apptValidate()'>
    <label for='firstname'>First Name:</label><br>
    <input type='text' id='firstname'name='firstname' size='15' placeholder="Enter First Name" required><br>
    
    <label for='lastname'>Last Name:</label><br>
    <input type='text' id='lastname' name='lastname' size='20' placeholder="Enter Last Name" required><br>
    
    <label for='address'>Address:</label><br>
    <input type='text' id='address' name='address' size='15' placeholder='Enter Street Address' required><br>
   
    <label for='city'>City:</label><br>
    <input type="text" id='city' name="city" size="15" placeholder='Enter City' required><br>
        
    <label for='state'>State:</label><br>
    <input type="text" id='state' name='state' size="2" placeholder='ST' required><br>
   
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
    <input type='text' id='petname' name='petname' size='20' placeholder='Enter Pets Name' required><br>
    
    <label for='altered'>Spayed or Neutered?</label>
    <input type='checkbox' value='Yes' name='altered'>Yes
    <input type='checkbox' value='No' name='altered'>No<br>
    
    <label for='petage'>Pet's Age:</label><br>
    <input type='text' id='petage' name='petage' size='15' placeholder='Enter Pets Age'><br>
    
   <br><input id='submit' id="submit" name="submit" type="submit" value="Add">
	   <input name="reset" type="reset" value="Reset Form">

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