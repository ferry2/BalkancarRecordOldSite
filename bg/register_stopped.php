<? 
require '../functions.php';
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='register' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    //DisplayErrMsg(sprintf("internal error %d:%s\n",
    //mysql_errno(), mysql_error()));
	print "<font class=err>$noconn</font>";
    exit() ;
  }

for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}

?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../style.css" rel="stylesheet" type="text/css">
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
                <td valign="top" class="textfon">
				<!--
				 <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr> 
                      <td width="900%" colspan="3" valign="top">&nbsp;</td>
                    </tr>
                    <tr> 
                      <td colspan="3" valign="top"> 
                        <?
				if (!(isset($next) && $next == 'step2')){
					print "<form name=\"theForm\" method=\"post\" action=\"register.php?lang=$lang\" enctype=\"multipart/form-data\">";
				}
				?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="specsBorder1" bgcolor="#ECF5FF">
                          <tr> 
                            <td width="33%" valign="top"><strong><?php echo $txt[1]; ?></strong><br> 
                              <br> <div align="right"><strong> <?php echo $txt[2]; ?> 
                                <label> 
                                <input name="code" type="text" id="code2">
                                </label>
                                <br>
                                </strong><strong> <font color="#990000"> 
                                <label> 
                                <input name="enter" type="submit" class="btns" value="<?=$txt[4]; ?>">
                                <br>
                                </label>
                                </font></strong></div></td>
                            <td width="1%" valign="top">&nbsp;</td>
                            <td width="1%" valign="top" class="dashedline">&nbsp;</td>
                            <td width="65%"> 
                              <?php
					//start registration - step1
					if (!(isset($next)) && !(isset($payment))){
					?>
                              <table width="100%"  border="0" cellpadding="2" cellspacing="0">
                                <tr valign="top"> 
                                  <td colspan="3"><strong> 
                                    <?=$txt[5]?>
                                    </strong></td>
                                </tr>
                                <tr> 
                                  <td width="29%"><div align="right"><span class="style1"> 
                                      * </span><?php echo $txt[6]; ?></div></td>
                                  <td colspan="2"><input name="name" type="text" id="name" maxlength="60"> 
                                  </td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[7]; ?></div></td>
                                  <td colspan="2"><input name="firm" type="text" id="firm" maxlength="60"></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[8]; ?></div></td>
                                  <td colspan="2"><select name="country" id="country">
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
                                  <td colspan="3"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[9]; ?></div></td>
                                  <td colspan="2"><input name="email" type="text" id="email" maxlength="40"></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><span class="style1">*</span>&nbsp;<?php echo $txt[10]; ?></div></td>
                                  <td colspan="2"><input name="phone" type="text" id="phone" size="15" maxlength="15"></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td><div align="right"><?php echo $txt[11]; ?></div></td>
                                  <td colspan="2"><input name="fax" type="text" id="fax" size="15" maxlength="15"></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><img src="../images/pix_trans.gif" width="1" height="3"></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><label><font CLASS=wbodytext> 
                                    <input name="feedback" type="checkbox" id="feedback" value="YES">
                                    <?php echo $txt[12]; ?></font></label></td>
                                </tr>
                                <tr> 
                                  <td>&nbsp;</td>
                                  <td colspan="2"><input name="register" type="submit" class="btns" id="register" value="Напред" onClick="return Validator(document.theForm); document.theForm.submit();"> 
                                    <input name="reset" type="reset" class="btns" value="<?php echo $txt[14]; ?>"></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><span class="style1">* </span>-<font CLASS=wbodytext> 
                                    <?php echo $txt[15]; ?></font></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"><font class="title"><sup>1</sup> 
                                    - <?php echo $txt[48]; ?></font></td>
                                </tr>
                                <tr> 
                                  <td colspan="3"></td>
                                </tr>
                              </table>
                              <input type="hidden" name="next" value="step2"> 
                              <?
					  } else {//end: start registration - step1
							//извежда съобщение за извършено плащане или отказ
							if (isset($payment) && $payment == 'succ'){
								//print "<font class=success>Регистрацията премина успешно! Можете да получите достъп до каталозите като въведете кода си, изпратен на Вашия e-mail адрес.</font>";
							} else if(isset($payment) && $payment == 'false'){
								print "<font class=err>Пради неизвършено плащане, регистрацията не беше успешна! Моля, опитайте пак.</font>";
							}					  	
					  }
					  ?>
                              <?php
					//registration - step2
					if (isset($next) && $next == 'step2'){
					
					
							//запазване на данните от формата в сесийни променливи
							$_SESSION['email'] = cleanup_text($email);
							$_SESSION['name'] = cleanup_text($name);
							$_SESSION['firm'] = cleanup_text($firm);
							$_SESSION['country'] = cleanup_text($country);
							$_SESSION['phone'] = cleanup_text($phone);
							$_SESSION['fax'] = cleanup_text($fax);
							$_SESSION['feedback'] = cleanup_text($feedback);

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
							$submit_url = 'https://devep2.datamax.bg/ep2/epay2_demo/';
							# XXX Secret word with which merchant make CHECKSUM on the ENCODED packet
							$secret     = 'C9O65QCBUAM1I5AQG5JGNUZ4OM3LVIGF9WE2X3OTHFIHRZN85REA0I55RJNX6XBM';
							
							$min        = 'D773812904';
							//$invoice    = sprintf("%.0f", rand(10) * 100000); # XXX Invoice
							$invoice    = '1000000002';
							$sum        = '99.99';                            # XXX Ammount
							$exp_date   = '01.08.2020';                       # XXX Expiration date
							$descr      = 'Плащане за достъп до каталози';                             # XXX Description
							
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
<form action="https://www.epay.bg/" method=post>
<table class=epay-view cellspacing=1 cellpadding=4 width=350>
<tr>
<td class=epay-view-header align=center>Описание</td>
<td class=epay-view-header align=center>Сума</td>
</tr>
<tr>
<td class=epay-view-value><b>Достъп до каталози</b></td>
<td class=epay-view-name>0.01 BGN</td>
</tr>
<tr>
<td colspan=2 class=epay-view-name>
<input class=epay-button type=submit name=BUTTON:PAY value="   Платете тук   ">
</td>
</tr>
<tr>
<td colspan=2 class=epay-view-name style="white-space: normal; font-size: 10">
Плащането се осъществява чрез <a class=epay href="https://www.epay.bg/">ePay.bg</a> - Интернет системата за плащане с банкови карти и микросметки
</td>
</tr>
</table>
<input type=hidden name=PAGE value="paylogin">
<input type=hidden name=MIN value="2255409368">
<input type=hidden name=INVOICE value="">
<input type=hidden name=TOTAL value="0.01">
<input type=hidden name=DESCR value="Достъп до каталози">
<input type=hidden name=URL_OK value="http://www.balkancar-record.com/test/bg/register.php?lang=bg&payment=succ">
<input type=hidden name=URL_CANCEL value="http://www.balkancar-record.com/test/bg/register.php?lang=bg&payment=false">
</form>
HTML;
					}//end step2
					?>
                            </td>
                          </tr>
                        </table>
                        <?
			   if (!(isset($next) && $next == 'step2')){
					print "<input type=\"hidden\" name=\"model\" value=$model>";
					print "<input type=\"hidden\" name=\"index\" value=$index>";
				    print "</form>";
			   }
			   ?>
                      </td>
                    </tr>
                    <tr> 
                      <td colspan="3" valign="top"></td>
                    </tr>
                  </table> 
				  -->
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
