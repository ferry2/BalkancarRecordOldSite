<? 
require '../functions.php';

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

//забравен код за достъп
if (isset($lostcode) and $lostcode != ''){
	$query = "SELECT Code FROM users where Email='$lostcode'";
	  if ((!$result = mysql_db_query($DB, $query))) {
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
				$mail_body = "<html><body>Здравейте!<br><br>Изпращаме Ви отново следния код за достъп до каталозите за резервни части: <b>$accessCode</b><br>Можете да влизате с него от тук: <a href=http://www.balkancar-record.com/bg/register1.php?lang=$lang>www.balkancar-record.com/bg/register1.php?lang=$lang</a><br><br>Благодарим Ви за проявения интерес.</body></html>";
				break;
			case "en":
				$mail_body = "<html><body>Dear sir/madam!<br><br>We send you again your access code for spare parts catalogues of \"Balkancar-Record\": <b>$accessCode</b><br>You can login from here: <a href=http://www.balkancar-record.com/bg/register1.php?lang=$lang>www.balkancar-record.com/bg/register1.php?lang=$lang</a><br><br>Thank you for your interest!</body></html>";
				break;
			case "ru":
				$mail_body = "<html><body>Здраствуйте!<br><br>Это ваший код для доступ до каталозы запасных частей: <b>$accessCode</b><br>Вы смогли входить от сюда: <a href=http://www.balkancar-record.com/bg/register1.php?lang=$lang>www.balkancar-record.com/bg/register1.php?lang=$lang</a><br><br>Благодарим Вам для проявлены интерес.</body></html>";
				break;
		}

		//To send HTML mail, you can set the Content-type header.
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset= windows-1251\r\n";
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

  	if (!($result = mysql_db_query($DB, "select * from users where Code='$code'"))) {
		print "<font class=err>$noconn</font>";
	}

	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
	   $status = $row[9];
	   $fetched_code = $row[0];
	}
    if ($code == $fetched_code && $code != "" && $status == 'F'){
		session_start();
		$session=session_id();
		session_register("code");
		//delete older than 60 days records
		mysql_query("DELETE FROM history WHERE Time < DATE_SUB(now(), INTERVAL '60 0:0:0' DAY_SECOND)");
		mysql_query("UPDATE users SET Sid='$session' where Code='$code'");
		mysql_query("INSERT INTO history VALUES ( $code, now() )");
		header("Location: http://".$_COOKIE["uriback"]);
		exit();
	} elseif ($code == $fetched_code && $code != "" && $status == 'O'){
		$message = "<font class=err>$txt[71]</font>";
	} else {
		$message="<font class=err>$txt[46]</font>";
	}
}

require_once("header.php");
?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../style.css" rel="stylesheet" type="text/css">
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

