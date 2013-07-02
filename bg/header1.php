<?php
$uri = $_SERVER["PHP_SELF"];

switch ($lang){
	case 'bg':
	  $aboutus = 'za-nas1.gif';
		$aboutus_up = 'za-nas2.gif';
		$forks = 'motokari1.gif';
		$forks_up = 'motokari2.gif';
		$electro = 'elektro1.gif';
		$electro_up = 'elektro2.gif';
		$tows = 'vlekachi1.gif';
		$tows_up = 'vlekachi2.gif';
		$contacts = 'za-kontakti1.gif';
		$contacts_up = 'za-kontakti2.gif';
		$handsys='RychnoVodimi2.gif';
		break;

	case 'en':
	  $aboutus = 'AboutUs1.gif';
		$aboutus_up = 'AboutUs2.gif';
		$forks = 'Forklifts1.gif';
		$forks_up = 'Forklifts2.gif';
		$electro = 'Electric1.gif';
		$electro_up = 'Electric2.gif';
		$tows = 'TowTractors1.gif';
		$tows_up = 'TowTractors2.gif';
		$contacts = 'Contacts1.gif';
		$contacts_up = 'Contacts2.gif';
		$handsys='HandlingSystems1.gif';
	break;

	case 'ru':
	  $aboutus = 'DlqNas1.gif';
		$aboutus_up = 'DlqNas2.gif';
		$forks = 'Pogruz1.gif';
		$forks_up = 'Pogruz2.gif';
		$electro = 'El.pogruz1.gif';
		$electro_up = 'El.pogruz2.gif';
		$tows = 'Avtotqga4i1.gif';
		$tows_up = 'Avtotqga4i2.gif';
		$contacts = 'Kontakti1.gif';
		$contacts_up = 'Kontakti2.gif';
		$handsys='Samohodni2.gif';
	break;
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
<!--
body {
	margin-left: 0px;
}
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<body onLoad="MM_preloadImages('../images/$aboutus_up','../images/$forks_up','../images/$electro_up','../images/$tows_up','../images/$contacts_up','../images/<? echo $aboutus_up;?>')">
<a name="begin"></a> 
<table width="750" height="65" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="blackBorder">
  <tr>
    <td width="229" height="65" valign="top"><img src="../images/main1.jpg" width="248" height="40" border="0" usemap="#Map2"><img src="../images/main2.jpg" width="248" height="25" border="0" usemap="#Map"></td>
    <td width="521" height="65" valign="top"><img src="../images/main3.jpg" width="500" height="40">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="18%"><a href="aboutus.php?lang=<? echo $lang;?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','../images/<? echo $aboutus_up;?>',1)"><img src="../images/<? echo (strstr($uri, 'aboutus')) ? $aboutus_up : $aboutus; ?>" name="Image4" border="0"></a></td>
          <td width="16%"><a href="forklifts.php?lang=<? echo $lang;?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','../images/<? echo $forks_up;?>',1)"><img src="../images/<? echo (strstr($uri, 'forklifts')) ? $forks_up : $forks; ?>" name="Image5" border="0"></a></td>
          <td width="17%"><a href="elcars.php?lang=<? echo $lang;?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','../images/<? echo $electro_up;?>',1)"><img src="../images/<? echo (strstr($uri, 'elcars')) ? $electro_up : $electro; ?>" name="Image6" border="0"></a></td>
          <td width="16%"><a href="tows.php?lang=<? echo $lang;?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','../images/<? echo $tows_up;?>',1)"><img src="../images/<? echo (strstr($uri, 'tows')) ? $tows_up : $tows; ?>" name="Image7" border="0"></a></td>
          <td width="33%"><a href="contacts.php?lang=<? echo $lang;?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','../images/<? echo $contacts_up;?>',1)"><img src="../images/<? echo (strstr($uri, 'contacts')) ? $contacts_up : $contacts; ?>" name="Image8" border="0"></a></td>
          <td width="33%" valign="top"><img src="../images/main4.jpg" width="63" height="8"></td>
        </tr>
        <tr>
          <td><a href="aboutus.php?lang=<? echo $lang;?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image41','','../images/<? echo $aboutus_up;?>',1)"><img src="../images/<? echo $handsys; ?>" name="Image41" border="0" id="Image41"></a></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td valign="top">&nbsp;</td>
        </tr>
      </table>    </td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="3,9,33,23" href="<?php $_SERVER["PHP_SELF"];?>?lang=bg">
  <area shape="rect" coords="43,9,73,23" href="<?php $_SERVER["PHP_SELF"];?>?lang=en">
  <area shape="rect" coords="83,10,113,22" href="<?php $_SERVER["PHP_SELF"];?>?lang=ru">
</map>
<map name="Map2">
  <area shape="rect" coords="8,3,124,41" href="../index.php?lang=<?php echo $lang; ?>">
</map>
