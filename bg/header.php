<?php
$uri = $_SERVER["PHP_SELF"];

switch ($lang){
	case 'bg':
		$top = 'NieSpodeliameBG.gif';
	  	$aboutus = 'ZaNas1.gif';
		$aboutus_up = 'ZaNas2.gif';
		$forks = 'Motokari1.gif';
		$forks_up = 'Motokari2.gif';
		$electro = 'Elektro1.gif';
		$electro_up = 'Elektro2.gif';
		$tows = 'Vlekachi1.gif';
		$tows_up = 'Vlekachi2.gif';
		$contacts = 'Kontakti1.gif';
		$contacts_up = 'Kontakti2.gif';
		$handsys='Ruchno1.gif';
		$handsys_up='Ruchno2.gif';
		$cert='Sertifikati1.gif';
		$cert_up='Sertifikati2.gif';
		$ads='Obiawi1.gif';
		$ads_up='Obiawi2.gif';
		$noconn='Прекалено голямо натоварване на сървъра, моля опитайте пак!';
		include("text_bg.php");
		$kg='кг';
		$specs4s = 'motokar_4s.pdf';
		break;

	case 'en':
		$top = 'TOP.gif';
	  	$aboutus = 'About-Us.gif';
		$aboutus_up = 'About-Us-over.gif';
		$forks = 'IC-Engin.gif';
		$forks_up = 'IC-Engin-over.gif';
		$electro = 'Electro.gif';
		$electro_up = 'Electro-over.gif';
		$tows = 'Taw.gif';
		$tows_up = 'Taw-over.gif';
		$contacts = 'Contacts.gif';
		$contacts_up = 'Contacts-over.gif';
		$handsys='Handling.gif';
		$handsys_up='Handling-over.gif';
		$cert='Certificates.gif';
		$cert_up='Certificates-over.gif';
		$ads='Ads1.gif';
		$ads_up='Ads2.gif';
		$noconn='There is a problem with connecting to the database server. Please, try again!';
		include("text_en.php");
		$kg='kg';
		$specs4s = 'forklift_4s.pdf';
	break;

	case 'ru':
		$top = 'TOP_R.gif';
	  	$aboutus = 'DliaNas1.gif';
		$aboutus_up = 'DliaNas2.gif';
		$forks = 'Pogruzchiki1.gif';
		$forks_up = 'Pogruzchiki2.gif';
		$electro = 'El_Pogruzchiki1.gif';
		$electro_up = 'El_Pogruzchiki2.gif';
		$tows = 'Avtotiagachi1.gif';
		$tows_up = 'Avtotiagachi2.gif';
		$contacts = 'Kontakti1_ru.gif';
		$contacts_up = 'Kontakti2_ru.gif';
		$handsys='Samohod1.gif';
		$handsys_up='Samohod2.gif';
		$cert='Sertifikati1_ru.gif';
		$cert_up='Sertifikati2_ru.gif';
		$ads='Obiavlenia1.gif';
		$ads_up='Obiavlenia2.gif';
		$noconn='Плохие условия связи сърварами. Попробуйте пак, пожалустя!';
		include("text_ru.php");
		$kg='кг';
		$specs4s = 'pogruzchik_4s_ru.pdf';
	break;
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="../style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
<!--

function newImage(arg) {
	if (document.images) {
		rslt = new Image();
		rslt.src = arg;
		return rslt;
	}
}

function changeImages() {
	if (document.images && (preloadFlag == true)) {
		for (var i=0; i<changeImages.arguments.length; i+=2) {
			document[changeImages.arguments[i]].src = changeImages.arguments[i+1];
		}
	}
}

var preloadFlag = false;
function preloadImages() {
	if (document.images) {
		BG_over = newImage("images/BG-over.gif");
		About_Us_over = newImage("images/About-Us-over.jpg");
		IC_Engine_over = newImage("images/IC-Engine-over.jpg");
		Electro_over = newImage("images/Electro-over.jpg");
		TAW_over = newImage("images/TAW-over.jpg");
		Handling_over = newImage("images/Handling-over.jpg");
		Certificates_over = newImage("images/Certificates-over.jpg");
		Contacts_over = newImage("images/Contacts-over.jpg");
		EN_over = newImage("images/EN-over.gif");
		RU_over = newImage("images/RU-over.gif");
		About_Us_over027 = newImage("images/About-Us-over.gif");
		IC_Engin_over = newImage("images/IC-Engin-over.gif");
		Electro_over031 = newImage("images/Electro-over.gif");
		Taw_over = newImage("images/Taw-over.gif");
		Handling_over035 = newImage("images/Handling-over.gif");
		Certificates_over037 = newImage("images/Certificates-over.gif");
		Contacts_over039 = newImage("images/Contacts-over.gif");
		AboutUsButton_over = newImage("images/AboutUsButton-over.gif");
		DealersButton_over = newImage("images/DealersButton-over.gif");
		OurCertificates_over = newImage("images/OurCertificates-over.gif");
		Flags_01_over = newImage("images/Flags_01-over.gif");
		Flags_02_over = newImage("images/Flags_02-over.gif");
		Flags_03_over = newImage("images/Flags_03-over.gif");
		preloadFlag = true;
	}
}

// -->
</script>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	width:182px;
	height:30px;
	z-index:1;
	left: 450px;
	top: 16px;
	overflow: visible;
}
-->
</style>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="preloadImages();">
<!--<script type="text/javascript" src="../snow.js"></script> -->
<table width="1025" height="" border="0" align="<?=$SITE_ALIGN?>" cellpadding="0" cellspacing="0" id="Table_01">
  <tr>
    <td colspan="13"><img src="images/<?=$top;?>" width="1024" height="165" alt="">
    <!--<div id="apDiv1"><img src="images/snowhat.gif" alt="snowhat" width="160" height="20"></div> --></td>
    <td><img src="images/spacer.gif" width="1" height="160" alt=""></td>
  </tr>
  <tr>
    <td width="1024" height="15" colspan="13" bgcolor="#D6F2FF"><img src="images/spacer.gif" width="1024" height="15" alt=""></td>
    <td><img src="images/spacer.gif" width="1" height="15" alt=""></td>
  </tr>
  <?
  //echo $uri;
  if (substr($uri, -11) != "aboutus.php")
  	print "<!--";
  ?>
  <tr>
    <td><a href="<?php $_SERVER["PHP_SELF"];?>?lang=bg"
				onmouseover="changeImages('BG', 'images/BG-over.gif'); return true;"
				onmouseout="changeImages('BG', 'images/BG.gif'); return true;"
				onmousedown="changeImages('BG', 'images/BG-over.gif'); return true;"
				onmouseup="changeImages('BG', 'images/BG-over.gif'); return true;"> <img name="BG" src="images/BG.gif" width="127" height="23" border="0"></a></td>
    <td colspan="2" rowspan="3"><a href="aboutus.php?lang=<?=$lang;?>"
				onmouseover="changeImages('About_Us', 'images/About-Us-over.jpg'); return true;"
				onmouseout="changeImages('About_Us', 'images/About-Us.jpg'); return true;"
				onmousedown="changeImages('About_Us', 'images/About-Us-over.jpg'); return true;"
				onmouseup="changeImages('About_Us', 'images/About-Us-over.jpg'); return true;"> <img name="About_Us" src="images/About-Us.jpg" width="110" height="66" border="0" alt="aboutus.php?lang=<?=$lang;?>"></a></td>
    <td rowspan="3"><a href="forklifts.php?lang=<?=$lang;?>"
				onmouseover="changeImages('IC_Engine', 'images/IC-Engine-over.jpg'); return true;"
				onmouseout="changeImages('IC_Engine', 'images/IC-Engine.jpg'); return true;"
				onmousedown="changeImages('IC_Engine', 'images/IC-Engine-over.jpg'); return true;"
				onmouseup="changeImages('IC_Engine', 'images/IC-Engine-over.jpg'); return true;"> <img name="IC_Engine" src="images/IC-Engine.jpg" width="110" height="66" border="0" alt="forklifts.php?lang=<?=$lang;?>"></a></td>
    <td rowspan="3"><a href="elcars.php?lang=<?=$lang;?>"
				onmouseover="changeImages('Electro', 'images/Electro-over.jpg'); return true;"
				onmouseout="changeImages('Electro', 'images/Electro.jpg'); return true;"
				onmousedown="changeImages('Electro', 'images/Electro-over.jpg'); return true;"
				onmouseup="changeImages('Electro', 'images/Electro-over.jpg'); return true;"> <img name="Electro" src="images/Electro.jpg" width="110" height="66" border="0" alt="elcars.php?lang=<?=$lang;?>"></a></td>
    <td colspan="2" rowspan="3"><a href="tows.php?lang=<?=$lang;?>"
				onmouseover="window.status='tows.php?lang=<?=$lang;?>'; changeImages('TAW', 'images/TAW-over.jpg'); return true;"
				onmouseout="window.status=''; changeImages('TAW', 'images/TAW.jpg'); return true;"
				onmousedown="changeImages('TAW', 'images/TAW-over.jpg'); return true;"
				onmouseup="changeImages('TAW', 'images/TAW-over.jpg'); return true;"> <img name="TAW" src="images/TAW.jpg" width="110" height="66" border="0" alt="tows.php?lang=<?=$lang;?>"></a></td>
    <td rowspan="3"><a href="platforms.php?lang=<?=$lang;?>" 
				onmouseover="window.status='platforms.php?lang=<?=$lang;?>'; changeImages('Handling', 'images/Handling-over.jpg'); return true;"
				onmouseout="window.status=''; changeImages('Handling', 'images/Handling.jpg'); return true;"
				onmousedown="changeImages('Handling', 'images/Handling-over.jpg'); return true;"
				onmouseup="changeImages('Handling', 'images/Handling-over.jpg'); return true;"> <img name="Handling" src="images/Handling.jpg" width="110" height="66" border="0" alt="platforms.php?lang=<?=$lang;?>"></a></td>
    <td colspan="2" rowspan="3"><a href="cert.php?lang=<?=$lang;?>"
				onmouseover="window.status='cert.php?lang=<?=$lang;?>'; changeImages('Certificates', 'images/Certificates-over.jpg'); return true;"
				onmouseout="window.status=''; changeImages('Certificates', 'images/Certificates.jpg'); return true;"
				onmousedown="changeImages('Certificates', 'images/Certificates-over.jpg'); return true;"
				onmouseup="changeImages('Certificates', 'images/Certificates-over.jpg'); return true;"> <img name="Certificates" src="images/Certificates.jpg" width="110" height="66" border="0" alt=""></a></td>
    <td colspan="2" rowspan="3"><a href="ndocs.php?lang=<?=$lang;?>"
				onMouseOver="window.status='ndocs.php?lang=<?=$lang;?>'; changeImages('Ads', 'images/ObiawiBig2.jpg'); return true;"
				onMouseOut="window.status=''; changeImages('Ads', 'images/ObiawiBig1.jpg'); return true;"
				onMouseDown="changeImages('Ads', 'images/ObiawiBig1.jpg'); return true;"
				onMouseUp="changeImages('Ads', 'images/ObiawiBig1.jpg'); return true;"><img name="Ads" src="images/ObiawiBig1.jpg" width="110" height="66" border="0" alt=""></a></td>
    <td rowspan="3" bgcolor="#D6F2FF"><a href="contacts.php?lang=<?=$lang;?>"
				onMouseOver="window.status='contacts.php?lang=<?=$lang;?>'; changeImages('Contacts', 'images/Contacts-over.jpg'); return true;"
				onMouseOut="window.status=''; changeImages('Contacts', 'images/Contacts.jpg'); return true;"
				onMouseDown="changeImages('Contacts', 'images/Contacts-over.jpg'); return true;"
				onMouseUp="changeImages('Contacts', 'images/Contacts-over.jpg'); return true;"><img name="Contacts" src="images/Contacts.jpg" width="110" height="66" border="0" alt=""></a></td>
    <td><img src="images/spacer.gif" width="1" height="23" alt=""></td>
  </tr>
  <tr>
    <td><a href="<?php $_SERVER["PHP_SELF"];?>?lang=en"
				onmouseover="changeImages('EN', 'images/EN-over.gif'); return true;"
				onmouseout="changeImages('EN', 'images/EN.gif'); return true;"
				onmousedown="changeImages('EN', 'images/EN-over.gif'); return true;"
				onmouseup="changeImages('EN', 'images/EN-over.gif'); return true;"> <img name="EN" src="images/EN.gif" width="127" height="18" border="0"></a></td>
    <td><img src="images/spacer.gif" width="1" height="18" alt=""></td>
  </tr>
  <tr>
    <td><a href="<?php $_SERVER["PHP_SELF"];?>?lang=ru"
				onmouseover="changeImages('RU', 'images/RU-over.gif'); return true;"
				onmouseout="changeImages('RU', 'images/RU.gif'); return true;"
				onmousedown="changeImages('RU', 'images/RU-over.gif'); return true;"
				onmouseup="changeImages('RU', 'images/RU-over.gif'); return true;"> <img name="RU" src="images/RU.gif" width="127" height="25" border="0"></a></td>
    <td><img src="images/spacer.gif" width="1" height="25" alt=""></td>
  </tr>
  <tr>

    <td colspan="13"><img src="images/Line2.gif" width="1024" height="11" alt=""></td>
    <td><img src="images/spacer.gif" width="1" height="11" alt=""></td>
  </tr>
  <?
  if (substr($uri, -11) != "aboutus.php")
  	print "-->";
  ?>
  <tr>
    <td>
	  <?
	  if (substr($uri, -11) != "aboutus.php"){
echo <<<HTML
<table id="Table_01" width="127" height="22" border="0" cellpadding="0" cellspacing="0">
<tr> 
<td>
<a href="$uri?lang=bg"
onmouseover="changeImages('Flags_01', 'images/Flags_01-over.gif'); return true;"
onmouseout="changeImages('Flags_01', 'images/Flags_01.gif'); return true;"
onmousedown="changeImages('Flags_01', 'images/Flags_01-over.gif'); return true;"
onmouseup="changeImages('Flags_01', 'images/Flags_01-over.gif'); return true;">
<img name="Flags_01" src="images/Flags_01.gif" width="44" height="22" border="0" alt=""></a></td>
<td>
<a href="$uri?lang=en"
onmouseover="changeImages('Flags_02', 'images/Flags_02-over.gif'); return true;"
onmouseout="changeImages('Flags_02', 'images/Flags_02.gif'); return true;"
onmousedown="changeImages('Flags_02', 'images/Flags_02-over.gif'); return true;"
onmouseup="changeImages('Flags_02', 'images/Flags_02-over.gif'); return true;">
<img name="Flags_02" src="images/Flags_02.gif" width="38" height="22" border="0" alt=""></a></td>
<td>
<a href="$uri?lang=ru"
onmouseover="changeImages('Flags_03', 'images/Flags_03-over.gif'); return true;"
onmouseout="changeImages('Flags_03', 'images/Flags_03.gif'); return true;"
onmousedown="changeImages('Flags_03', 'images/Flags_03-over.gif'); return true;"
onmouseup="changeImages('Flags_03', 'images/Flags_03-over.gif'); return true;">
<img name="Flags_03" src="images/Flags_03.gif" width="45" height="22" border="0" alt=""></a></td>
</tr>
</table>
HTML;
	  		
	  } else {
	  		print"<img src=\"images/ButtonLineLeft.gif\" width=\"127\" height=\"22\" alt=\"\">";
	  }
	  ?>	</td>
    <td colspan="2"><a href="aboutus.php?lang=<?=$lang;?>"
				onmouseover="window.status='aboutus.php?lang=<?=$lang;?>'; changeImages('About_Us026', 'images/<?=$aboutus_up;?>'); return true;"
				onmouseout="window.status=''; changeImages('About_Us026', 'images/<?=$aboutus;?>'); return true;"
				onmousedown="changeImages('About_Us026', 'images/<?=$aboutus_up;?>'); return true;"
				onmouseup="changeImages('About_Us026', '<?=$aboutus_up;?>'); return true;"> <img name="About_Us026" src="images/<?=$aboutus;?>" width="110" height="22" border="0" alt=""></a></td>
    <td><a href="forklifts.php?lang=<?=$lang;?>"
				onmouseover="window.status='forklifts.php?lang=<?=$lang;?>'; changeImages('IC_Engin', 'images/<?=$forks_up;?>'); return true;"
				onmouseout="window.status=''; changeImages('IC_Engin', 'images/<?=$forks;?>'); return true;"
				onmousedown="changeImages('IC_Engin', 'images/<?=$forks_up;?>'); return true;"
				onmouseup="changeImages('IC_Engin', 'images/<?=$forks_up;?>'); return true;"> <img name="IC_Engin" src="images/<?=$forks;?>" width="110" height="22" border="0" alt=""></a></td>
    <td><a href="elcars.php?lang=<?=$lang;?>"
				onmouseover="window.status='elcars.php?lang=<?=$lang;?>'; changeImages('Electro030', 'images/<?=$electro_up;?>'); return true;"
				onmouseout="window.status=''; changeImages('Electro030', 'images/<?=$electro;?>'); return true;"
				onmousedown="changeImages('Electro030', 'images/<?=$electro_up;?>'); return true;"
				onmouseup="changeImages('Electro030', 'images/<?=$electro_up;?>'); return true;"> <img name="Electro030" src="images/<?=$electro;?>" width="110" height="22" border="0" alt=""></a></td>
    <td colspan="2"><a href="tows.php?lang=<?=$lang;?>"
				onmouseover="window.status='tows.php?lang=<?=$lang;?>'; changeImages('Taw', 'images/<?=$tows_up;?>'); return true;"
				onmouseout="window.status=''; changeImages('Taw', 'images/<?=$tows;?>'); return true;"
				onmousedown="changeImages('Taw', 'images/<?=$tows_up;?>'); return true;"
				onmouseup="changeImages('Taw', 'images/<?=$tows_up;?>'); return true;"> <img name="Taw" src="images/<?=$tows;?>" width="110" height="22" border="0" alt=""></a></td>
    <td><a href="platforms.php?lang=<?=$lang;?>"
				onmouseover="window.status='r-record.com/Scatalogue2005.pdf'; changeImages('Handling034', 'images/<?=$handsys_up;?>'); return true;"
				onmouseout="window.status=''; changeImages('Handling034', 'images/<?=$handsys;?>'); return true;"
				onmousedown="changeImages('Handling034', 'images/<?=$handsys_up;?>'); return true;"
				onmouseup="changeImages('Handling034', 'images/<?=$handsys_up;?>'); return true;"> <img name="Handling034" src="images/<?=$handsys;?>" width="110" height="22" border="0" alt=""></a></td>
    <td colspan="2"><a href="cert.php?lang=<?=$lang;?>"
				onmouseover="window.status='cert.php?lang=<?=$lang;?>'; changeImages('Certificates036', 'images/<?=$cert_up;?>'); return true;"
				onmouseout="window.status=''; changeImages('Certificates036', 'images/<?=$cert;?>'); return true;"
				onmousedown="changeImages('Certificates036', 'images/<?=$cert_up;?>'); return true;"
				onmouseup="changeImages('Certificates036', 'images/<?=$cert_up;?>'); return true;"
				onclick="changeImages('Certificates036', 'images/<?=$cert;?>');"> <img name="Certificates036" src="images/<?=$cert;?>" width="110" height="22" border="0" alt=""></a></td>
    <td colspan="2"><a href="ndocs.php?lang=<?=$lang;?>"
				onMouseOver="window.status='ndocs.php?lang=<?=$lang;?>'; changeImages('Ads038', 'images/<?=$ads_up;?>'); return true;"
				onMouseOut="window.status=''; changeImages('Ads038', 'images/<?=$ads;?>'); return true;"
				onMouseDown="changeImages('Ads038', 'images/<?=$ads_up;?>'); return true;"
				onMouseUp="changeImages('Ads038', 'images/<?=$ads_up;?>'); return true;"><img name="Ads038" src="images/<?=$ads;?>" width="110" height="22" border="0" alt=""></a></td>
    <td bgcolor="#D6F2FF"><a href="contacts.php?lang=<?=$lang;?>"
				onMouseOver="window.status='contacts.php?lang=<?=$lang;?>'; changeImages('Contacts038', 'images/<?=$contacts_up;?>'); return true;"
				onMouseOut="window.status=''; changeImages('Contacts038', 'images/<?=$contacts;?>'); return true;"
				onMouseDown="changeImages('Contacts038', 'images/<?=$contacts_up;?>'); return true;"
				onMouseUp="changeImages('Contacts038', 'images/<?=$contacts_up;?>'); return true;"><img name="Contacts038" src="images/<?=$contacts;?>" width="110" height="22" border="0" alt=""></a></td>
    <td><img src="images/spacer.gif" width="1" height="22" alt=""></td>
  </tr>
  <tr>
    <td colspan="13" valign="top"><img src="images/LineUnderButton.gif" width="1024" height="4" alt=""></td>
    <td><img src="images/spacer.gif" width="1" height="11" alt=""></td>
  </tr>
  <tr>
    <td height="2"><img src="images/spacer.gif" width="127" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="63" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="47" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="110" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="110" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="60" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="50" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="110" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="10" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="100" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="65" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="45" height="1" alt=""></td>
    <td><img src="images/spacer.gif" width="127" height="1" alt=""></td>
    <td></td>
  </tr>
</table>
