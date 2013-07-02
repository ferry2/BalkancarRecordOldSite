<? 
require '../functions.php';
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='contacts' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
	print "<font class=err>$noconn</font>";
    exit() ;
  }

for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}

if (isset($_POST['submit'])){

	$verif_box = $_POST["verif_box"];
	if(md5($verif_box).'a4xn' == $_COOKIE['tntcon']) {
		
		$lice = cleanup_text($_POST['lice']);
		$firm = cleanup_text($_POST['firm']);
		$country = cleanup_text($_POST['country']);
		$email = cleanup_text($_POST['email']);
		$phone = cleanup_text($_POST['phone']);
		$fax = cleanup_text($_POST['fax']);
		$comments = cleanup_text($_POST['comments']);
		$feedback = cleanup_text($_POST['feedback']);
		$dealer = cleanup_text($_POST['dealer']);

		// delete the cookie so it cannot sent again by refreshing this page
		setcookie('tntcon','');
		
		if ($feedback != 'YES')
			$feedback = 'NO';
	
	
	
		if (isset($_POST['Offer']) && $_POST['Offer'] == "checked"){
			
			$MachineType = $_POST['MachineType'];
			$SupplyType = $_POST['SupplyType'];
			$LoadWeight = $_POST['LoadWeight'];
			$MaxHeight = $_POST['MaxHeight'];
			$System = $_POST['System'];
			$TyreTypes = $_POST['TyreTypes'];
			$ForkEqualizer = $_POST['ForkEqualizer'];
			$SpecialLoads = $_POST['SpecialLoads'];
			$ConstructRestrictions = $_POST['ConstructRestrictions'];
			$Other = $_POST['Other'];
			$PlatformSize = $_POST['PlatformSize'];
			$LoadCenter = $_POST['LoadCenter'];
			
			if ($LoadCenter == 'друго')
				$LoadCenter = $_POST['LoadCenterCustom'];
			
		
			$offer_body = "<table width=100% border=0 cellpadding=0 cellspacing=1 bgcolor=#990000>
          <tr>
            <td><table width=100% border=0 bgcolor=#E6FFEE>
              <tr>
                <td colspan=2><span class=subtitle>
                  <font style=\"font-size: 14pt; color:#990000\" id=labelOffer>Поръчка за оферта:</font></span></td>
              </tr>
              <tr>
                <td width=60%><div align=right>Тип машина:&nbsp;</div></td>
                <td width=40%>$MachineType</td>
              </tr>
              <tr>
                <td width=60%><div align=right>Какъв тип задвижване на машината препочитате:&nbsp;</div></td>
                <td width=40%>$SupplyType</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelLoadWeight class=disabledText>Тегло на товара /кг/ (За влекач - Теглително усилие /kN/):&nbsp;</font></div></td>
                <td>$LoadWeight</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelMaxHeight class=disabledText>На каква максимална височина ще поставяте товарите си /мм/:&nbsp;</font></div></td>
                <td>$MaxHeight</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelTyreTypes class=disabledText>Уредба:&nbsp;</font></div></td>
                <td>$System</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelLoadCenter class=disabledText>Център на тежестта на товара /мм/:&nbsp;</font></div></td>
                <td>$LoadCenter</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelPlatformSize class=disabledText>Размер на товарната платформа (mm)&nbsp;</font></div></td>
                <td>$PlatformSize</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelTyreTypes class=disabledText>Вид гуми:&nbsp;</font></div></td>
                <td>$TyreTypes</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelForkEqualizer class=disabledText>Виличен изравнител:&nbsp;</font></div></td>
                <td>$ForkEqualizer</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelSpecialLoads class=disabledText>Специални товари: рула, бали и др. (размери и тегло):&nbsp;</font></div></td>
                <td>$SpecialLoads</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelConstructRestrictions class=disabledText>Минимални размери на проходите,през които ще преминава машината:&nbsp;</font></div></td>
                <td>$ConstructRestrictions</td>
              </tr>
              <tr>
                <td><div align=right><font id=labelOther class=disabledText>Други (запрашена среда, работа в контейнер, вагон, тип на настилката):&nbsp;</font></div></td>
                <td>$Other</td>
              </tr>
            </table></td>
          </tr>
        </table>";
		} else {
			$offer_body = "";
		}
		
			
		/* recipients */
		//for testing
		//$to  = "peter_k@abv.bg";
		//$to = "it@balkancar-record.com";
	
		
		//comment for testing
		$to  = "record@balkancar-record.com";
		if ($dealer != "main")
			$to .= ",$dealer"; 
	
		
		/* subject */
		$subject = "WebAdmin_$lang";
		
		/* message */
		$mail_body = "<html><body><table width=56% border=0 cellpadding=0 cellspacing=0 class=specsBorder1>
  <tr>
    <td width=53% valign=top><table width=100%  border=0 cellpadding=2 cellspacing=0>
      <tr>
        <td width=100% colspan=2><table width=100% border=0 cellpadding=1 cellspacing=0 bgcolor=#990000>
          <tr>
            <td><table width=100% border=0 bgcolor=#E6FFEE>
              <tr>
                <td colspan=2 class=subtitle><font style=\"font-size: 14pt; color:#990000\">Общи данни: </font></td>
              </tr>
              <tr>
                <td width=44%><div align=right>Лице за контакти:&nbsp;</div></td>
                <td width=56%>$lice&nbsp;</td>
              </tr>
              <tr>
                <td><div align=right>Фирма:&nbsp;</div></td>
                <td>$firm</td>
              </tr>
              <tr>
                <td><div align=right>Държава:&nbsp;</div></td>
                <td>$country;</td>
              </tr>
              <tr>
                <td><div align=right>E-mail:&nbsp;</div></td>
                <td>$email</td>
              </tr>
              <tr>
                <td><div align=right>Телефон:&nbsp;</div></td>
                <td>$phone</td>
              </tr>
              <tr>
                <td><div align=right>
                  <div align=right>Факс:&nbsp;</div>
                </div></td>
                <td>$fax</td>
              </tr>
              <tr>
                <td valign=top><div align=right>Относно:&nbsp;</div></td>
                <td>$comments</td>
              </tr>
              <tr>
                <td valign=top><div align=right>Желая Ваш представител да се свърже с мен:&nbsp; </div></td>
                <td>$feedback</td>
              </tr>
              <tr>
                <td colspan=2>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan=2></td>
      </tr>
      <tr>
        <td colspan=2>$offer_body</td>
      </tr>
      <tr>
        <td colspan=2></td>
      </tr>
	  <tr>
	  	<td><font color=red>Този емаил е автоматично генериран от <b>$lang</b> версия на сайта!</font></td>
	  </tr>
    </table></td>
  </tr>
</table></body></html>";

		
		/* To send HTML mail, you can set the Content-type header. */
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset= utf-8\r\n";
		//$headers .= "To: Balkancar-Record <$to>\r\n";
		$headers .= "From: $email <$email>\r\n";
		
		/* and now mail it */
		if (!mail($to, $subject, $mail_body, $headers))
				$message = "<font class=err>$txt[34]</font>";
			else
				$message = $message."<font class=success>$txt[35]</font>";
	
		//}

	} else {

		echo "<SCRIPT LANGUAGE='javascript'> alert(\"$contacts_text[89]\"); history.back();</SCRIPT>";
		//$message_question = "<font class=err>$txt[47]</font><br><br>"; 
	}
}

