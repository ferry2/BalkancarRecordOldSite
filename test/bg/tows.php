<? 
session_start();
require '../functions.php';
$uri = getUri();
setcookie("uriback", $uri , time()+86400);
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='tows' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    //DisplayErrMsg(sprintf("internal error %d:%s\n",
    //mysql_errno(), mysql_error()));
	print "<font class=err>$noconn</font>";
	exit() ;
  }

//get all texts from database and put it in variables
for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}

$no_login_required = false;
if  ($GLOBALS['REMOTE_ADDR'] == $NOLOGINIP)
	$no_login_required = true;
	
?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../popup.js"></script>
</head>
<body>
<div align="<?=$SITE_ALIGN?>">
<table width="1025" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="799"><table width="1025" height="75%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="97" border="0" cellpadding="5" cellspacing="5">
          <tr>
            <td height="18" colspan="2" class="headerfon"><strong><?php echo $txt[2]; ?> 1528,1530,1532 (.2 &amp; .3) </strong></td>
            <td width="431" class="headerfon"><?php echo $txt[8]; ?></td>
            </tr>
          <tr>
            <td height="18" colspan="2" class="textfon"><table width="347"  border="0" align="center" cellpadding="0" cellspacing="0">
              
              <tr>
                <td width="96">&nbsp;</td>
                <td width="108" colspan="-2" valign="top">&nbsp;</td>
                <td width="96" colspan="2"><img src="../images/wlcopy.jpg" alt="x" width="200" height="204"></td>
                <td width="200" valign="top"><a href="javascript:popUp('dt1.html');"><img src="../images/cam.gif" alt="x" width="30" height="30" border="0" align="top"><br>
                      <? echo $txt[5]; ?></a></td>
              </tr>
              
            </table></td>
            <td height="18" class="textfon"><table width="347"  border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="96">&nbsp;</td>
                <td width="108" colspan="-2" valign="top">&nbsp;</td>
                <td width="96" colspan="2"><img src="../images/RECORD_DT_1528.4_rear.gif" width="200" height="176"></td>
                <td width="200" valign="top"><a href="javascript:popUp('dt1.html');"><img src="../images/cam.gif" alt="x" width="30" height="30" border="0" align="top"><br>
                      <? echo $txt[5]; ?></a></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" colspan="2" class="textfon"><?=$tows_text[3]?></td>
            <td valign="top" class="textfon"><?=$tows_text[9]?></td>
            </tr>
          <tr>
            <td width="193" height="18" class="textfon"><div align="center"><strong><a href="<? echo $pref; ?>specs/dt_specs_1528.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"></a><br>
                  <a href="<?=$pref;?>specs/dt_specs_1528.pdf">
                      <?=$txt[4]?>
                  </a></strong></div></td>
            <td width="176" class="textfon" align="center"><img src="../images/catalogue.gif" width="39" height="43"><br>
              <?
			  if ($code!="" || $no_login_required == true){
				print "<a href=\"../dt-et/Introduction-dt.htm\" target=_blank><b>$txt[10]</b></a>";
			  }else{
				print "<a href=register.php?lang=$lang><b>$txt[10]</b></a>";
			  }
			  ?></td>
            <td class="textfon"><div align="center"><strong><a href="et-ac-<?=$lang;?>.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"></a><br>
                    <a href="et-ac-<?=$lang;?>.pdf">
                      <?=$txt[4]?>
                  </a></strong></div></td>
            </tr>
        </table></td>
        <td width="172" valign="top"><?php include("rside.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</body>
<?php require_once("footer.php"); ?>
</html>