//help
function popUp( url ) {
	window.open( url,"",'width=950,status=no,scrollbars=yes, location=no,toolbar=no,resizable=yes');
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
                              <br> <div align="right"><form class="textfon" name="form1" method="post" action="register1.php?lang=<?=$lang?>"><strong> <?php echo $txt[2]; ?> 
                                <label> 
                                <input name="code" type="text" id="code2">
                                </label>
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
                            <td width="65%"> 
                              <?php
					//start registration - step1
					if (!(isset($next)) && !(isset($payment))){
						//if start new registration destroy current session
						//session_destroy();

					if (!(isset($next) && $next == 'step2' && isset($enter))){
						print "<form class=\"textfon\" name=\"theForm\" method=\"post\" action=\"register1.php?lang=$lang\">";
					}
				?>							  
							  
							  <table width="100%"  border="0" cellpadding="2" cellspacing="0">
                                <tr valign="top"> 
                                  <td colspan="2"><strong> 
                                    <?=$txt[5]?>
                                    </strong></td>
                                </tr>
                                <tr> 
                                  <td width="29%"><div align="right"><span class="style1 style2"> 
                                      * </span><?php echo $txt[6]; ?></div></td>
                                  <td><input name="name" type="text" id="name" maxlength="60">                                  </td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><span class="style1 style2">*</span>&nbsp;<?php echo $txt[7]; ?></div></td>
                                  <td><input name="firm" type="text" id="firm" maxlength="60"></td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><span class="style1 style2">*</span>&nbsp;<?php echo $txt[8]; ?></div></td>
                                  <td><select name="country" id="country">
                                      <option value=""></option>
                                      <option value="Albania">Albania</option>
                                      <option value="Algeria">Algeria</option>
                                      <option value="American Samoa">American 
                                      Samoa</option>
                                      <option value="Andorra">Andorra</option>
                                      <option value="Angola">Angola</option>
                                      <option value="Anguilla">Anguilla</option>
                                      <option value="Antigua">Antigua</option>
                                      <option value="Argentina">Argentina</option>
                                      <option value="Armenia">Armenia</option>
                                      <option value="Aruba">Aruba</option>
                                      <option value="Australia">Australia</option>
                                      <option value="Austria">Austria</option>
                                      <option value="Azerbaijan">Azerbaijan</option>
                                      <option value="Bahamas">Bahamas</option>
                                      <option value="Bahrain">Bahrain</option>
                                      <option value="Bangladesh">Bangladesh</option>
                                      <option value="Barbados">Barbados</option>
                                      <option value="Barbuda">Barbuda</option>
                                      <option value="Belgium">Belgium</option>
                                      <option value="Belize">Belize</option>
                                      <option value="Benin">Benin</option>
                                      <option value="Bermuda">Bermuda</option>
                                      <option value="Bhutan">Bhutan</option>
                                      <option value="Bolivia">Bolivia</option>
                                      <option value="Bonaire">Bonaire</option>
                                      <option value="Botswana">Botswana</option>
                                      <option value="Brazil">Brazil</option>
                                      <option value="Virgin islands">British Virgin 
                                      isl.</option>
                                      <option value="Brunei">Brunei</option>
                                      <option value="Bulgaria">Bulgaria</option>
                                      <option value="Burundi">Burundi</option>
                                      <option value="Cambodia">Cambodia</option>
                                      <option value="Cameroon">Cameroon</option>
                                      <option value="Canada">Canada</option>
                                      <option value="Cape Verde">Cape Verde</option>
                                      <option value="Cayman isl">Cayman Islands</option>
                                      <option value="Central African Rep">Central 
                                      African Rep.</option>
                                      <option value="Chad">Chad</option>
                                      <option value="Channel isl">Channel Islands</option>
                                      <option value="Chile">Chile</option>
                                      <option value="China">China</option>
                                      <option value="Colombia">Colombia</option>
                                      <option value="Congo">Congo</option>
                                      <option value="cook isl">Cook Islands</option>
                                      <option value="Costa Rica">Costa Rica</option>
                                      <option value="Croatia">Croatia</option>
                                      <option value="Curacao">Curacao</option>
                                      <option value="Cyprus">Cyprus</option>
                                      <option value="Czech Republic">Czech Republic</option>
                                      <option value="Denmark">Denmark</option>
                                      <option value="Djibouti">Djibouti</option>
                                      <option value="Dominica">Dominica</option>
                                      <option value="Dominican Republic">Dominican 
                                      Republic</option>
                                      <option value="Ecuador">Ecuador</option>
                                      <option value="Egypt">Egypt</option>
                                      <option value="El Salvador">El Salvador</option>
                                      <option value="Equatorial Guinea">Equatorial 
                                      Guinea</option>
                                      <option value="Eritrea">Eritrea</option>
                                      <option value="Estonia">Estonia</option>
                                      <option value="Ethiopia">Ethiopia</option>
                                      <option value="Faeroe isl">Faeroe Islands</option>
                                      <option value="Fiji">Fiji</option>
                                      <option value="Finland">Finland</option>
                                      <option value="France">France</option>
                                      <option value="French Guiana">French Guiana</option>
                                      <option value="French Polynesia">French 
                                      Polynesia</option>
                                      <option value="Gabon">Gabon</option>
                                      <option value="Gambia">Gambia</option>
                                      <option value="Georgia">Georgia</option>
                                      <option value="Gemany">Germany</option>
                                      <option value="Ghana">Ghana</option>
                                      <option value="Gibraltar">Gibraltar</option>
                                      <option value="GB">Great Britain</option>
                                      <option value="Greece">Greece</option>
                                      <option value="Greenland">Greenland</option>
                                      <option value="Grenada">Grenada</option>
                                      <option value="Guadeloupe">Guadeloupe</option>
                                      <option value="Guam">Guam</option>
                                      <option value="Guatemala">Guatemala</option>
                                      <option value="Guinea">Guinea</option>
                                      <option value="Guinea Bissau">Guinea Bissau</option>
                                      <option value="Guyana">Guyana</option>
                                      <option value="Haiti">Haiti</option>
                                      <option value="Honduras">Honduras</option>
                                      <option value="Hong Kong">Hong Kong</option>
                                      <option value="Hungary">Hungary</option>
                                      <option value="Iceland">Iceland</option>
                                      <option value="India">India</option>
                                      <option value="Indonesia">Indonesia</option>
                                      <option value="Irak">Irak</option>
                                      <option value="Iran">Iran</option>
                                      <option value="Ireland">Ireland</option>
                                      <option value="Northern Ireland">Ireland, 
                                      Northern</option>
                                      <option value="Israel">Israel</option>
                                      <option value="Italy">Italy</option>
                                      <option value="Ivory Coast">Ivory Coast</option>
                                      <option value="Jamaica">Jamaica</option>
                                      <option value="Japan">Japan</option>
                                      <option value="Jordan">Jordan</option>
                                      <option value="Kazakhstan">Kazakhstan</option>
                                      <option value="Kenya">Kenya</option>
                                      <option value="Kuwait">Kuwait</option>
                                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                                      <option value="Latvia">Latvia</option>
                                      <option value="Lebanon">Lebanon</option>
                                      <option value="Liberia">Liberia</option>
                                      <option value="Liechtenstein">Liechtenstein</option>
                                      <option value="Lithuania">Lithuania</option>
                                      <option value="Luxembourg">Luxembourg</option>
                                      <option value="Macau">Macau</option>
                                      <option value="Macedonia">Macedonia</option>
                                      <option value="Madagascar">Madagascar</option>
                                      <option value="Malawi">Malawi</option>
                                      <option value="Malaysia">Malaysia</option>
                                      <option value="Maldives">Maldives</option>
                                      <option value="Mali">Mali</option>
                                      <option value="Malta">Malta</option>
                                      <option value="Marshall isl">Marshall Islands</option>
                                      <option value="Martinique">Martinique</option>
                                      <option value="Mauritania">Mauritania</option>
                                      <option value="Mauritius">Mauritius</option>
                                      <option value="Mexico">Mexico</option>
                                      <option value="Micronesia">Micronesia</option>
                                      <option value="Moldova">Moldova</option>
                                      <option value="Monaco">Monaco</option>
                                      <option value="Mongolia">Mongolia</option>
                                      <option value="Montserrat">Montserrat</option>
                                      <option value="Morocco">Morocco</option>
                                      <option value="Mozambique">Mozambique</option>
                                      <option value="Myanmar">Myanmar/Burma</option>
                                      <option value="Namibia">Namibia</option>
                                      <option value="Nepal">Nepal</option>
                                      <option value="Netherlands">Netherlands</option>
                                      <option value="Netherlands Antilles">Netherlands 
                                      Antilles</option>
                                      <option value="New Caledonia">New Caledonia</option>
                                      <option value="New Zealand">New Zealand</option>
                                      <option value="Nicaragua">Nicaragua</option>
                                      <option value="Niger">Niger</option>
                                      <option value="Nigeria">Nigeria</option>
                                      <option value="Norway">Norway</option>
                                      <option value="Oman">Oman</option>
                                      <option value="Palau">Palau</option>
                                      <option value="Panama">Panama</option>
                                      <option value="Papua New Guinea">Papua New 
                                      Guinea</option>
                                      <option value="Paraguay">Paraguay</option>
                                      <option value="Peru">Peru</option>
                                      <option value="Philippines">Philippines</option>
                                      <option value="Poland">Poland</option>
                                      <option value="Portugal">Portugal</option>
                                      <option value="Puerto Rico">Puerto Rico</option>
                                      <option value="Qatar">Qatar</option>
                                      <option value="Reunion">Reunion</option>
                                      <option value="Rwanda">Rwanda</option>
                                      <option value="Saba">Saba</option>
                                      <option value="Saipan">Saipan</option>
                                      <option value="Saudi Arabia">Saudi Arabia</option>
                                      <option value="Scotland">Scotland</option>
                                      <option value="Senegal">Senegal</option>
                                      <option value="Seychelles">Seychelles</option>
                                      <option value="Sierra Leone">Sierra Leone</option>
                                      <option value="Singapore">Singapore</option>
                                      <option value="Slovac Republic">Slovak Republic</option>
                                      <option value="Slovenia">Slovenia</option>
                                      <option value="South Africa">South Africa</option>
                                      <option value="South Korea">South Korea</option>
                                      <option value="Spain">Spain</option>
                                      <option value="Sri Lanka">Sri Lanka</option>
                                      <option value="Sudan">Sudan</option>
                                      <option value="Suriname">Suriname</option>
                                      <option value="Swaziland">Swaziland</option>
                                      <option value="Sweden">Sweden</option>
                                      <option value="Switzerland">Switzerland</option>
                                      <option value="Syria">Syria</option>
                                      <option value="Taiwan">Taiwan</option>
                                      <option value="Tanzania">Tanzania</option>
                                      <option value="Thailand">Thailand</option>
                                      <option value="Togo">Togo</option>
                                      <option value="Trinidad-Tobago">Trinidad-Tobago</option>
                                      <option value="Tunesia">Tunisia</option>
                                      <option value="Turkey">Turkey</option>
                                      <option value="Turkmenistan">Turkmenistan</option>
                                      <option value="United Arab Emirates">United 
                                      Arab Emirates</option>
                                      <option value="U.S. Virgin isl">U.S. Virgin 
                                      Islands</option>
                                      <option value="USA">U.S.A.</option>
                                      <option value="Uganda">Uganda</option>
                                      <option value="United Kingdom">United Kingdom</option>
                                      <option value="Urugay">Uruguay</option>
                                      <option value="Uzbekistan">Uzbekistan</option>
                                      <option value="Vanuatu">Vanuatu</option>
                                      <option value="Vatican City">Vatican City</option>
                                      <option value="Venezuela">Venezuela</option>
                                      <option value="Vietnam">Vietnam</option>
                                      <option value="Wales">Wales</option>
                                      <option value="Yemen">Yemen</option>
                                      <option value="Zaire">Zaire</option>
                                      <option value="Zambia">Zambia</option>
                                      <option value="Zimbabwe">Zimbabwe</option>
                                    </select> </td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><span class="style1 style2">*</span>&nbsp;<?php echo $txt[9]; ?></div></td>
                                  <td><input name="email" type="text" id="email" maxlength="40"></td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><span class="style1 style2">*</span>&nbsp;<?php echo $txt[10]; ?></div></td>
                                  <td><input name="phone" type="text" id="phone" size="15" maxlength="15"></td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><?php echo $txt[11]; ?></div></td>
                                  <td><input name="fax" type="text" id="fax" size="15" maxlength="15"></td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr>
                                  <td><div align="right"><?=$txt[59]?></div></td>
                                  <td><select name="payment_type">
                                      <option value="web_merchant" selected="selected">
                                      <?=$txt[60]?>
                                      </option>
                                      <option value="vnosna_belezka">
                                      <?=$txt[61]?>
                                      </option>
                                    </select> <a href="javascript:popUp('help_payment.php?lang=<?=$lang?>');"><?=$txt[64]?></a> 
                                  </td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><label><font CLASS=wbodytext> 
                                    <input name="feedback" type="checkbox" id="feedback" value="YES">
                                    <?php echo $txt[12]; ?></font></label></td>
                                </tr>
                                <tr> 
                                  <td>&nbsp;</td>
                                  <td><input name="register" type="submit" class="btns" id="register" value="<?=$txt[49]?>" onClick="return Validator(document.theForm); document.theForm.submit();"> 
                                    <input name="reset" type="reset" class="btns" value="<?php echo $txt[14]; ?>"></td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><span class="style1 style2">* </span>-<font CLASS=wbodytext> 
                                    <?php echo $txt[15]; ?></font></td>
                                </tr>
                                <tr> 
                                  <td colspan="2"><font class="title"><sup>1</sup> 
                                    - <?=$txt[48];?></font></td>
                                </tr>
                                <tr> 
                                  <td colspan="2"></td>
                                </tr>
                              </table>
                              <input type="hidden" name="next" value="step2"> 
  							   <?
							   if (!(isset($next) && $next == 'step2' && isset($enter))){
									print "</form>";
							   }

					  } else {//end: start registration - step1
							//ако плащането е успешно - запис в БД и изпращане на кода за достъп
							if (isset($payment) && $payment == $_SESSION['succ']){
								$email=$_SESSION['email'];
								//generates and prints a random number
								$accessCode = rand(9999, 99999);
								
								if ($_SESSION['feedback'] != 'YES')
									$feedback = 'NO';
								else
									$feedback = 'YES';
							
								//register into db
								$session=session_id();
								$query="select * from users where Email='$email'";
								$result=fetchResult($query);
								$status="";
								while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
								   $status = $row[9];
								
								//ако е стар потребител му се сменят кода и данните от регистрацията и се сетва Renew=YES, ако е нов - нов запис
								if ($status == 'O'){
									mysql_query("UPDATE users SET Code=$accessCode, Sid='$session', Name='".$_SESSION['name']."', Firm='".$_SESSION['firm']."', Country='".$_SESSION['country']."', Email='".$_SESSION['email']."', Phone='".$_SESSION['phone']."', Fax='".$_SESSION['fax']."', WantContacts='$feedback', Status='F', DateRegister=now(), Renew = 'YES' WHERE Email='".$_SESSION['email']."'");
								}else{
									mysql_query("INSERT INTO users VALUES ($accessCode,'$session','".$_SESSION['name']."','".$_SESSION['firm']."','".$_SESSION['country']."','".$_SESSION['email']."','".$_SESSION['phone']."','".$_SESSION['fax']."','$feedback','F', now(), 'NEW')");
								}
								
								//subject
								$subject = "Registration spare parts, Balkancar-Rekord";
								
								//message
								switch ($lang){
									case "bg":
										$mail_body = "<html><body>Здравейте!<br><br>Във връзка с регистрацията Ви в сайта на \"Бaлканкар-Рекорд\" Ви изпращаме следния код за достъп до каталозите за резервни части: <b>$accessCode</b><br>Можете да влизате с него от тук: <a href=http://www.balkancar-record.com/bg/register1.php?lang=$lang>www.balkancar-record.com/bg/register1.php?lang=$lang</a><br><br>Благодарим Ви за проявения интерес.</body></html>";
										break;
									case "en":
										$mail_body = "<html><body>Registration success!<br><br>This is your access code for spare parts catalogues of \"Balkancar-Record\": <b>$accessCode</b><br>You can login from here: <a href=http://www.balkancar-record.com/bg/register1.php?lang=$lang>www.balkancar-record.com/bg/register1.php?lang=$lang</a><br><br>Thank you for your interest!</body></html>";
										break;
									case "ru":
										$mail_body = "<html><body>Здраствуйте!<br><br>Это код для доступ каталозы запасных частей: <b>$accessCode</b><br>Вы смогли входить от сюда: <a href=http://www.balkancar-record.com/bg/register1.php?lang=$lang>www.balkancar-record.com/bg/register1.php?lang=$lang</a><br><br>Благодарим Вам для проявлены интерес.</body></html>";
										break;
								}
						
								//To send HTML mail, you can set the Content-type header.
								$headers  = "MIME-Version: 1.0\r\n";
								$headers .= "Content-type: text/html; charset= windows-1251\r\n";
								$headers .= "From: it@balkancar-record.com <it@balkancar-record.com>\r\n";
								
								//and now mail it
								if (!mail($_SESSION['email'], $subject, $mail_body, $headers))
									print "<font class=err>$txt[34]</font>";
								else
									print "<font class=success>$txt[50]</font>";
									
								//login new user
								session_start();
								$session=session_id();
								//session_register("accessCode");
								$_SESSION["code"]=$accessCode;
								//delete older than 60 days records 
								mysql_query("DELETE FROM history WHERE Time < DATE_SUB(now(), INTERVAL '60 0:0:0' DAY_SECOND)");
								mysql_query("UPDATE users SET Sid='$session' where Code='$accessCode'");
								mysql_query("INSERT INTO history VALUES ( $accessCode, now() )");
								
								//redirect to the requested page after 20 seconds
								print "<meta http-equiv=\"Refresh\" content=\"20; URL=http://".$_COOKIE["uriback"]."\">";
								
							} elseif(isset($payment) && $payment == 'false'){ //ако плащането не е успешно - само съобщение
								print "<font class=err>$txt[51]</font>";
							}					  	
					  }

					//registration - step2
					if (isset($next) && $next == 'step2'){
							//set form action
							$form_action = "";
							switch ($lang){
								case "bg":
									$form_action = "https://www.epay.bg/";
									break;
								case "en":
									$form_action = "https://www.epay.bg/en/";
									break;
								case "ru":
									$form_action = "https://www.epay.bg/en/";
									break;
							}
							
							$check_email = cleanup_text($email);
							
							//check if user already exist and if he is old user - new registration allowed
							$query = "SELECT Email,Status FROM users where Email='$check_email'";
							if ((!$result = mysql_db_query($DB, $query))) {
								print "<font class=err>$noconn</font>";
								exit() ;
							}
							while ($row = mysql_fetch_array($result)) {
							   $fetched_mail = $row[0];
							   $status = $row[1];
							}

							if ($check_email == $fetched_mail && $status == 'F'){
								//ако е full - съобщение за загубен код
								print $txt[52]."<strong>".$email."</strong>".$txt[68]." <a href=http://$HTTP_HOST/register1.php?lang=$lang>".$txt[69]." <a href=http://$HTTP_HOST/register1.php?lang=$lang&lostcode=$email>".$txt[70];
							} elseif ($check_email == $fetched_mail && $status == 'P') {
								//ако е pending - съобщение за изчакване
								print $txt[52]."<strong>".$email."</strong>".$txt[72]."<a href=mailto:it@balkancar-record.com>it@balkancar-record.com</a>";
							} else {
								//нов потребител 
								//запазване на данните от формата в сесийни променливи
								$_SESSION['email'] = cleanup_text($email);
								$_SESSION['name'] = cleanup_text($name);
								$_SESSION['firm'] = cleanup_text($firm);
								$_SESSION['country'] = cleanup_text($country);
								$_SESSION['phone'] = cleanup_text($phone);
								$_SESSION['fax'] = cleanup_text($fax);
								$_SESSION['feedback'] = cleanup_text($feedback);
								$_SESSION['succ'] = rand(9999, 99999999);
								$succ = $_SESSION['succ'];
								
								//prints confirmed word - just for testing
								//print $succ;
								
								function hmac($algo,$data,$passwd){
										/* md5 and sha1 only */
										$algo=strtolower($algo);
										$p=array('md5'=>'H32','sha1'=>'H40');
										if(strlen($passwd)>64) $passwd=pack($p[$algo],$algo($passwd));
										if(strlen($passwd)<64) $passwd=str_pad($passwd,64,chr(0));
								
										$ipad=substr($passwd,0,64) ^ str_repeat(chr(0x36),64);
										$opad=substr($passwd,0,64) ^ str_repeat(chr(0x5C),64);
								
										return($algo($opad.pack($p[$algo],$algo($ipad.$data))));
								}
								
								# XXX ePay.bg URL (https://devep2.datamax.bg/ep2/epay2_demo/ if POST to DEMO system)
								//$submit_url = 'https://devep2.datamax.bg/ep2/epay2_demo/';
								# XXX Secret word with which merchant make CHECKSUM on the ENCODED packet
								$secret     = 'C9O65QCBUAM1I5AQG5JGNUZ4OM3LVIGF9WE2X3OTHFIHRZN85REA0I55RJNX6XBM';
								
								//$min        = 'D773812904';
								//$invoice    = sprintf("%.0f", rand(10) * 100000); # XXX Invoice
								//$invoice    = '1000000002';
								//$sum        = '99.99';                            # XXX Ammount
								//$exp_date   = '01.08.2020';                       # XXX Expiration date
								//$descr      = 'Плащане за достъп до каталози';                             # XXX Description
								
$data = <<<DATA
MIN={$min}
INVOICE={$invoice}
AMOUNT={$sum}
EXP_TIME={$exp_date}
DESCR={$descr}
DATA;
								
								# XXX Packet:
								#     (MIN or EMAIL)=     REQUIRED
								#     INVOICE=            REQUIRED
								#     AMOUNT=             REQUIRED
								#     EXP_TIME=           REQUIRED
								#     DESCR=              OPTIONAL
								
								$ENCODED  = base64_encode($data);
								//$CHECKSUM = hmac('sha1', $ENCODED, $secret); # XXX SHA-1 algorithm REQUIRED
								
								if ($payment_type == 'web_merchant'){
echo <<<HTML

<style>

A.epay-button             { border: solid  1px #FFF; background-color: #168; padding: 6px; color: #FFF; background-image: none; font-weight: normal; padding-left: 20px; padding-right: 20px; }
A.epay-button:hover       { border: solid  1px #ABC; background-color: #179; padding: 6px; color: #FFF; background-image: none; font-weight: normal; padding-left: 20px; padding-right: 20px; }

A.epay                    { text-decoration: none; border-bottom: dotted 1px #168; color: #168; font-weight: bold; }
A.epay:hover              { text-decoration: none; border-bottom: solid  1px #179; color: #179; font-weight: bold; }

TABLE.epay-view    { white-space: nowrap; background-color: #CCC; }

/********** VIEWES **********************************************************/

TD.epay-view            { width: 100%; text-align: center; background-color: #DDD; }
TD.epay-view-header     {                                  background-color: #168; color: #FFF; height: 30px; }
TD.epay-view-name       { width:  25%; text-align: right;  background-color: #E9E9F9; border-bottom: none;  height: 30px; }
TD.epay-view-value      { width:  75%; text-align: left;   background-color: #E9E9F9; border-bottom: none; white-space: normal; }

INPUT.epay-button         { border: solid  1px #FFF; background-color: #168; padding: 4px; color: #FFF; background-image: none; padding-left: 20px; padding-right: 20px; }
INPUT.epay-button:hover   { border: solid  1px #ABC; background-color: #179; padding: 4px; color: #FFF; background-image: none; padding-left: 20px; padding-right: 20px; }

</style>
<br><br><br>
<form class="textfon" action="$form_action" method=post>
<table class=epay-view cellspacing=1 cellpadding=4 width=350>
<tr>
<td class=epay-view-header align=center>$txt[53]</td>
<td class=epay-view-header align=center>$txt[54]</td>
</tr>
<tr>
<td class=epay-view-value><b>$txt[55]</b></td>
<td class=epay-view-name>40 BGN</td>
</tr>
<tr>
<td colspan=2 class=epay-view-name>
<input class=epay-button type=submit name=BUTTON:PAY value="   $txt[56]   "><br>
<a href=http://$HTTP_HOST/register1.php?lang=$lang><strong>$txt[57]</strong></a>
</td>
</tr>
<tr>
<td colspan=2 class=epay-view-name style="white-space: normal; font-size: 10">
$txt[58]
</td>
</tr>
</table>
<input type=hidden name=PAGE value="paylogin">
<input type=hidden name=MIN value="2255409368">
<input type=hidden name=INVOICE value="">
<input type=hidden name=TOTAL value="40">
<input type=hidden name=DESCR value="$txt[55]">
<input type=hidden name=URL_OK value="http://$HTTP_HOST/register1.php?lang=bg&payment=$succ">
<input type=hidden name=URL_CANCEL value="http://$HTTP_HOST/register1.php?lang=bg&payment=false">
</form>
HTML;
								} elseif ($payment_type == 'vnosna_belezka') {
								
									//create pending registration, with no access code by email
	
									//generates and prints a random number
									$accessCode = rand(9999, 99999);
									
									if ($_SESSION['feedback'] != 'YES')
										$feedback = 'NO';
									else
										$feedback = 'YES';
								
									//register into db
									$session=session_id();
									$query="select * from users where Email='$email'";
									$result=fetchResult($query);
									$status="";
									while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
									   $status = $row[9];
									
									//ако е стар потребител му се сменят кода и данните от регистрацията и се сетва Renew=YES, ако е нов - нов запис
									if ($status == 'O'){
										mysql_query("UPDATE users SET Code=$accessCode, Sid='$session', Name='".$_SESSION['name']."', Firm='".$_SESSION['firm']."', Country='".$_SESSION['country']."', Email='".$_SESSION['email']."', Phone='".$_SESSION['phone']."', Fax='".$_SESSION['fax']."', WantContacts='$feedback', Status='P', DateRegister=now(), Renew = 'YES' WHERE Email='".$_SESSION['email']."'");
									}else{
									mysql_query("INSERT INTO users VALUES ($accessCode,'$session','".$_SESSION['name']."','".$_SESSION['firm']."','".$_SESSION['country']."','".$_SESSION['email']."','".$_SESSION['phone']."','".$_SESSION['fax']."','$feedback','P', now(), 'NEW' )");
									}

echo <<<HTML
<font class=success>$txt[65]</font>
<br><br><br>
$txt[66]
<br><br>
$txt[67]<br>
<br>
HTML;
								
								}//end if payment type

							}//end -> ако има вече такъв потребител
							
					}//end -> step2
					?>
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
