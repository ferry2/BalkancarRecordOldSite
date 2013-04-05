<? 
require '../functions.php';

//select text from database
$query = "SELECT pos,$lang FROM lang1 where page='register' order by pos";
  if ((!$result = mysql_query($query))) {
    //DisplayErrMsg(sprintf("internal error %d:%s\n",
    //mysql_errno(), mysql_error()));
	print "<font class=err>$noconn</font>";
    exit() ;
  }

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
   $txt[$row[0]] = $row[1];
}

//забравен код за достъп
if (isset($lostcode) and $lostcode != ''){
	$query = "SELECT Code FROM users where Email='$lostcode'";
	  if ((!$result = mysql_query($query))) {
		print "<font class=err>$noconn</font>";
		exit() ;
	  }	
	while ($row = mysql_fetch_array($result)) {
   		$accessCode = $row[0];
	}

		//subject
		$subject = "Balkancar-Record -> Lost code for spare parts";
		
		//message
		switch ($lang){
			case "bg":
				$mail_body = "<html><body>Здравейте!<br><br>Изпращаме Ви отново следния код за достъп до каталозите за резервни части: <b>$accessCode</b><br>Можете да влизате с него от тук: <a href=http://www.balkancar-record.com/bg/register.php?lang=$lang>www.balkancar-record.com/bg/register.php?lang=$lang</a><br><br>Благодарим Ви за проявения интерес.</body></html>";
				break;
			case "en":
				$mail_body = "<html><body>Dear sir/madam!<br><br>We send you again your access code for spare parts catalogues of \"Balkancar-Record\": <b>$accessCode</b><br>You can login from here: <a href=http://www.balkancar-record.com/bg/register.php?lang=$lang>www.balkancar-record.com/bg/register.php?lang=$lang</a><br><br>Thank you for your interest!</body></html>";
				break;
			case "ru":
				$mail_body = "<html><body>Здраствуйте!<br><br>Это ваший код для доступ до каталозы запасных частей: <b>$accessCode</b><br>Вы смогли входить от сюда: <a href=http://www.balkancar-record.com/bg/register.php?lang=$lang>www.balkancar-record.com/bg/register.php?lang=$lang</a><br><br>Благодарим Вам для проявлены интерес.</body></html>";
				break;
		}

		//To send HTML mail, you can set the Content-type header.
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset= utf-8\r\n";
		$headers .= "From: it@balkancar-record.com <it@balkancar-record.com>\r\n";
		
		//and now mail it
		if (!mail($lostcode, $subject, $mail_body, $headers))
			$message = "<font class=err>$txt[34]</font>";
		else
			$message = $message."<font class=success>$txt[35]</font>";
			
		//redirect to the requested page after 20 seconds
		print "<meta http-equiv=\"Refresh\" content=\"20; URL=http://".$_COOKIE["uriback"]."\">";
	
}

//вход за вече регистрирани потребители
if (isset($enter)) {
	
  	if (!($result = mysql_db_query($DB, "select Code, Status, DATEDIFF( ExpDate, now() ) from users where Code='$code'"))) {
		print "<font class=err>$noconn</font>";
	}

	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	   $fetched_code = $row[0];
	   $status = $row[1];
	   $exp = $row[2];
	}
	
	if ($code == $fetched_code && $code != "" && $status == 'F'){
		
		
		//проверка за изтекъл срок на кода за достъп
		if ($exp >= 0) {
			//даване на достъп до каталозите
			session_start();
			$session=session_id();
			session_register("code");
			//delete older than 60 days records
			mysql_query("DELETE FROM history WHERE Time < DATE_SUB(now(), INTERVAL '60 0:0:0' DAY_SECOND)");
			mysql_query("UPDATE users SET Sid='$session' where Code='$code'");
			mysql_query("INSERT INTO history VALUES ( $code, now() )");
			header("Location: http://".$_COOKIE["uriback"]);
			exit();
		} else {
			//деактивиране на кода
			mysql_db_query($DB, "UPDATE Users SET Status='O' where Code='$code'");
			$message = "<font class=err>$txt[73] $txt[71]</font>";
		}

	} elseif ($code == $fetched_code && $code != "" && $status == 'O'){
		$message = "<font class=err>$txt[73] $txt[71]</font>";
	} else {
		$message="<font class=err>$txt[46]</font>";
	}
}

require_once("header.php");

?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {color: #CC0000}
-->
</style>
<link rel="stylesheet" type="text/css" href="../consolidated_common.css" />
<script type="text/javascript" src="../livevalidation_standalone.js"></script>
</head>
<body>
<table width="1025" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center">
  <tr>
    <td width="799"><table width="1025" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="520" border="0" cellpadding="5" cellspacing="5">
          <tr>
                <td height="18" class="headerfon"> <strong><?php echo $txt[0]; ?></strong> 
                </td>
            </tr>
          <tr>
                <td valign="top" class="textfon"> <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="900%" colspan="3" valign="top"><?=$message?></td>
                    </tr>
                    <tr> 
                      <td colspan="3" valign="top"> 
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="specsBorder1">
                          <tr> 
                            <td width="33%" valign="top"><strong><?php echo $txt[1]; ?></strong><br> 
                              <br> <div align="right"><form class="textfon" name="form1" method="post" action="register.php?lang=<?=$lang?>"><strong> <?php echo $txt[2]; ?> 
                                <label> 
                                <input name="code" type="text" id="code">
                                </label>&nbsp;
								<script type="text/javascript">
									var code = new LiveValidation('code');
									code.add( Validate.Presence );
									code.add( Validate.Numericality );
									code.add( Validate.Length, { is: 5 } );
								</script>
                                <br>
                                </strong><strong> <font color="#990000"> 
                                <label> 
                                <input name="enter" type="submit" class="btns" value="<?=$txt[4]; ?>">
                                <br>
                                </label>
                                </font></strong>
								</form></div></td>
                            <td width="1%" valign="top">&nbsp;</td>
                            <td width="1%" valign="top" class="dashedline">&nbsp;</td>
                            <td width="65%"><strong><?=$txt[74]?></strong><br><br>
                              <?=$txt[71];?>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr> 
                      <td colspan="3" valign="top"></td>
                    </tr>
                  </table> 
                  <p>&nbsp;</p></td>
            </tr>
        </table></td>
        <td width="172" valign="top"><?php include("rside.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
<?php require_once("footer.php"); ?>
</html>
