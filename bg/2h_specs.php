<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<?php
session_start();
$query = "SELECT $lang FROM lang where page='2h_specs' order by pos";
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
?>
<SCRIPT type=text/javascript>
<!--
function popUp( url ) {
	window.open( url,"",'width=320,height=260;status=no,scrollbars=no, location=no,toolbar=no,resizable=no');
}
-->
</SCRIPT>
<table width="98%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
      <table width="432" border="0" align="center" cellpadding="2" cellspacing="1" class="fontbl">
        <tr bgcolor="#FFFFFF">
          <td><div align="center"><?php echo $txt[0]; ?></div></td>
          <td><div align="center"><?php echo $txt[1]; ?></div></td>
          <td></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><div align="center"><?php echo $txt[2]; ?> 1784.XX.YZK H/FT</div></td>
          <td><div align="center">2000</div></td>
          <td><div align="center"><a href="<?php echo $pref;?>tech_large2ft.htm"><?php echo $txt[8]; ?></a></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><div align="center"><?php echo $txt[2]; ?> 1788.XX.YZK&nbsp; LH</div></td>
          <td><div align="center">3000</div></td>
          <td rowspan="2"><div align="center"><a href="<?php echo $pref;?>tech_large2H.htm"><?php echo $txt[8]; ?></a></div></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td><div align="center"><?php echo $txt[2]; ?> 1792.XX.YZK&nbsp; LH</div></td>
          <td><div align="center">3500</div></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><br>
        <table width="395" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="300"><img src="../images/2h_Otpred.gif" width="300" height="148"></td>
            <td width="95" valign="top"><a href="javascript:popUp('rh2mov.html');"><img src="../images/cam.gif" width="30" height="30" border="0" align="top"><? echo $txt[9]; ?></a></td>
          </tr>
        </table>
        
      </div></td>
  </tr>
  <tr>
    <td width="25"></td>
    <td width="262"><div align="left"><?php echo $txt[3]; ?></div></td>
    <td width="272" ></td>
  </tr>
  <tr>
    <td width="25"></td>
    <td width="262" valign="top">
      <div align="left"><?php echo $txt[4]; ?></div></td>
    <td width="272" valign="top">
      <div align="left"><?php echo $txt[5]; ?></div>
  	<br><br><br><br>
</td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><div align="left"><?php echo $txt[6]; ?></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="fontxt"><?php echo $txt[7]; ?></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
