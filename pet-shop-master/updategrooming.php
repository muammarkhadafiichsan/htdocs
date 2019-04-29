<?php
//Initialize Variables from Edit form Post data
$groomingID= $_POST['GroomingID'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zip'];
$phonenumber = $_POST['phone'];
$email = $_POST['email'];
$typeofpet = $_POST['typeofpet'];
$breed = $_POST['breed'];
$petname = $_POST['petname'];
$altered = $_POST['altered'];
$petage = $_POST['petage'];
    
//Connect to Database 
$connect = mysqli_connect ('localhost', 'root', 'pwdpwd', 'pet_shop');

//Check Connection
if (mysqli_connect_errno()) {
    echo 'Cannot connect to database: ' . mysqli_connect_error();
} else {

//INSERT Query
$update = "UPDATE grooming
    SET FirstName= '$firstname', LastName = '$lastname', Address = '$address', City ='$city', State = '$state', Zip = '$zipcode', PhoneNumber = '$phonenumber', Email = '$email', PetType = '$typeofpet', Breed = '$breed', PetName = '$petname', NeuteredOrSpayed = '$altered', PetBirthday ='$petage'
    WHERE GroomingID = '$groomingID'"; 
    
    mysqli_query ($connect,$update);

}
	mysqli_close($connect);
    header("Location:admin.php");
    exit();
?>

