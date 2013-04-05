<?php
$uri = $_SERVER["PHP_SELF"];

switch ($lang){
	case 'bg':
	  $map = 'Map.gif';
	break;
	case 'en':
	  $map = 'Map_en.gif';
	break;
	case 'ru':
	  $map = 'Map_ru.gif';
	break;
}

?>
<HTML>
<HEAD>
<TITLE>Map</TITLE>
</HEAD>
<BODY>
<!--<a target='_blank' href='http://www.bgmaps.com/services/links/links.asp?linkkey=c696a12b1a6b53489bdb50a3fc4211cb'><img src='../images/bgmap.gif' border=0></a> -->
<img src="../images/<?=$map?>" width="408" height="400">
</BODY>
</HTML>
