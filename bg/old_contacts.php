<?php
require '../functions.php';

//select text from database
$query = "SELECT $lang FROM lang where page='contacts' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    DisplayErrMsg(sprintf("internal error %d:%s\n",
    mysql_errno(), mysql_error()));
    exit() ;
  }

//get all texts from database and put it in array txt
for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}
?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
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

	if (isEmpty(theForm.dealer.value)){
		alert("<? echo $txt[38]; ?>");
	    theForm.dealer.focus();
		return (false);	
	}

	if (isEmpty(theForm.name.value)){
		alert("<? echo $txt[27]; ?>");
		theForm.name.focus();
		return (false);
	}

	if (isEmpty(theForm.firm.value)){
		alert("<? echo $txt[36]; ?>");
		theForm.firm.focus();
		return (false);
	}
	
	if (isEmpty(theForm.country.value)){
		alert("<? echo $txt[37]; ?>");
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
	
	if (isEmpty(theForm.comments.value)){
		alert("<? echo $txt[29]; ?>");
		theForm.comments.focus();
		return (false);
	}
	
	if (isEmpty(theForm.phone.value)){
		alert("<? echo $txt[36]; ?>");
		theForm.comments.focus();
		return (false);
	}

	if (theForm.comments.value.length > 2500){
		alert("<? echo $txt[30]; ?>");
	    theForm.comments.focus();
		return (false);	
	}

	if (isEmpty(theForm.country.value)){
		alert("<? echo $txt[41]; ?>");
	    theForm.country.focus();
		return (false);	
	}
}
//-->
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style1 {color: #CC0000}

body {
	background-image: url(../images/bg.gif);
}
-->
</style>
</head>
<? require_once("header.php"); ?>
<?php
if ($submit){
	
	/*
	if($userfile != ""){
		$filestatus = false;
		if($userfile_type == "application/vnd.ms-excel" || $userfile_type == "application/msword"){
			if($userfile_type == "application/vnd.ms-excel"){
				$ext = "xls";
			} else {
				$ext = "doc";
			}
			if(copy($userfile, "upload/$email.$ext")){
				$message = "<font class=success>$txt[31]</font> ";
				$filestatus = true;
			} else {
				$message = "<font class=error>$txt[32]</font> ";
			}
			unlink($userfile);
		} else {
			$message = "<font class=err>$txt[33]</font>";
			$filestatus = false;
		}
	}
	*/

	// if ($userfile == "" || ($userfile != "" && $filestatus == true)){
		$name = cleanup_text($name);
		$firm = cleanup_text($firm);
		$country = cleanup_text($country);
		$email = cleanup_text($email);
		$phone = cleanup_text($phone);
		$comments = cleanup_text($comments);
		$feedback = cleanup_text($feedback);
	
	if ($feedback != 'YES')
		$feedback = 'NO';

		
		/* recipients */
    //$to  = "pet7608@yahoo.com";
	$to  = "record@balkancar-record.com";

	if ($dealer != "main")
		$to .= ",$dealer"; 

    /* subject */
    $subject = "WebAdmin_$lang";
    
    /* message */
    $mail_body = "<body><b>Фирма: $firm</b><br>Лице за контакти: $name<br>Телефон: $phone<br>Държава: $country<br>Обратна връзка: $feedback<br><br>$comments<br><br><hr><br><font color=red>Този емаил е автоматично генериран от <b>$lang</b> версия на сайта!</font>";
    $mail_body .= "</body></html>";
    
    /* To send HTML mail, you can set the Content-type header. */
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset= windows-1251\r\n";
	//$headers .= "To: Balkancar-Record <$to>\r\n";
  	$headers .= "From: $email <$email>\r\n";
    
    /* and now mail it */
    if (!mail($to, $subject, $mail_body, $headers))
			$message = "<font class=err>$txt[34]</font>";
		else
			$message = $message."<font class=success>$txt[35]</font>";

	//}
}
?>
<body topmargin="0">
<table width="750" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="blackBorder">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font class="nav"><?php echo $txt[0]; ?> </font>&nbsp;<img src="../images/gpoint.gif" width="6" height="5"></td>
      </tr>
    </table>
      <table width="748" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="605" valign="top">
            <table width="560" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><?php echo $message;?></td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td width="36%" valign="top">
								<table width="183" border="0" cellspacing="0" cellpadding="0" align="center">
                  <tr>
                    <td width="185" height="10"><strong><font class="dots">::.</font><?php echo $txt[1]; ?></strong></td>
                  </tr>
                  <tr bgcolor="#ECF5FF">
                    <td bgcolor="#ECF5FF" class="specsBorder1"><?php echo $txt[2]; ?></td>
                  </tr>
                  <tr>
                    <td align="right"><a href="javascript:popUp('map.html');" style="font-size: 14px; font-weight: bold"><?php echo $txt[3]; ?></a></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><strong><font class="dots">::.</font> <?php echo $txt[4]; ?></strong></td>
                        </tr>
                        <tr>
                          <td class="specsBorder1"><table width="100%"  border="0" cellpadding="0" cellspacing="2" bgcolor="#ECF5FF">
                              <tr>
                                <td><?php echo $txt[5]; ?></td>
                                <td>032/ 695 050</td>
                              </tr>
                              <tr>
                                <td><?php echo $txt[6]; ?>&nbsp;</td>
                                <td>032/ 692 753</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td>032/ 696 090</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td colspan="2"><strong><?php echo $txt[7]; ?></strong></td>
                              </tr>
                              <tr>
                                <td><?php echo $txt[13]; ?></td>
                                <td>032/ 696 090</td>
                              </tr>
                              <tr>
                                <td><?php echo $txt[5]; ?></td>
                                <td>032/ 699 310</td>
                              </tr>
                              <tr>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <td colspan="2"><strong><?php echo $txt[8]; ?></strong></td>
                              </tr>
                              <tr>
                                <td><?php echo $txt[5]; ?></td>
                                <td>032/ 692 761</td>
                              </tr>
                              <tr>
                                <td colspan="2"></td>
                              </tr>
                              <tr>
                                <td><strong><?php echo $txt[18]; ?></strong></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td><?php echo $txt[5]; ?></td>
                                <td>032/ 697 005</td>
                              </tr>
                          </table></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                </table>
                </td>
                <td width="3%" valign="top">&nbsp;</td>
                <td width="61%" valign="top"><strong><font class="dots">::.</font> <?php echo $txt[9]; ?></strong> <br>
                  <br>
              <form name="theForm" onsubmit="return Validator(this)" method="post" action="contacts.php?lang=<?php echo $lang;?>" enctype="multipart/form-data">
                    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
                      <tr> 
                        <td><div align="right"><span class="style1">* </span><?php echo $txt[37]; ?></div></td>
                        <td> <select name="dealer" id="dealer">
                            <option value="" selected>&nbsp;</option>
                            <option value="main" ><?php echo $txt[39]; ?></option>
                            <option value="">&nbsp;</option>
							 <option value="" class="DropDownCat">&nbsp;&nbsp;&nbsp;:::<?php echo $txt[40]; ?>:::</option>
                            <?
							  $query = "select * from dealers order by $lang";
								$result=fetchResult($query);
								while($row = mysql_fetch_array($result)) {
									print "<option value=".$row["Email"].">".$row["$lang"]."</option>";
								}
							  ?>
                          </select> </td>
                      </tr>
                      <tr> 
                        <td width="29%"><div align="right"><span class="style1"> 
                            * </span><?php echo $txt[10]; ?></div></td>
                        <td><input name="name" type="text" id="name" maxlength="60"> 
                        </td>
                      </tr>
                      <tr> 
                        <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="5"></td>
                      </tr>
                      <tr> 
                        <td><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[11]; ?></div></td>
                        <td><input name="firm" type="text" id="firm" maxlength="60"></td>
                      </tr>
                      <tr> 
                        <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="5"></td>
                      </tr>
                      <tr> 
                        <td><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[19]; ?></div></td>
                        <td> <select name="country" id="country">
                            <option value=""></option>
							<option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="American Samoa">American Samoa</option>
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
                            <option value="Virgin islands">British Virgin isl.</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman isl">Cayman Islands</option>
                            <option value="Central African Rep">Central African 
                            Rep.</option>
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
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Faeroe isl">Faeroe Islands</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="French Guiana">French Guiana</option>
                            <option value="French Polynesia">French Polynesia</option>
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
                            <option value="Northern Ireland">Ireland, Northern</option>
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
                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="New Caledonia">New Caledonia</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
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
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="U.S. Virgin isl">U.S. Virgin Islands</option>
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
                        <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="5"></td>
                      </tr>
                      <tr> 
                        <td><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[12]; ?></div></td>
                        <td><input name="email" type="text" id="email" maxlength="40"></td>
                      </tr>
                      <tr> 
                        <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="5"></td>
                      </tr>
                      <tr> 
                        <td><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[5]; ?></div></td>
                        <td><input name="phone" type="text" id="phone" size="15" maxlength="15"></td>
                      </tr>
                      <tr> 
                        <td colspan="2"><img src="../images/pix_trans.gif" width="1" height="5"></td>
                      </tr>
                      <tr> 
                        <td><div align="right"><?php echo $txt[6]; ?></div></td>
                        <td><input name="fax" type="text" id="fax" size="15" maxlength="15"></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td valign="top"><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[14]; ?></div></td>
                        <td><textarea name="comments" cols="28" rows="5" id="comments"></textarea> 
                        </td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <!-- <tr>
                    <td valign="top" align="right"><?php echo $txt[20]; ?></td>
                    <td colspan="2">
					<input type="hidden" name="MAX_FILE_SIZE" value="5120000">
					<input type="file" name="userfile"><br><font class="hint">MS Excel/Word < 5 Mb</font>
					</td>
                  </tr> -->
                      <tr> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td colspan="2"><label><font CLASS=wbodytext> 
                          <input name="feedback" type="checkbox" id="feedback" value="YES">
                          <?php echo $txt[15]; ?></font></label></td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>
                      <tr> 
                        <td>&nbsp;</td>
                        <td><input name="submit" type="submit" class="btns" value="<?php echo $txt[16]; ?>"> 
                          <input name="reset" type="reset" class="btns" value="<?php echo $txt[17]; ?>"></td>
                      </tr>
                      <tr> 
                        <td colspan="2"></td>
                      </tr>
                    </table>
                <p>&nbsp;</p>
            </form>
                </td>
              </tr>
            </table>
          <br>          </td>
          <td width="144" valign="top" class="dashedline"><?php include("rside.php"); ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
<? require_once("footer.php"); ?>
</html>
