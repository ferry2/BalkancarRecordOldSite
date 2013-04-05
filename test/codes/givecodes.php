<?php 
require '../functions.php';

print "Генератор на служебни кодове за достъп до каталозите:<br>";

if (isset($_POST['givecode'])){
	//select text from database
	$query = "SELECT code FROM users";
	  if ((!$result = mysql_query($query))) {
		print "<font class=err>$noconn</font>";
		exit() ;
	  }

	$accessCode = rand(10000, 99999);
	print "Проверка за код $accessCode ...<br>";
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	   if ($row[0] == $accessCode){
			print "<b><font color=red>Кодът $accessCode вече е зает. Моля, опитайте отново.</font></b> <br>";
			exit;
		}
	}


	//проверка за валидност на датата
	$todays_date = date("Y-m-d");
	$today = strtotime($todays_date);
	$expiration_date = strtotime($expDate);
	if ($expiration_date > $today) {
		//insert into db
		mysql_query("INSERT INTO users (Code, Name, Firm, Email, DateRegister, ExpDate) VALUES ($accessCode,'служебен','служебен','".$accessCode."@".$accessCode.".bg', now(), '$expDate' )");
		print "<b><font color=green>Генериран е код за достъп: $accessCode.</font></b>";
	} else {
		print "<b><font color=red>Невалидна дата!</font></b>";
	}
}		
?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co - Генератор на кодове</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form name="form1" method="post" action="givecodes.php" enctype="multipart/form-data">
	<!--<input name="showusers" type="submit" class="btns" value="Списък потребители"><br> -->
    <input name="givecode" type="submit" class="btns" value="Генерирай нов код">
    Валиден до
    <input name="expDate" type="text" id="expDate" value="yyyy-mm-dd">
</form>
<?
/*
if (isset($_POST['showusers'])){
	
	$query = "select * from users order by name";
	if ((!$result = mysql_query($query))) {
		print "<font class=err>$noconn</font>";
		exit();
	}
	$result=fetchResult($query);
	print "<p>Легенда: Статус - &quot;О&quot; - Деактивиран; &quot;P&quot; - чакащ одобрение; &quot;F&quot; - активен</p>";
	print "<table width=100% border=1 cellspacing=0 cellpading=0>";
	print "<tr class=headerfon><td align=center>Код</td><td align=center>Име</td><td align=center>Фирма</td><td align=center>Държава</td><td align=center>Емейл</td><td align=center>Телефон</td><td align=center>Факс</td><td align=center>Статус</td><td align=center  nowrap=nowrap>Регистр. на</td><td align=center nowrap=nowrap>Изтича на</td><td align=center>Подновен</td><td align=center>Редакт.</td></tr>";
		while($row = mysql_fetch_array($result)) {
			$code=$row["Code"];
			$name=$row["Name"];
			$firm=$row["Firm"];
			$country=$row["Country"];
			$email=$row["Email"];
			$phone=$row["Phone"];
			$fax=$row["Fax"];
			$status=$row["Status"];
			$dateRegister = ( (!(int)$row["DateRegister"]) ? ($dateRegister='') : ($dateRegister=date_format(date_create($row["DateRegister"]), 'Y-m-d')));
			$expDate=( (!(int)$row["ExpDate"]) ? ($expDate='') : ($expDate=date_format(date_create($row["ExpDate"]), 'Y-m-d')));
			$renew=$row["Renew"];
			
			print "<tr><td align=center>$code</td><td align=center>$name</td><td align=center>$firm</td><td align=center>$country</td><td align=center>$email</td><td align=center>$phone</td><td align=center>$fax</td><td align=center>$status</td><td align=center  nowrap=nowrap>$dateRegister</td><td align=center nowrap=nowrap>$expDate</td><td align=center>$renew</td><td align=center><a href=\"edit.php?code=$code\" target=blank>Редакция</a></td></tr>";
		}
	print "</table>";
}
*/
?>
</body>
</html>