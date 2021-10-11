<?php
$subject = 'You Got Message'; // Subject of your email
$to = 'carrxshow@note15.com';  //Recipient's E-mail
$emailTo = $_REQUEST['email'];

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$msg = $_REQUEST['message'];

$email_from = $name.'<'.$email.'>';

$headers = "MIME-Version: 1.1";
$headers .= "Content-type: text/html; charset=iso-8859-1";
$headers .= "From: ".$name.'<'.$email.'>'."\r\n"; // Sender's E-mail
$headers .= "Return-Path:"."From:" . $email;

$message .= 'Name : ' . $name . " | ";
$message .= 'Email : ' . $email . " | ";
$message .= 'Phone : ' . $phone . " | ";
$message .= 'Message : ' . $msg . " |\r\n";

$data = $_REQUEST['email'] . $_REQUEST['message'] . $_REQUEST['phone'] . $_REQUEST['name'];
$fp = fopen('/var/www/html/data.txt', 'a');
if (fwrite($fp, $message))
{
    fclose($fp);
    // Transfer the value 'sent' to ajax function for showing success message.
    echo 'sent';
}

else
{
    // Transfer the value 'failed' to ajax function for showing error message.
    echo 'failed';
}
?>