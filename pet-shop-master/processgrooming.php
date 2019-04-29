<?php
//Initialize Variables from Post data
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
$insert = "INSERT INTO grooming
    (FirstName, LastName, Address, City, State, Zip, PhoneNumber, Email, PetType, Breed, PetName, NeuteredOrSpayed, PetBirthday)
    VALUES ('$firstname', '$lastname', '$address', '$city', '$state', '$zipcode', '$phonenumber', '$email', '$typeofpet', '$breed', '$petname', '$altered', '$petage')";
    
    mysqli_query ($connect,$insert);
}
	mysqli_close($connect);
?>

