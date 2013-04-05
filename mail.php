<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
<style type="text/css">
<!--
.style17 { font-family: Arial, Helvetica, sans-serif;
font-size: 12px;
}
-->
</style>
</head>
<body>
<p>
</p>
<?php
//to be successfull in useing this code you need to create a directory called upload
//on you ftp create a directory upload in wich copy the content of the zip file

//$filleant takes the value of the picture that was jut uploaded with the unique name to the ftp in the www.yourname.com/upload/upload
$fileatt = "upload/".$_POST['id']; // Path to the file
$fileatt_type = "application/octet-stream"; // File Type
//here i made the file that will be sent as attachment to have the name "CV_name_surname.doc" you can make it what format you like,
//i needed the doc format... and i'll modify this code to accept just doc file later...i'm really tired right now :D
$fileatt_name = "CV_".$_POST['nume']."_".$_POST['prenume'].".doc"; // Filename that will be used for the file as the attachment

//$email_from is the variable that gets the value, of the From: field that will appear in your received mail
$email_from = $_POST['nume']." ".$_POST['prenume']; // Who the email is from

//Here you define the subject of you message
$email_subject = "CV."; // The Subject of the email

//here you define the body of the message, the message itself
//you can modify the "post" textfield in sendmail.php to a textarea....
$email_message = $_POST['post']; // Message that the email has in it

//here you enter the e-mail address to wich you want the message to be sent
$email_to = "peter_k@abv.bg"; // Who the email is too

//adds the e-mail address of the sender
$headers = "From: ".$_POST['email'];

$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

$headers .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";

$email_message .= "This is a multi-part message in MIME format.\n\n" .
"--{$mime_boundary}\n" .
"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$email_message . "\n\n";



/********************************************** First File ********************************************/

//$filleant takes the value of the picture that was jut uploaded with the unique name to the ftp in the www.yourname.com/upload/upload
$fileatt = "upload/".$_POST['id']; // Path to the file

$fileatt_type = "application/octet-stream"; // File Type

//here i made the file that will be sent as attachment to have the name "CV_name_surname.doc" you can make it what format you like,
//i needed the doc format... and i'll modify this code to accept just doc file later...i'm really tired right now :D
$fileatt_name = "CV".$_POST['nume']."_".$_POST['prenume'].".doc"; // Filename that will be used for the file as the attachment

$file = fopen($fileatt,'rb');
$data = fread($file,filesize($fileatt));
fclose($file);


$data = chunk_split(base64_encode($data));

$email_message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
//"Content-Disposition: attachment;\n" .
//" filename=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}\n";
unset($data);
unset($file);
unset($fileatt);
unset($fileatt_type);
unset($fileatt_name);

/********************************************** End of File Config ********************************************/

// To add more files just copy the file section again, but make sure they are all one after the other! If they are not it will not work!

$ok = @mail($email_to, $email_subject, $email_message, $headers);
if($ok) {
echo "<font face=verdana size=2>The file was successfully sent!</font>";
} else {
die("Sorry but the email could not be sent. Please go back and try again!");
}
?>
<p>&nbsp;</p>
</body>
</html>
