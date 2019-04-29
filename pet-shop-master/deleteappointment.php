<?php 
//Initialize Variables from Post data
$groomingID= $_POST['GroomingID'];
    
//Connect to Database 
$connect = mysqli_connect ('localhost', 'root', 'pwdpwd', 'pet_shop');

//Check Connection
if (mysqli_connect_errno()) {
    echo 'Cannot connect to database: ' . mysqli_connect_error();
} else {

//Delete Query
$delete = "DELETE FROM grooming WHERE GroomingID = '$groomingID'"; 

  mysqli_query ($connect,$delete);
       
  
}
    mysqli_close($connect);
    header("Location:admin.php");
    exit();
?>

