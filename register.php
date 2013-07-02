<? 
require '../functions.php';
require_once("bg/header.php");

//select text from database
$query = "SELECT pos,$lang FROM lang1 where page='register' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    //DisplayErrMsg(sprintf("internal error %d:%s\n",
    //mysql_errno(), mysql_error()));
	print "<font class=err>$noconn</font>";
    exit() ;
  }

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
   $txt[$row[0]] = $row[1];
}

//вход за вече регистрирани потребители
if (isset($enter)) {
	
	if (AuthenticateUser($code)) {
		session_start();
		$session=session_id();
		session_register("code");
		//delete older than 60 days records 
		mysql_query("DELETE FROM history WHERE Time < DATE_SUB(now(), INTERVAL '60 0:0:0' DAY_SECOND)");
		mysql_query("UPDATE users SET Sid='$session' where Code='$code'");
		mysql_query("INSERT INTO history VALUES ( $code, now() )");
		if ($model == "elcars"){
			/*
			if ($index == 1){
				header("Location: http://www.balkancar-record.com/ER/Introduction.htm");	
			}else{
				header("Location: http://www.balkancar-record.com/ER-2t/Introduction.htm");
			}
			*/
			header("Location: http://$HTTP_HOST/elcars.php?lang=$lang&index=$index");
		} else {
			/*
			if ($model="1S" && $index == 1){
				header("Location: http://www.balkancar-record.com/s1/RECORD%20%201S.htm");
			} else if ($model="1S" && $index == 2){
				header("Location: http://www.balkancar-record.com/s1-vw/Tupe%20lift%20trucks.htm");
			} else if ($model="2S" && $index == 1){
				header("Location: http://www.balkancar-record.com/s2/s2.htm");
			} else if ($model="2S" && $index == 2){
				header("Location: http://www.balkancar-record.com/s2-5t/Introduction.htm");
			}
			*/
			header("Location: http://$HTTP_HOST/forklifts.php?lang=$lang&model=$model&index=$index");
		}
		exit();
	}
	else {
		$message="<font class=err>$txt[46]</font>";
	}
}

//ако плащането е успешно - запис в БД
if (isset($payment) && $payment == 'succ'){

	$email=$_SESSION['email'];
	$query="select * from users where Email='$email'";
	$result=fetchResult($query);
	if ($row = mysql_fetch_array($result)){
		$message = "<font class=err>$txt[47]</font>";
	}else{
		//generates and prints a random number
		$accessCode = rand(9999, 99999);
		
		if ($_SESSION['feedback'] != 'YES')
			$feedback = 'NO';
		else
			$feedback = 'YES';
	
			
		//insert into db
		$session=session_id();
		mysql_query("INSERT INTO users VALUES ($accessCode,'$session','".$_SESSION['name']."','".$_SESSION['firm']."','".$_SESSION['country']."','$email','".$_SESSION['phone']."','".$_SESSION['fax']."','$feedback')");
		
		//subject
		$subject = "Registration spare parts, Balkancar-Rekord";
		
		//message
		switch ($lang){
			case "bg":
				$mail_body = "<html><body>Здравейте!<br><br>Във връзка с регистрацията Ви в сайта на \"Бaлканкар-Рекорд\" Ви изпращаме следния код за достъп до каталозите за резервни части: <b>$accessCode</b><br>Можете да влизате с него от тук: <a href=http://www.balkancar-record.com/bg/register.php?lang=$lang>www.balkancar-record.com/bg/register.php?lang=$lang</a><br><br>Благодарим Ви за проявения интерес.</body></html>";
				break;
			case "en":
				$mail_body = "<html><body>Registration success!<br><br>This is your access code for spare parts catalogues of \"Balkancar-Record\": <b>$accessCode</b><br>You can login from here: <a href=http://www.balkancar-record.com/bg/register.php?lang=$lang>www.balkancar-record.com/bg/register.php?lang=$lang</a><br><br>Thank you for your interest!</body></html>";
				break;
			case "ru":
				$mail_body = "<html><body>Здраствуйте!<br><br>Этот код е для доступ до каталозы запасных частей: <b>$accessCode</b><br>Вы смогли входить от сюда: <a href=http://www.balkancar-record.com/bg/register.php?lang=$lang>www.balkancar-record.com/bg/register.php?lang=$lang</a><br><br>Благодарим Вам для проявлены интерес.</body></html>";
				break;
		}

		//To send HTML mail, you can set the Content-type header.
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset= windows-1251\r\n";
		$headers .= "From: it@balkancar-record.com <it@balkancar-record.com>\r\n";
		
		//and now mail it
		if (!mail($email, $subject, $mail_body, $headers))
			$message = "<font class=err>$txt[34]</font>";
		else
			$message = $message."<font class=success>$txt[35]</font>";
			
		//login new user
		session_start();
		$session=session_id();
		//session_register("accessCode");
		$_SESSION["code"]=$accessCode;
		//delete older than 60 days records 
		mysql_query("DELETE FROM history WHERE Time < DATE_SUB(now(), INTERVAL '60 0:0:0' DAY_SECOND)");
		mysql_query("UPDATE users SET Sid='$session' where Code='$accessCode'");
		mysql_query("INSERT INTO history VALUES ( $accessCode, now() )");
	}
	
}

