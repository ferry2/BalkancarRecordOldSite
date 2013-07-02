<?
require "../functions.php";
$mode=$_GET["mode"];

$newcode=$_POST['newcode'];
$code=$_POST['code'];
$name=$_POST['name'];
$firm=$_POST['firm'];
$country=$_POST['country'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$fax=$_POST['fax'];
$status=$_POST['active'];
$dateRegister=$_POST['dateRegister'];
$expDate=$_POST['expDate'];
$renew=$_POST['renew'];

if($mode=="add") {
	//проверка за валидност на датата
	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	$expiration_date = strtotime($expDate);
	if ($expiration_date > $today) {
		$sql="insert into users (Code,Name,Firm,Country,Email,Phone,Fax,Status,DateRegister,ExpDate) values('$newcode','$name','$firm','$country','$email','$phone','$fax','$status',now(),'$expDate')";
	} else {
		print "Датата е невалидна! Моля, <input type=submit <a href=# onclick=history.back(); value=\"опитайте пак\"></a>";
		exit;
	}
} elseif($mode=="update") {
	$sql="update users set Code='$newcode',Name='$name',Firm='$firm',Country='$country',Email='$email',Phone='$phone',Fax='$fax',Status='$status',DateRegister='$dateRegister',ExpDate='$expDate',Renew='$renew' where Code='$code'";
}

mysql_db_query($DB, $sql);
header("location: index.php");

?>