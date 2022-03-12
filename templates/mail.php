<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $pass=$_POST['pass'];

    require 'mailphp/Exception.php';
    require 'mailphp/PHPMailer.php';
    require 'mailphp/SMTP.php';
$mail = new PHPMailer(true);
try {
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;     
    $mail->isSMTP();                          
    $mail->Host       = 'smtp.gmail.com';     
    $mail->SMTPAuth   = true;                            
    $mail->Username   = $email; 
    $mail->Password   = $pass;           
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
    $mail->Port       = 465;                      
    $mail->setFrom($email,$fname);
    $mail->addAddress('cm.b.49ayush.shukla@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}