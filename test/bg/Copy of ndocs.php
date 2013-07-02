<? 
require '../functions.php';
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='ndocs' order by pos";
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
<link href="../style.css" rel="stylesheet" type="text/css">
<SCRIPT type=text/javascript>
<!--
function popUp( url ) {
	window.open( url,"",'width=630,status=no,scrollbars=yes, location=no,toolbar=no,resizable=no');
}
-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div align="<?=$SITE_ALIGN?>">
<table width="1025" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="799"><table width="1025" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="493" border="0" cellpadding="5" cellspacing="5">
          <tr>
            <td height="18" class="headerfon">Нормативни документи </td>
            </tr>
          <tr>
            <td height="450" valign="top" class="textfon">




</td>
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