if (isset($num)){
	$query = "select $lang, Email from dealers where num=$num";
	if ((!$result = mysql_db_query($DB, $query))) {
		print "<font class=err>$noconn</font>";
		exit();
	}
	$result=fetchResult($query);
	while($row = mysql_fetch_array($result)) {
		$dealersName = $row["$lang"];
		$dealersEmail = $row["Email"];
	}
}

?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style2 {color: #CC0000}
-->
</style>

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

	<?
	if (!isset($num)){
echo <<<HTML
		//check for dealer
		var flag=0;
		for (i=0;i<document.theForm.dealer.length;i++) {
			if (document.theForm.dealer[i].checked) {
				flag=1;	
			}
		}
		if (flag==0){
			alert("$txt[38]");
			return (false);	
		}
HTML;
	}
	?>
	
}

var DHTML = (document.getElementById || document.all || document.layers);

function chngDealer(txt){
	document.getElementById("text").innerHTML = txt
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

function InitOffer()
{
	document.getElementById("labelOffer").style.color = "#CCCCCC";
	document.theForm.MachineType.disabled = true;
	document.getElementById("labelMachineType").style.color = "#CCCCCC";
	document.theForm.SupplyType.disabled = true;
	document.getElementById("labelSupplyType").style.color = "#CCCCCC";
	document.theForm.LoadWeight.disabled = true;
	document.getElementById("labelLoadWeight").style.color = "#CCCCCC";
	document.theForm.MaxHeight.disabled = true;
	document.getElementById("labelMaxHeight").style.color = "#CCCCCC";
	document.theForm.LoadCenter.disabled = true;
	document.getElementById("labelLoadCenter").style.color = "#CCCCCC";
	document.theForm.SpecialLoads.disabled = true;
	document.getElementById("labelSpecialLoads").style.color = "#CCCCCC";
	document.theForm.TyreTypes.disabled = true;
	document.getElementById("labelTyreTypes").style.color = "#CCCCCC";
	document.theForm.System.disabled = true;
	document.getElementById("labelSystem").style.color = "#CCCCCC";
	document.theForm.ConstructRestrictions.disabled = true;
	document.getElementById("labelConstructRestrictions").style.color = "#CCCCCC";
	document.theForm.ForkEqualizer.disabled = true;
	document.getElementById("labelForkEqualizer").style.color = "#CCCCCC";
	document.theForm.Other.disabled = true;
	document.getElementById("labelPlatformSize").style.color = "#CCCCCC";
	document.theForm.PlatformSize.disabled = true;
	document.getElementById("labelOther").style.color = "#CCCCCC";
	document.getElementById("mand1").style.color = "#CCCCCC";
	document.getElementById("mand2").style.color = "#CCCCCC";
	document.getElementById("mand3").style.color = "#CCCCCC";
	document.getElementById("mand4").style.color = "#CCCCCC";
	document.getElementById("LoadCenterCustom").style.visibility = 'hidden';
	document.theForm.LoadCenterCustom.disabled = true;
}

window.onload = InitOffer;

function checkOrder()
{

	if (document.theForm.Offer.checked == true){
		document.getElementById("labelOffer").style.color = "#333333";
		document.theForm.MachineType.disabled = false;
		document.getElementById("labelMachineType").style.color = "#333333";
		document.theForm.SupplyType.disabled = false;
		document.getElementById("labelSupplyType").style.color = "#333333";
		document.theForm.LoadWeight.disabled = false;
		document.getElementById("labelLoadWeight").style.color = "#333333";
		document.theForm.MaxHeight.disabled = false;
		document.getElementById("labelMaxHeight").style.color = "#333333";
		document.theForm.LoadCenter.disabled = false;
		document.getElementById("labelLoadCenter").style.color = "#333333";
		document.theForm.SpecialLoads.disabled = false;
		document.getElementById("labelSpecialLoads").style.color = "#333333";
		document.theForm.TyreTypes.disabled = false;
		document.getElementById("labelTyreTypes").style.color = "#333333";
		document.theForm.System.disabled = false;
		document.getElementById("labelSystem").style.color = "#333333";
		document.theForm.ConstructRestrictions.disabled = false;
		document.getElementById("labelConstructRestrictions").style.color = "#333333";
		document.theForm.ForkEqualizer.disabled = false;
		document.getElementById("labelForkEqualizer").style.color = "#333333";
		document.theForm.Other.disabled = false;
		document.getElementById("labelPlatformSize").style.color = "#333333";
		document.theForm.PlatformSize.disabled = false;
		document.getElementById("labelOther").style.color = "#333333";
		document.getElementById("mand1").style.color = "#CC0000";
		document.getElementById("mand2").style.color = "#CC0000";
		document.getElementById("mand3").style.color = "#CC0000";
		document.getElementById("mand4").style.color = "#CC0000";
	} else {
		document.getElementById("labelOffer").style.color = "#CCCCCC";
		document.theForm.MachineType.disabled = true;
		document.getElementById("labelMachineType").style.color = "#CCCCCC";
		document.theForm.SupplyType.disabled = true;
		document.getElementById("labelSupplyType").style.color = "#CCCCCC";
		document.theForm.LoadWeight.disabled = true;
		document.getElementById("labelLoadWeight").style.color = "#CCCCCC";
		document.theForm.MaxHeight.disabled = true;
		document.getElementById("labelMaxHeight").style.color = "#CCCCCC";
		document.theForm.LoadCenter.disabled = true;
		document.getElementById("labelLoadCenter").style.color = "#CCCCCC";
		document.theForm.SpecialLoads.disabled = true;
		document.getElementById("labelSpecialLoads").style.color = "#CCCCCC";
		document.theForm.TyreTypes.disabled = true;
		document.getElementById("labelTyreTypes").style.color = "#CCCCCC";
		document.theForm.System.disabled = true;
		document.getElementById("labelSystem").style.color = "#CCCCCC";
		document.theForm.ConstructRestrictions.disabled = true;
		document.getElementById("labelConstructRestrictions").style.color = "#CCCCCC";
		document.theForm.ForkEqualizer.disabled = true;
		document.getElementById("labelForkEqualizer").style.color = "#CCCCCC";
		document.theForm.Other.disabled = true;
		document.getElementById("labelPlatformSize").style.color = "#CCCCCC";
		document.theForm.PlatformSize.disabled = true;
		document.getElementById("labelOther").style.color = "#CCCCCC";
		document.getElementById("mand1").style.color = "#CCCCCC";
		document.getElementById("mand2").style.color = "#CCCCCC";
		document.getElementById("mand3").style.color = "#CCCCCC";
		document.getElementById("mand4").style.color = "#CCCCCC";
	}
}


//start of Dynamic values

//1 ниво - Тип машина
function SelectSupplyType(){
	
	removeAllOptions(document.theForm.SupplyType);
	removeAllOptions(document.theForm.LoadWeight);
	removeAllOptions(document.theForm.MaxHeight);
	removeAllOptions(document.theForm.System);
	removeAllOptions(document.theForm.LoadCenter);
	removeAllOptions(document.theForm.PlatformSize);
	document.getElementById("LoadCenterCustom").style.visibility = 'hidden';
	document.theForm.LoadCenterCustom.disabled = true;
	document.getElementById("reduct").style.visibility = 'hidden';
	//document.getElementById("labelLW").innerHTML = "<?=$contacts_text[58]?>";

	
	if( document.theForm.MachineType.value == 'мотокар' )
	{
		document.theForm.SupplyType.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.SupplyType.options[1]=new Option("<?=$contacts_text[55]?>", "дизел", false, false);
		document.theForm.SupplyType.options[2]=new Option("<?=$contacts_text[56]?>", "газ", false, false);

	}
	
	if( document.theForm.MachineType.value == 'електрокар') 
	{
		document.theForm.SupplyType.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.SupplyType.options[1]=new Option("<?=$contacts_text[91]?>", "AC", false, false);
		document.theForm.SupplyType.options[2]=new Option("<?=$contacts_text[92]?>", "DC", false, false);
		
	}
	
	if( document.theForm.MachineType.value == 'ретрак') 
	{
		document.theForm.SupplyType.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.SupplyType.options[1]=new Option("<?=$contacts_text[93]?>", "AC", false, false);
	}

	if( document.theForm.MachineType.value == 'платформа') 
	{
		document.theForm.SupplyType.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.SupplyType.options[1]=new Option("<?=$contacts_text[91]?>", "AC", false, false);
		document.theForm.SupplyType.options[2]=new Option("<?=$contacts_text[92]?>", "DC", false, false);

		document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.PlatformSize.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);

	}
	
	if( document.theForm.MachineType.value == 'влекач' )
	{
		document.theForm.SupplyType.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.SupplyType.options[1]=new Option("<?=$contacts_text[55]?>", "дизел", false, false);
		document.theForm.SupplyType.options[2]=new Option("<?=$contacts_text[94]?>", "AC", false, false);

		document.getElementById("labelLW").textContent = "<?=$contacts_text[87]?>";
		document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.PlatformSize.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);

	} 
	
	if (document.theForm.MachineType.value == 'платформа' || document.theForm.MachineType.value == 'влекач')
	{
		document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
	}
	else
	{
		document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.PlatformSize.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.LoadCenter.options[1]=new Option("500", "500", false, false);
		document.theForm.LoadCenter.options[2]=new Option("<?=$contacts_text[61]?>", "друго", false, false);
	}

	if (document.theForm.MachineType.value != '')
	{
		document.theForm.TyreTypes.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.TyreTypes.options[1]=new Option("<?=$contacts_text[64]?>", "супереластични", false, false);
		document.theForm.TyreTypes.options[2]=new Option("<?=$contacts_text[65]?>", "пневматични", false, false);
	}
	
	if (document.theForm.MachineType.value == '')
	{
		removeAllOptions(document.theForm.SupplyType);
		removeAllOptions(document.theForm.LoadWeight);
		removeAllOptions(document.theForm.MaxHeight);
		removeAllOptions(document.theForm.System);
		removeAllOptions(document.theForm.TyreTypes);
		removeAllOptions(document.theForm.LoadCenter);
		removeAllOptions(document.theForm.PlatformSize);
		document.getElementById("LoadCenterCustom").style.visibility = 'hidden';
		document.theForm.LoadCenterCustom.disabled = true;
		document.theForm.SupplyType.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.TyreTypes.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.PlatformSize.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
	}
	
	if( document.theForm.MachineType.value != 'влекач' )
		document.getElementById("labelLW").textContent = "<?=$contacts_text[58]?>";

}

