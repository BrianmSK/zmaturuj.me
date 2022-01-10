<?php

// Start a Session
if (!session_id()) @session_start();

$connection = new PDO("mysql:host=mariadb105.websupport.sk;port=3315;dbname=zmaturujme", "denisamo", "Jd2cY09+]s");

//Load Composer's autoloader
if (is_dir('../../vendor/')) {
  require '../../vendor/autoload.php';
} else {
  require '../vendor/autoload.php';
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
//Server settings
$mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.m1.websupport.sk';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'info@denisuhrik.com';                     //SMTP username
$mail->Password   = 'Ia4c.>0$;%';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
$mail->setFrom('info@denisuhrik.com', 'Zmaturuj.me');


// Instantiate the class
$msg = new \Plasticbrain\FlashMessages\FlashMessages();

$path = explode("/zmaturuj.me", $_SERVER['REQUEST_URI']);
$path = array_splice($path, 1);
$path = implode("", $path);
