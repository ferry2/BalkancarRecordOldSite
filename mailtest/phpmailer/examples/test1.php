<?php

include_once('../class.phpmailer.php');

$mail    = new PHPMailer();

//$body    = $mail->getFile('contents.html');
$body = "blabla";

$body    = eregi_replace("[\]",'',$body);

$mail->From     = "pet7608@yahoo.com";
$mail->FromName = "First Last";

$mail->Subject = "PHPMailer Test Subject";

//$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$mail->AddAddress("peter_k@abv.bg", "John Doe");

if(!$mail->Send()) {
  echo 'Failed to send mail';
} else {
  echo 'Mail sent';
}


?>