switch ($lang){
	case 'bg':
		$message = 'Уважаеми клиенти, поради реорганизация на сайта, временно е спрян достъпа до каталозите за резервни части. Молим да ни извините за неудобството!';
		break;

	case 'en':
		$message = 'Dear customers, because of reorganization, catalogues for spare parts are temporary unavailable! Please, excuse us for the inconvenience!';
	break;

	case 'ru':
		$message = 'Дорогие клиенты, поради реорганизации сайта временно е преустановлен доступ для каталозых запасных частей. Молим для извинении!';
	break;
}
?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="style.css" rel="stylesheet" type="text/css">
<SCRIPT type=text/javascript>
<!--
function popUp( url ) {
	window.open( url,"",'width=420,height=420,status=no,scrollbars=no, location=no,toolbar=no,resizable=no');
}

function Validator(theForm)
{
	function emailCheck (emailStr){
		/* The following pattern is used to check if the entered e-mail address
		   fits the user@domain format.  It also is used to separate the username
		   from the domain. */
		var emailPat=/^(.+)@(.+)$/
		/* The following string represents the pattern for matching all special
		   characters.  We don't want to allow special characters in the address. 
		   These characters include ( ) < > @ , ; : \ " . [ ]    */
		var specialChars="\\(\\)<>@,;:\\\\\\\"\\.'\\[\\]"
		/* The following string represents the range of characters allowed in a 
		   username or domainname.  It really states which chars aren't allowed. */
		var validChars="\[^\\s" + specialChars + "\]"
		/* The following pattern applies if the "user" is a quoted string (in
		   which case, there are no rules about which characters are allowed
		   and which aren't; anything goes).  E.g. "jiminy cricket"@disney.com
		   is a legal e-mail address. */
		var quotedUser="(\"[^\"]*\")"
		/* The following pattern applies for domains that are IP addresses,
		   rather than symbolic names.  E.g. joe@[123.124.233.4] is a legal
		   e-mail address. NOTE: The square brackets are required. */
		var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/
		/* The following string represents an atom (basically a series of
		   non-special characters.) */
		var atom=validChars + '+'
		/* The following string represents one word in the typical username.
		   For example, in john.doe@somewhere.com, john and doe are words.
		   Basically, a word is either an atom or quoted string. */
		var word="(" + atom + "|" + quotedUser + ")"
		// The following pattern describes the structure of the user
		var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
		/* The following pattern describes the structure of a normal symbolic
		   domain, as opposed to ipDomainPat, shown above. */
		var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
		
		
		/* Finally, let's start trying to figure out if the supplied address is
		   valid. */
		
		/* Begin with the coarse pattern to simply break up user@domain into
		   different pieces that are easy to analyze. */
		var matchArray=emailStr.match(emailPat)
		if (matchArray==null) {
		  /* Too many/few @'s or something; basically, this address doesn't
			 even fit the general mould of a valid e-mail address. */
			alert("<? echo $txt[21]; ?>");
			return (false);
		}
		var user=matchArray[1]
		var domain=matchArray[2]
		
		// See if "user" is valid 
		if (user.match(userPat)==null) {
			// user is not valid
			alert("<? echo $txt[22]; ?>");
			return (false);
		}
	
		/* if the e-mail address is at an IP address (as opposed to a symbolic
		   host name) make sure the IP address is valid. */
		var IPArray=domain.match(ipDomainPat)
		if (IPArray!=null) {
			// this is an IP address
			  for (var i=1;i<=4;i++) {
				if (IPArray[i]>255) {
					alert("<? echo $txt[23]; ?>");
				return (false);
				}
			}
		return (true);
		}
	
		// Domain is symbolic name
		var domainArray=domain.match(domainPat)
		if (domainArray==null) {
			alert("<? echo $txt[24]; ?>");
			return (false);
		}
		
		/* domain name seems valid, but now make sure that it ends in a
		   three-letter word (like com, edu, gov) or a two-letter word,
		   representing country (uk, nl), and that there's a hostname preceding 
		   the domain or country. */
		
		/* Now we need to break up the domain to get a count of how many atoms
		   it consists of. */
		var atomPat=new RegExp(atom,"g")
		var domArr=domain.match(atomPat)
		var len=domArr.length
		if (domArr[domArr.length-1].length<2 || 
			domArr[domArr.length-1].length>3) {
		   // the address must end in a two letter or three letter word.
		   alert("<? echo $txt[25]; ?>");
		   return (false);
		}
		
		// Make sure there's a host name preceding the domain.
		if (len<2) {
		   var errStr="<? echo $txt[26]; ?>";
		   alert(errStr);
		   return (false);
		}
		
	// If we've gotten this far, everything's valid!
	return (true);
	}

	//check for white text in forms
	function isEmpty(aTextField){
    var re = /\s/g; //Match any white space including space, tab, form-feed, etc.
    RegExp.multiline = true; // IE support
    var str = aTextField.replace(re, "");
    if (str.length == 0) {
    	 return true;
  	} else {
			return false;
	}
  }

	if (isEmpty(theForm.name.value)){
		alert("<? echo $txt[27]; ?>");
		theForm.name.focus();
		return (false);
	}

	if (isEmpty(theForm.firm.value)){
		alert("<? echo $txt[45]; ?>");
		theForm.firm.focus();
		return (false);
	}
	
	if (isEmpty(theForm.country.value)){
		alert("<? echo $txt[41]; ?>");
		theForm.country.focus();
		return (false);
	}

	if (isEmpty(theForm.email.value)){
		alert("<? echo $txt[28]; ?>");
		theForm.email.focus();
		return (false);
	}
	
	if (!emailCheck(theForm.email.value)){
		theForm.email.focus();
		return (false);
	}	
	
	if (isEmpty(theForm.phone.value)){
		alert("<? echo $txt[36]; ?>");
		theForm.phone.focus();
		return (false);
	}

}

function getObj(name)
{
  if (document.getElementById)
  {
  	this.obj = document.getElementById(name);
	this.style = document.getElementById(name).style;
  }
  else if (document.all)
  {
	this.obj = document.all[name];
	this.style = document.all[name].style;
  }
  else if (document.layers)
  {
   	this.obj = document.layers[name];
   	this.style = document.layers[name];
  }
}

//-->
</SCRIPT>
<style type="text/css">
<!--
.style2 {color: #CC0000}
-->
</style>
</head>
<body>
<table width="1025" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="799"><table width="1025" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="520" border="0" cellpadding="5" cellspacing="5">
          <tr>
                <td height="18" class="headerfon"> <strong><?php echo $txt[0]; ?></strong> 
                </td>
            </tr>
          <tr>
                <td valign="top" class="textfon"> <font class="err">
                  <?=$message?>
                  </font> 
                  <p>&nbsp;</p></td>
            </tr>
          
          
        </table></td>
        <td width="172" valign="top"><?php include("bg/rside.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
<?php require_once("bg/footer.php"); ?>
</html>