//2 – ро ниво   захранване на машината
function SelectLoadWeights(){
	
	removeAllOptions(document.theForm.LoadWeight);
	removeAllOptions(document.theForm.MaxHeight);
	removeAllOptions(document.theForm.System);
	document.getElementById("reduct").style.visibility = 'hidden';
	
	if( document.theForm.MachineType.value == 'мотокар' )
	{
		
		if (document.theForm.SupplyType.value == 'дизел')
		{
			document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.LoadWeight.options[1]=new Option("1250", 1250, false, false);
			document.theForm.LoadWeight.options[2]=new Option("1500", 1500, false, false);
			document.theForm.LoadWeight.options[3]=new Option("1750", 1750, false, false);
			document.theForm.LoadWeight.options[4]=new Option("2000", 2000, false, false);
			document.theForm.LoadWeight.options[5]=new Option("2500", 2500, false, false);
			document.theForm.LoadWeight.options[6]=new Option("3000", 3000, false, false);
			document.theForm.LoadWeight.options[7]=new Option("3500", 3500, false, false);
			document.theForm.LoadWeight.options[8]=new Option("4000", 4000, false, false);
			document.theForm.LoadWeight.options[9]=new Option("5000", 5000, false, false);
			document.theForm.LoadWeight.options[10]=new Option("4000 2SR", 40000, false, false);
			document.theForm.LoadWeight.options[11]=new Option("5000 2SR", 50000, false, false);
			document.theForm.LoadWeight.options[12]=new Option("6000", 6000, false, false);
			document.theForm.LoadWeight.options[13]=new Option("7000", 7000, false, false);
			document.theForm.LoadWeight.options[14]=new Option("8000", 8000, false, false);
			document.theForm.LoadWeight.options[15]=new Option("10000", 10000, false, false);
			document.theForm.LoadWeight.options[16]=new Option("12500", 12500, false, false);
		}

		if (document.theForm.SupplyType.value == 'газ')
		{
			document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.LoadWeight.options[1]=new Option("1250", 1250, false, false);
			document.theForm.LoadWeight.options[2]=new Option("1500", 1500, false, false);
			document.theForm.LoadWeight.options[3]=new Option("1750", 1750, false, false);
			document.theForm.LoadWeight.options[4]=new Option("2000", 2000, false, false);
			document.theForm.LoadWeight.options[5]=new Option("2500", 2500, false, false);
			document.theForm.LoadWeight.options[6]=new Option("3000", 3000, false, false);
			document.theForm.LoadWeight.options[7]=new Option("3500", 3500, false, false);
			document.theForm.LoadWeight.options[8]=new Option("4000", 4000, false, false);
			document.theForm.LoadWeight.options[9]=new Option("5000", 5000, false, false);
		}

	}

	if( document.theForm.MachineType.value == 'електрокар' )
	{
		
			document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.LoadWeight.options[1]=new Option("1250", 1250, false, false);
			document.theForm.LoadWeight.options[2]=new Option("1600", 1600, false, false);
			document.theForm.LoadWeight.options[3]=new Option("2000", 2000, false, false);
			document.theForm.LoadWeight.options[4]=new Option("2500", 2500, false, false);
			document.theForm.LoadWeight.options[5]=new Option("3500", 3500, false, false);
			document.theForm.LoadWeight.options[6]=new Option("4000", 4000, false, false);
			document.theForm.LoadWeight.options[7]=new Option("5000", 5000, false, false);
			document.theForm.LoadWeight.options[8]=new Option("6000", 6000, false, false);
			document.theForm.LoadWeight.options[9]=new Option("7000", 7000, false, false);
			document.theForm.LoadWeight.options[10]=new Option("8000", 8000, false, false);


	}
	
	if( document.theForm.MachineType.value == 'ретрак' )
	{
		if( document.theForm.SupplyType.value == 'AC')
		{
			document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.LoadWeight.options[1]=new Option("1400", 1400, false, false);
			document.theForm.LoadWeight.options[2]=new Option("1600", 1600, false, false);

		}
	}
	
	if( document.theForm.MachineType.value == 'платформа') 
	{
		document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.LoadWeight.options[1]=new Option("1000", 1000, false, false);
		document.theForm.LoadWeight.options[2]=new Option("2000", 2000, false, false);
		document.theForm.LoadWeight.options[3]=new Option("3000", 3000, false, false);
		document.theForm.LoadWeight.options[4]=new Option("5000", 5000, false, false);
		document.theForm.LoadWeight.options[5]=new Option("10000", 10000, false, false);
		document.theForm.LoadWeight.options[6]=new Option("12000", 12000, false, false);
		document.theForm.LoadWeight.options[7]=new Option("15000", 15000, false, false);
	
		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.PlatformSize.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
			
	}
	
	
	if (document.theForm.MachineType.value == 'влекач')
	{
		if( document.theForm.SupplyType.value == 'дизел') 
		{
			document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.LoadWeight.options[1]=new Option("16", "16", false, false);
			document.theForm.LoadWeight.options[2]=new Option("18", "20", false, false);
			document.theForm.LoadWeight.options[3]=new Option("20", "20", false, false);
			document.theForm.LoadWeight.options[4]=new Option("22,5", "22,5", false, false);
		}
		
		if( document.theForm.SupplyType.value == 'AC')
		{
			document.theForm.LoadWeight.options[0]=new Option("2,5", "2,5", true, true);
		}
	
		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.PlatformSize.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
	
	}
	
	if (document.theForm.MachineType.value != 'платформа' && document.theForm.MachineType.value != 'влекач')
	{
		removeAllOptions(document.theForm.MaxHeight);
		removeAllOptions(document.theForm.System);

		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		
	}
	
	if (document.theForm.SupplyType.value == '')
	{

		if (document.theForm.MachineType.value == 'влекач')
		{
			document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		}
		else if (document.theForm.MachineType.value == 'платформа')
		{
			removeAllOptions(document.theForm.LoadWeight);
			removeAllOptions(document.theForm.PlatformSize);
			document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
			document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
			document.theForm.PlatformSize.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		}
		else
		{
			removeAllOptions(document.theForm.LoadWeight);
			removeAllOptions(document.theForm.MaxHeight);
			removeAllOptions(document.theForm.System);
	
			document.theForm.LoadWeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
			document.theForm.System.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		}
	}
}

