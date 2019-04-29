<?php 


require_once ('Includes\PHPMailer-master\PHPMailerAutoload.php');

$fromName = $_POST['firstname'] . $_POST['lastname'];
$to = 'wperrine04@gmail.com';
$from = $_POST['email'];
$body = $_POST['comments']; 


$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput= 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mai->SMTPAuth = true;
$mail->Username = "USERNAME";//Ommitted on purpose
$mail->Password = "PASSWORD";//Ommitted on purpose


$mail->SetFrom("$from", "$fromName");
$mail->AddReplyTo("$from", "$fromName");
$mail->AddAddress("$to", 'Wes' );
$mail->IsHtml(true);

$mail->Subject = 'Contact Request from Sandys Pet Shop';
$mail->Body = "$body";

if (!$mail->send()) 
{
    echo 'Message could not send';
    echo "Mailer Error: " . $mail -> ErrorInfo; 
} 
else {
    echo "Message has sent!";
    }

?>
