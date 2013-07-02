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
            <td height="18" colspan="5" class="headerfon"><strong><?=$platforms_text[1] ?></strong></td>
            </tr>
          <tr>
            <td height="18" colspan="5" class="textfon"><div align="center"><img src="../images/platforma2.gif" alt="x" width="300" height="172">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../images/telijka_et15.jpg" width="300" height="177"></div></td>
            </tr>
          <tr>
            <td height="18" colspan="5" class="textfon"><?=$platforms_text[2]?></td>
            </tr>
          <tr>
            <td width="100" class="textfon"><div align="center"><strong><a href="<?=$pref;?>specs/record-et2.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"><br>
                      <?=$platforms_text[3]?>
  &nbsp;ET 2</a></strong></div></td>
            <td width="100" class="textfon"><div align="center"><strong><a href="<?=$pref;?>specs/record-et3.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"><br>
                      <?=$platforms_text[3]?>
  &nbsp;ET 3</a></strong></div></td>
            <td width="100" height="18" class="textfon"><div align="center"><strong><a href="<?=$pref;?>specs/record-et5.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"><br>
                      <?=$platforms_text[3]?>
  &nbsp;ET 5</a></strong></div></td>
            <td width="94" class="textfon" align="center"><div align="center"><strong><a href="<?=$pref;?>specs/record-et10.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"><br>
                      <?=$platforms_text[3]?>
  &nbsp;ET 10</a></strong><br>
            </div>              </td>
            <td width="111" class="textfon"><div align="center"><strong><a href="<?=$pref;?>specs/record-et15.pdf" target="_blank"> <img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"><br>
                      <?=$platforms_text[3]?>
  &nbsp;ET 15</a></strong></div></td>
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