//3 – ниво тегло на товара/теглително усилие
function SelectMaxHeights(){

	document.getElementById("reduct").style.visibility = 'hidden';
	
	if( document.theForm.MachineType.value != 'влекач')
	{
		removeAllOptions(document.theForm.MaxHeight);
		removeAllOptions(document.theForm.System);
	}
	
	if( document.theForm.MachineType.value == 'мотокар')
	{
		
		if ( document.theForm.LoadWeight.value >= 1250 && document.theForm.LoadWeight.value <= 2000 )
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.MaxHeight.options[1]=new Option("3000", "3000", false, false);
			document.theForm.MaxHeight.options[2]=new Option("4000", "4000", false, false);
			document.theForm.MaxHeight.options[3]=new Option("4200", "4200", false, false);
			document.theForm.MaxHeight.options[4]=new Option("4500", "4500", false, false);
			document.theForm.MaxHeight.options[5]=new Option("5000", "5000", false, false);
			document.theForm.MaxHeight.options[6]=new Option("5400", "5400", false, false);
			document.theForm.MaxHeight.options[7]=new Option("6000", "6000", false, false);
		} 

		if ( document.theForm.LoadWeight.value >= 2500 && document.theForm.LoadWeight.value <= 5000 )
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.MaxHeight.options[1]=new Option("3000", "3000", false, false);
			document.theForm.MaxHeight.options[2]=new Option("4000", "4000", false, false);
			document.theForm.MaxHeight.options[3]=new Option("4200", "4200", false, false);
			document.theForm.MaxHeight.options[4]=new Option("4500", "4500", false, false);
			document.theForm.MaxHeight.options[5]=new Option("4800", "4800", false, false);
			document.theForm.MaxHeight.options[6]=new Option("5200", "5200", false, false);
			document.theForm.MaxHeight.options[7]=new Option("5600", "5600", false, false);
			document.theForm.MaxHeight.options[8]=new Option("6400", "6400", false, false);
			
		}
		
		if ( document.theForm.LoadWeight.value >= 6000 && document.theForm.LoadWeight.value <= 8000 )
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.MaxHeight.options[1]=new Option("3300", "3300", false, false);
			document.theForm.MaxHeight.options[2]=new Option("4000", "4000", false, false);
			document.theForm.MaxHeight.options[3]=new Option("4200", "4200", false, false);
			document.theForm.MaxHeight.options[4]=new Option("4500", "4500", false, false);
			document.theForm.MaxHeight.options[5]=new Option("4800", "4800", false, false);
			document.theForm.MaxHeight.options[6]=new Option("5200", "5200", false, false);
			document.theForm.MaxHeight.options[7]=new Option("5600", "5600", false, false);
			document.theForm.MaxHeight.options[8]=new Option("6400", "6400", false, false);
		
		}

		if ( document.theForm.LoadWeight.value >= 10000 && document.theForm.LoadWeight.value <= 12500 )
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.MaxHeight.options[1]=new Option("3300", "3300", false, false);
			document.theForm.MaxHeight.options[2]=new Option("4000", "4000", false, false);
			document.theForm.MaxHeight.options[3]=new Option("4500", "4500", false, false);
		}

		if ( document.theForm.LoadWeight.value == 40000 || document.theForm.LoadWeight.value == 50000 )
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.MaxHeight.options[1]=new Option("3300", "3300", false, false);
			document.theForm.MaxHeight.options[2]=new Option("4000", "4000", false, false);
			document.theForm.MaxHeight.options[3]=new Option("4200", "4200", false, false);
			document.theForm.MaxHeight.options[4]=new Option("4500", "4500", false, false);
			document.theForm.MaxHeight.options[5]=new Option("4800", "4800", false, false);
			document.theForm.MaxHeight.options[6]=new Option("5200", "5200", false, false);
			document.theForm.MaxHeight.options[7]=new Option("5600", "5600", false, false);
			document.theForm.MaxHeight.options[8]=new Option("6400", "6400", false, false);

		}

	}
	
	if( document.theForm.MachineType.value == 'електрокар')
	{
		if ( document.theForm.LoadWeight.value >= 1250 && document.theForm.LoadWeight.value <= 2500 )
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.MaxHeight.options[1]=new Option("3000", "3000", false, false);
			document.theForm.MaxHeight.options[2]=new Option("4000", "4000", false, false);
			document.theForm.MaxHeight.options[3]=new Option("4200", "4200", false, false);
			document.theForm.MaxHeight.options[4]=new Option("4500", "4500", false, false);
			document.theForm.MaxHeight.options[5]=new Option("5000", "5000", false, false);
			document.theForm.MaxHeight.options[6]=new Option("5400", "5400", false, false);
			document.theForm.MaxHeight.options[7]=new Option("6000", "6000", false, false);
			document.theForm.MaxHeight.options[8]=new Option("7000", "7000", false, false);

		} 

		if ( document.theForm.LoadWeight.value >= 3500 && document.theForm.LoadWeight.value <= 5000 )
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.MaxHeight.options[1]=new Option("3000", "3000", false, false);
			document.theForm.MaxHeight.options[2]=new Option("4000", "4000", false, false);
			document.theForm.MaxHeight.options[3]=new Option("4200", "4200", false, false);
			document.theForm.MaxHeight.options[4]=new Option("4500", "4500", false, false);
			document.theForm.MaxHeight.options[5]=new Option("4800", "4800", false, false);
			document.theForm.MaxHeight.options[6]=new Option("5200", "5200", false, false);
			document.theForm.MaxHeight.options[7]=new Option("5600", "5600", false, false);
			document.theForm.MaxHeight.options[8]=new Option("6400", "6400", false, false);

		} 

		if ( document.theForm.LoadWeight.value >= 6000 && document.theForm.LoadWeight.value <= 8000 )
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
			document.theForm.MaxHeight.options[1]=new Option("3000", "3000", false, false);
			document.theForm.MaxHeight.options[2]=new Option("4000", "4000", false, false);
			document.theForm.MaxHeight.options[3]=new Option("4500", "4500", false, false);

		} 


	}
	
	if( document.theForm.MachineType.value == 'ретрак')
	{
		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
		document.theForm.MaxHeight.options[1]=new Option("4200", "4200", false, false);
		document.theForm.MaxHeight.options[2]=new Option("4500", "4500", false, false);
		document.theForm.MaxHeight.options[3]=new Option("4800", "4800", false, false);
		document.theForm.MaxHeight.options[4]=new Option("5200", "5200", false, false);
		document.theForm.MaxHeight.options[5]=new Option("5600", "5600", false, false);
		document.theForm.MaxHeight.options[6]=new Option("6400", "6400", false, false);
		document.theForm.MaxHeight.options[7]=new Option("9000", "9000", false, false);

	}
	
	if( document.theForm.MachineType.value == 'платформа')
	{
		if ( document.theForm.LoadWeight.value == 1000)
		{
			document.theForm.PlatformSize.options[0]=new Option("1650x1000", "1650x1000", true, true);
		}

		if ( document.theForm.LoadWeight.value >= 2000 && document.theForm.LoadWeight.value <= 3000)
		{
			document.theForm.PlatformSize.options[0]=new Option("2100x1300", "2100x1300", true, true);
		}
		
		if ( document.theForm.LoadWeight.value == 5000)
		{
			document.theForm.PlatformSize.options[0]=new Option("2250x1500", "2250x1500", true, true);
		}

		if ( document.theForm.LoadWeight.value >= 10000 && document.theForm.LoadWeight.value <= 12000)
		{
			document.theForm.PlatformSize.options[0]=new Option("2700x2100", "2700x2100", true, true);
		}

		if ( document.theForm.LoadWeight.value == 15000)
		{
			document.theForm.PlatformSize.options[0]=new Option("3300x2100", "3300x2100", true, true);
		}

		document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
		document.theForm.LoadCenter.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);

	}

	if (document.theForm.MachineType.value != 'платформа' && document.theForm.MachineType.value != 'влекач')
	{
		removeAllOptions(document.theForm.System);
		document.theForm.System.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
	}
	
	
	if (document.theForm.LoadWeight.value == '')
	{
		
		if (document.theForm.MachineType.value == 'влекач')
		{
			
		}
		else if (document.theForm.MachineType.value == 'платформа')
		{
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[86]?>", "без опция", true, true);
			document.theForm.PlatformSize.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		}
		else
		{
			removeAllOptions(document.theForm.MaxHeight);
			document.theForm.MaxHeight.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		}
		
	}

}


