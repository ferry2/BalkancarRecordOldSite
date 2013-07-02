<?php

$ftp_server='plovdiv.techno-link.com';//serverip
$conn_id = ftp_connect($ftp_server);


// login with username and password
$user="balkancar-record.com";
$passwd="petar";
$login_result = ftp_login($conn_id, $user, $passwd);

// check connection
if ((!$conn_id) || (!$login_result)) {
echo "FTP connection has failed!";
echo "Attempted to connect to $ftp_server for user $ftp_user_name";
die;
} else {
echo "<br>Connected to $ftp_server, for user $user<br>";
}
//directorylike /www.yourname.com/upload/upload
ftp_chdir($conn_id, "public_html/upload/upload/");

//here we create the unique name for the uploaded file so that it wont overwrite an existing file
$uniqueID = uniqid("");
$destination_file= $uniqueID.".doc";

echo ("<br>");
print $destination_file;
echo ("<br>");

// upload the file
$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);

// check upload status
if (!$upload) {
echo "FTP upload has failed!";
} else {
echo "Uploaded $source_file to $ftp_server as $destination_file";
}

// close the FTP stream
ftp_close($conn_id);
?>
<html>
<head>
<title></title>
</head>
<Body>
<form name="form1" method="post" action="mail.php">
<p>
<input name="id" type="text" id="id" value="<?php echo $destination_file; ?>">
</p>
<table width="75%" border="1">
<tr>
<td><div align="right">Name:</div></td>
<td><input name="nume" type="text" id="nume"></td>
</tr>
<tr>
<td><div align="right">Surnume:</div></td>
<td><input name="prenume" type="text" id="prenume"></td>
</tr>
<tr>
<td><div align="right">E- mail: </div></td>
<td><input name="email" type="text" id="email"></td>
</tr>
<tr>
<td><div align="right">Aplication for : </div></td>
<td><input name="post" type="text" id="post"></td>
</tr>
</table>
<p>
<input type="submit" name="Submit" value="Next &gt;&gt;&gt;">
</p>
</form>
</Body>
</html>