function SelectSystems(){

	removeAllOptions(document.theForm.System);

	if (document.theForm.MaxHeight.value > 4000)
		document.getElementById("reduct").style.visibility = 'visible';
	else
		document.getElementById("reduct").style.visibility = 'hidden';
	
	if( document.theForm.MachineType.value == 'мотокар' )
	{
		if (document.theForm.MaxHeight.value == 4000)
		{
			document.theForm.System.options[0]=new Option("<?=$contacts_text[67]?>", "симплекс", true, true);
		} 
		else
		{
	
			if ( document.theForm.LoadWeight.value >= 1250 && document.theForm.LoadWeight.value <= 2000 )
			{
				if (document.theForm.MaxHeight.value == 3000)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[67]?>", "симплекс", false, false);
					document.theForm.System.options[2]=new Option("<?=$contacts_text[68]?>", "дуплекс", false, false);
				
				}
				
				if (document.theForm.MaxHeight.value >= 4200 && document.theForm.MaxHeight.value <= 6000)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[69]?>", "триплекс", true, true);
				}
			
			}
		
			if ( document.theForm.LoadWeight.value >= 2500 && document.theForm.LoadWeight.value <= 5000 )
			{
				if (document.theForm.MaxHeight.value == 3000)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[67]?>", "симплекс", false, false);
					document.theForm.System.options[2]=new Option("<?=$contacts_text[68]?>", "дуплекс", false, false);
				
				}
		
				if (document.theForm.MaxHeight.value == 4500)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[69]?>", "триплекс", false, false);
				
				}
				
				if (document.theForm.MaxHeight.value != 4500 && document.theForm.MaxHeight.value >= 4200 && document.theForm.MaxHeight.value <= 6400)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[69]?>", "триплекс", true, true);
				}
				
			
			}
			
			if ( document.theForm.LoadWeight.value >= 6000 && document.theForm.LoadWeight.value <= 8000 )
			{
				if (document.theForm.MaxHeight.value == 3300)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[67]?>", "симплекс", false, false);
					document.theForm.System.options[2]=new Option("<?=$contacts_text[68]?>", "дуплекс", false, false);
				
				}
				
				if (document.theForm.MaxHeight.value == 4500)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[69]?>", "триплекс", false, false);
				
				}
				
				if (document.theForm.MaxHeight.value != 4500 && document.theForm.MaxHeight.value >= 4200 && document.theForm.MaxHeight.value <= 6400)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[69]?>", "триплекс", true, true);
				}
			
			}
			
			if ( document.theForm.LoadWeight.value >= 10000 && document.theForm.LoadWeight.value <= 12500 )
			{
				document.theForm.System.options[0]=new Option("<?=$contacts_text[67]?>", "симплекс", true, true);				
			}
			
			if ( document.theForm.LoadWeight.value == 40000 || document.theForm.LoadWeight.value == 50000 )
			{
				if (document.theForm.MaxHeight.value == 3300)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[67]?>", "симплекс", false, false);
					document.theForm.System.options[2]=new Option("<?=$contacts_text[68]?>", "дуплекс", false, false);
				
				}
		
				if (document.theForm.MaxHeight.value == 4500)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[69]?>", "триплекс", false, false);
				
				}
				
				if (document.theForm.MaxHeight.value != 4500 && document.theForm.MaxHeight.value >= 4200 && document.theForm.MaxHeight.value <= 6400)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[69]?>", "триплекс", true, true);
				}
			}
		}
	}
	
	//electrokar
	if( document.theForm.MachineType.value == 'електрокар' )
	{
		if (document.theForm.MaxHeight.value == 4000)
		{
			document.theForm.System.options[0]=new Option("<?=$contacts_text[67]?>", "симплекс", true, true);
		} 
		else
		{
	
			if ( document.theForm.LoadWeight.value >= 1250 && document.theForm.LoadWeight.value <= 2500 )
			{
				if (document.theForm.MaxHeight.value == 3000)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[67]?>", "симплекс", false, false);
					document.theForm.System.options[2]=new Option("<?=$contacts_text[68]?>", "дуплекс", false, false);
				}
				
				if (document.theForm.MaxHeight.value >= 4200 && document.theForm.MaxHeight.value <= 7000)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[69]?>", "триплекс", true, true);
				}

			}
			
			if ( document.theForm.LoadWeight.value >= 3500 && document.theForm.LoadWeight.value <= 5000 )
			{
				if (document.theForm.MaxHeight.value == 3000)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[67]?>", "симплекс", false, false);
					document.theForm.System.options[2]=new Option("<?=$contacts_text[68]?>", "дуплекс", false, false);
				}

				if (document.theForm.MaxHeight.value == 4500)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[54]?>", "", true, true);
					document.theForm.System.options[1]=new Option("<?=$contacts_text[69]?>", "триплекс", false, false);
				
				}
				
				if (document.theForm.MaxHeight.value != 4500 && document.theForm.MaxHeight.value >= 4200 && document.theForm.MaxHeight.value <= 6400)
				{
					document.theForm.System.options[0]=new Option("<?=$contacts_text[69]?>", "триплекс", true, true);
				}

			}
			
			if ( document.theForm.LoadWeight.value >= 6000 && document.theForm.LoadWeight.value <= 8000 )
			{
				document.theForm.System.options[0]=new Option("<?=$contacts_text[67]?>", "симплекс", true, true);
			}
		}
	}
	
	if( document.theForm.MachineType.value == 'ретрак' )
	{
		document.theForm.System.options[0]=new Option("<?=$contacts_text[69]?>", "триплекс", true, true);
	}
	
	if (document.theForm.MaxHeight.value == '')
	{
		if (document.theForm.MachineType.value != 'платформа' && document.theForm.MachineType.value != 'влекач')
		{
			removeAllOptions(document.theForm.System);
			document.theForm.System.options[0]=new Option("<?=$contacts_text[84]?>", "", true, true);
		}
	}
}

function SelectLoadCenter()
{
	if (document.theForm.LoadCenter.value == 'друго')
	{
		document.getElementById("LoadCenterCustom").style.visibility = 'visible';
		document.theForm.LoadCenterCustom.disabled = false;
	}
	else
	{	
		document.getElementById("LoadCenterCustom").style.visibility = 'hidden';
		document.theForm.LoadCenterCustom.disabled = true;
	}
}

function removeAllOptions(selectbox)
{
	var i;
	for(i=selectbox.options.length-1;i>=0;i--)
	{
		//selectbox.options.remove(i);
		selectbox.remove(i);
	}
}


function addOption(selectbox, value, text )
{
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;

	selectbox.options.add(optn);
}
//end of Dynamic values

//-->
</SCRIPT>
<link rel="stylesheet" type="text/css" href="../consolidated_common.css" />
<script type="text/javascript" src="../livevalidation_standalone.js"></script>
</head>
<body>
<div align="<?=$SITE_ALIGN?>">
<table width="1025" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="799"><table width="1025" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="1021" height="520" border="0" cellpadding="5" cellspacing="5">
          <tr>
            <td height="18" class="headerfon"><?=$txt[0]?></td>
            </tr>
          <tr>
            <td valign="top" class="textfon"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3">
				<?
					if (isset($message))
						//echo "<font class=success>$txt[35]</font>";
						echo "<script>alert('$txt[35]')</script>";
				?></td>
              </tr>
              <tr>
                <td width="26%" valign="top"><table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="213" height="10"><strong><font class="dots">::.</font><?php echo $txt[1]; ?></strong></td>
                    </tr>
                    <tr bgcolor="#ECF5FF">
                      <td bgcolor="#ECF5FF" class="specsBorder1"><?=$contacts_text[2]?></td>
                    </tr>
                    <tr>
                      <td align="right"><div align="left"><a href="javascript:popUp('map.php?lang=<?=$lang?>');" style="font-size: 12px; font-weight: bold"><?php echo $txt[3]; ?></a></div></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    
                </table>
                  <table width="70%"  border="0" align="center" cellpadding="0" cellspacing="0" class="footer">
                    <tr>
                      <td><strong><font class="dots">::.</font> <?php echo $txt[4]; ?></strong></td>
                    </tr>
                    <tr>
                      <td class="specsBorder1"><table width="100%"  border="0" cellpadding="0" cellspacing="1" bgcolor="#ECF5FF">
                          <tr>
                            <td colspan="2"><strong><?php echo $txt[49]; ?></strong></td>
                            </tr>
                          <tr>
                            <td width="36%"><?php echo $txt[5]; ?></td>
                            <td width="64%"><?php echo $txt[44]; ?> 695 050</td>
                            </tr>
                          <tr>
                            <td><?php echo $txt[6]; ?>&nbsp;</td>
                            <td><?php echo $txt[44]; ?> 692 753</td>
                            </tr>
                          <tr>
                            <td colspan="2"></td>
                            </tr>
                          <tr>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td colspan="2"><strong><?php echo $txt[7]; ?></strong></td>
                            </tr>
                          <tr>
                            <td><?php echo $txt[5]; ?></td>
                            <td><?php echo $txt[44]; ?> 657 265</td>
                            </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $txt[44]; ?> 657 190</td>
                            </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $txt[44]; ?> 657 264</td>
                            </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $txt[44]; ?> 657 190 </td>
                            </tr>
                          <tr>
                            <td><?php echo $txt[13]; ?></td>
                            <td><?php echo $txt[44]; ?> 696 090</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                            </tr>
                          <tr>
                            <td colspan="2"><strong><?php echo $txt[50]; ?></strong></td>
                            </tr>
                          <tr>
                            <td><?php echo $txt[5]; ?></td>
                            <td><?php echo $txt[44]; ?> 657 241</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $txt[44]; ?> 657 264</td>
                          </tr>
                          <tr>
                            <td><?php echo $txt[13]; ?></td>
                            <td><?php echo $txt[44]; ?> 696 090</td>
                            </tr>
                          
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><strong><?php echo $txt[18]; ?></strong></td>
                            </tr>
                          <tr>
                            <td><?php echo $txt[5]; ?></td>
                            <td><?php echo $txt[44]; ?> 657 193</td>
                            </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $txt[44]; ?> 697 005</td>
                            </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td><strong><?php echo $txt[8]; ?></strong></td>
                            <td>&nbsp;</td>
                            </tr>
                          <tr>
                            <td><?php echo $txt[5]; ?></td>
                            <td><?php echo $txt[44]; ?> 657 220</td>
                            </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $txt[44]; ?> 657 181</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td><?php echo $txt[44]; ?> 657 286</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>+359 887406554</td>
                          </tr>
                          <tr>
                            <td>&nbsp;</td>
                            <td>+359 885 311477</td>
                          </tr>
                          
                          <tr>
                            <td colspan="2"></td>
                          </tr>
                          <tr>
                            <td colspan="2"></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table></td>
                <td width="0%" valign="top">&nbsp;</td>
                <td width="74%" valign="top"><strong><font class="dots">::.</font> <?php (!isset($num)) ? print $txt[9] : print $txt[51];?>&nbsp;<font size="3"><?=$dealersName?></font>:</strong><strong>
                  <form name="theForm" onSubmit="return Validator(this)" method="post" action="contacts.php?lang=<?php echo $lang;?>" enctype="multipart/form-data">
                    <table width="100%" height="418" border="0" cellpadding="0" cellspacing="0" bgcolor="#ECF5FF" class="specsBorder1">
                    <tr>
                    	<td colspan=2>&nbsp;</td>
                    </tr>
                    <tr>
					  <? 
					  if (!isset($num)){
echo <<<HTML
<td width="80%" valign="top">
<div align="center">
<input name="dealer" id="dealer" type="radio" value="main">
<strong><font color="#990000" size="4">$txt[43]</font>
<br><br>
$txt[42]:</strong><br>
HTML;
					$query = "select * from dealers order by $lang";
					if ((!$result = mysql_db_query($DB, $query))) {
						print "<font class=err>$noconn</font>";
						exit();
					}
					switch($lang){
						case "bg": 
							$tel="Тел";
						break;
						case "en":
							$tel="Tel";
						break;
						case "ru":
							$tel="Тел";
						break;
					}
					$result=fetchResult($query);
					print "<table width=400 border=0>";
					while($row = mysql_fetch_array($result)) {
						$Email=$row["Email"];
						$phone=$row["Phone"];
						$dealer=$row["$lang"];
						//$DealersText="Контакти с наш дилър:<br><b>".$row["$lang"]."</b><br>Tel: XX XX XX";
						print "<tr><label><td align=right width=200 valign=top>$dealer</td><td valign=top><input type=radio name=dealer id=dealer value=$Email></td><td align=left valign=top>$tel:$phone</td></label></tr>";
					}
					print "</table></div>";
					print "</td>";
					  } else {
					  	print "<input type=\"hidden\" name=\"dealer\" id=\"dealer\" value=$dealersEmail />";
					  } //end if
					  ?>
					  </td>
                      <td width="47%" valign="top"></td>
                      <td width="53%" valign="top"><table width="100%"  border="0" cellpadding="2" cellspacing="0">
                          <tr>
                            <td width="47%">&nbsp;</td>
                            <td width="53%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"><span class="style2">* </span>-<font CLASS=wbodytext> <?php echo $txt[46]; ?></font></td>
                            </tr>
                          <tr>
                            <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="#990000">
                              <tr>
                                <td><table width="100%" border="0" bgcolor="#E6FFEE">
                                  <tr>
                                    <td colspan="2" class="subtitle"><?=$contacts_text[76]?></td>
                                    </tr>
                                  <tr>
                                    <td width="47%"><div align="right"><span class="style2">* </span><?php echo $txt[10]; ?></div></td>
                                    <td width="53%"><input name="lice" type="text" id="lice" maxlength="60">
									<script type="text/javascript">
										var lice = new LiveValidation('lice');
										lice.add(Validate.Presence);
									</script>
									</td>
                                  </tr>
                                  <tr>
                                    <td><div align="right"><span class="style2">*</span>&nbsp;<?php echo $txt[11]; ?></div></td>
                                    <td><input name="firm" type="text" id="firm" maxlength="60">
									<script type="text/javascript">
										var firm = new LiveValidation('firm');
										firm.add(Validate.Presence);
									</script></td>
                                  </tr>
                                  <tr>
                                    <td><div align="right"><span class="style2">*</span>&nbsp;<?php echo $txt[19]; ?></div></td>
                                    <td><select name="country" id="country">
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
                                      <option value="Belarus">Belarus</option>
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
                                      <option value="Romania">Romania</option>
                                      <option value="Russia">Russia</option>
                                      <option value="Rwanda">Rwanda</option>
                                      <option value="Saba">Saba</option>
                                      <option value="Saipan">Saipan</option>
                                      <option value="Saudi Arabia">Saudi Arabia</option>
                                      <option value="Scotland">Scotland</option>
                                      <option value="Senegal">Senegal</option>
                                      <option value="Serbia and Montenegro">Serbia and Montenegro</option>
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
                                      <option value="Ukraina">Ukraina</option>
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
                                    </select><script type="text/javascript">
										var country = new LiveValidation('country');
										country.add(Validate.Presence);
									</script></td>
                                  </tr>
                                  <tr>
                                    <td><div align="right"><span class="style2">*</span>&nbsp;<?php echo $txt[12]; ?></div></td>
                                    <td><input name="email" type="text" id="email" maxlength="40">
									<script type="text/javascript">
										var email = new LiveValidation('email');
										email.add(Validate.Email);
										email.add(Validate.Presence);
									</script>
									</td>
                                  </tr>
                                  <tr>
                                    <td><div align="right"><span class="style2">*</span>&nbsp;<?php echo $txt[5]; ?></div></td>
                                    <td><input name="phone" type="text" id="phone" size="15" maxlength="15">
									<script type="text/javascript">
										var phone = new LiveValidation('phone');
										phone.add(Validate.Presence);
									</script></td>
                                  </tr>
                                  <tr>
                                    <td><div align="right"><?php echo $txt[6]; ?></div></td>
                                    <td><input name="fax" type="text" id="fax" size="15" maxlength="15"></td>
                                  </tr>
                                  <tr>
                                    <td valign="top"><div align="right"><span class="style2">*</span>&nbsp;<?php echo $txt[14]; ?></div></td>
                                    <td><textarea name="comments" cols="28" rows="5" id="comments"></textarea>
									<script type="text/javascript">
										var comments = new LiveValidation('comments');
										comments.add(Validate.Presence);
									</script></td>
                                  </tr>
                                  <tr>
                                    <td colspan="2"><font class=wbodytext>
                                      <input name="feedback" type="checkbox" id="feedback" value="YES">
                                      <?php echo $txt[15]; ?></font></td>
                                    </tr>
                                </table></td>
                              </tr>
                            </table></td>
                            </tr>
                          <tr>
                            <td colspan="2"></td>
                          </tr>
                          
                          <tr>
                            <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#990000">
                              <tr>
                                <td><table width="100%" border="0" bgcolor="#E6FFEE">
                                  <tr>
                                    <td colspan="2"><span class="subtitle">
                                      <label>
                                      <input type="checkbox" name="Offer" value="checked" onClick="javascript:checkOrder()">
                                      <font id="labelOffer"><?=$contacts_text[52]?></font></label></span></td>
                                    </tr>
                                  <tr>
                                    <td><font id="labelMachineType"><span id="mand4">*</span>&nbsp;<?=$contacts_text[77]?></font></td>
                                    <td><select name="MachineType" id="MachineType" onChange="SelectSupplyType();">
										  <option value="" selected><?=$contacts_text[54]?></option>
										  <option value="мотокар"><?=$contacts_text[79]?></option>
										  <option value="електрокар"><?=$contacts_text[80]?></option>
										  <option value="ретрак"><?=$contacts_text[83]?></option>
										  <option value="платформа"><?=$contacts_text[81]?></option>
										  <option value="влекач"><?=$contacts_text[82]?></option>
										</select>
										<script type="text/javascript">
											var MachineType = new LiveValidation('MachineType');
											MachineType.add(Validate.Presence);
										</script></td>
                                  </tr>
                                  <tr>
                                    <td width="50%"><font id="labelSupplyType"><span id="mand1">*</span>&nbsp;<?=$contacts_text[53]?></font></td>
                                    <td width="50%"><select name="SupplyType" id="SupplyType" onChange="SelectLoadWeights();">
													<option value="" selected><?=$contacts_text[84]?></option>
                                                    </select>
													<script type="text/javascript">
														var SupplyType = new LiveValidation('SupplyType');
														SupplyType.add(Validate.Presence);
													</script></td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelLoadWeight"><span id="mand2">*</span>&nbsp;
									<label for="MachineType" id="labelLW"><?=$contacts_text[58];?></label><span id="reduct" class="err" style="visibility:hidden">с редукция</span><br></font></td>
                                    <td><select id="LoadWeight" name="LoadWeight" onChange="SelectMaxHeights();">
											<option value="" selected><?=$contacts_text[84]?></option>
										</select>
										<script type="text/javascript">
											var LoadWeight = new LiveValidation('LoadWeight');
											LoadWeight.add(Validate.Presence);
										</script>
										</td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelMaxHeight"><span id="mand3">*</span>&nbsp;<?=$contacts_text[59]?></font></td>
                                    <td><select id="MaxHeight" name="MaxHeight" onChange="SelectSystems();">
											<option value="" selected><?=$contacts_text[84]?></option>
										</select>
										<script type="text/javascript">
											var MaxHeight = new LiveValidation('MaxHeight');
											MaxHeight.add(Validate.Presence);
										</script>
										</td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelSystem">
                                      <?=$contacts_text[66]?>
                                    </font></td>
                                    <td><select name="System">
                                      <option value="" selected>
                                        <?=$contacts_text[84]?>
                                        </option>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelLoadCenter"><?=$contacts_text[60]?></font></td>
                                    <td><select id="LoadCenter" name="LoadCenter" onChange="SelectLoadCenter();">
                                      <option value=""><?=$contacts_text[84]?></option>
                                    </select><input id="LoadCenterCustom" name="LoadCenterCustom" type="text" size="4">
                                    <script type="text/javascript">
                                    	var LoadCenterCustom = new LiveValidation('LoadCenterCustom');
										LoadCenterCustom.add(Validate.Numericality, { minimum: 501, maximum: 1200 } );
										LoadCenterCustom.add(Validate.Presence);
									</script></td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelPlatformSize"><?=$contacts_text[90]?></font></td>
                                    <td><select name="PlatformSize">
                                      <option value="" selected>
                                        <?=$contacts_text[84]?>
                                        </option>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelTyreTypes"><?=$contacts_text[63]?></font> </td>
                                    <td><select name="TyreTypes">
                                      <option value=""><?=$contacts_text[84]?></option>
                                    </select></td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelForkEqualizer"><?=$contacts_text[71]?></font></td>
                                    <td><input name="ForkEqualizer" type="text" size="24"></td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelSpecialLoads"><?=$contacts_text[62]?></font> </td>
                                    <td><textarea name="SpecialLoads" cols="22"></textarea></td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelConstructRestrictions"><?=$contacts_text[70]?></font> </td>
                                    <td><textarea name="ConstructRestrictions" cols="22"></textarea></td>
                                  </tr>
                                  <tr>
                                    <td><font id="labelOther"><?=$contacts_text[72]?></font> </td>
                                    <td><textarea name="Other" cols="22"></textarea></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                          
                          <tr>
                            <td colspan="2"><span class="style2">*</span>
                              <?=$contacts_text[88];?><br />
								<input name="verif_box" type="text" id="verif_box" />
								<img src="../verificationimage.php?<?php echo rand(0,9999);?>" alt="verification image, type it in the box" width="50" height="24" align="absbottom" /><br />
								<br />
                              <br>
								<script type="text/javascript">
									var verif_box = new LiveValidation('verif_box');
									verif_box.add( Validate.Presence );
									verif_box.add( Validate.Numericality );
									verif_box.add( Validate.Length, { is: 4 } );
								</script>
                              <br>
                              <input name="submit" type="submit" class="btns" value="<?php echo $txt[16]; ?>">
                              <input name="reset" type="reset" class="btns" value="<?php echo $txt[17]; ?>"></td>
                            </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2"></td>
                          </tr>
                      </table></td>
                    </tr>
                  </table></form></td>
              </tr>
              <tr>
                <td colspan="3" valign="top">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" valign="top">                </td>
              </tr>
              <tr>
                <td colspan="3" valign="top"></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</div>
</body>
<?php require_once("footer.php"); ?>
</html>
