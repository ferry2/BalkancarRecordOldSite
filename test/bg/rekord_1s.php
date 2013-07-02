<? 
require '../functions.php';
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='1s_specs' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    DisplayErrMsg(sprintf("internal error %d:%s\n",
    mysql_errno(), mysql_error()));
    exit() ;
  }

for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}

$nav = mysql_result($result, 0);
$rekord = mysql_result($result, 1);
?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div align="<?=$SITE_ALIGN?>">
<table width="1025" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="799"><table width="1025" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="520" border="0" cellpadding="5" cellspacing="5">
          <tr>
            <td height="18" class="headerfon">Рекорд 1S - спецификация </td>
            </tr>
          <tr>
            <td valign="top" class="textfon"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><table width="390" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
                    <tr bgcolor="#D5E6F1">
                      <td width="116" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[0]; ?></div></td>
                      <td width="144" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[1]; ?></div></td>
                      <td width="63" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[2]; ?></div></td>
                      <td width="46" valign="TOP">&nbsp;</td>
                    </tr>
                    <tr bgcolor="#E9EEF1">
                      <td width="116" height="4" align="center"><div align="center"><?php echo $txt[3]; ?> M630.XX.YZK&nbsp; L</div></td>
                      <td width="144" height="4" align="center"><div align="center"><?php echo $txt[4]; ?> M630.XX.YZK&nbsp; L</div></td>
                      <td width="63" height="4" align="center"><div align="center">1250</div></td>
                      <td width="46" rowspan="4" align="center"><a href="<?php echo $pref;?>specs/1s_specs.pdf" target="_blank"><?php echo $txt[10]; ?><img src="../images/pdf.jpg" alt="1" width="24" height="25" border="0"></a></td>
                    </tr>
                    <tr bgcolor="#E9EEF1">
                      <td width="116" align="center" valign="TOP"><?php echo $txt[3]; ?> M632.XX.YZK&nbsp; L </td>
                      <td width="144" align="center" valign="TOP"><?php echo $txt[4]; ?> M632.XX.YZK&nbsp; L </td>
                      <td width="63" align="center" valign="TOP"> 1500</td>
                    </tr>
                    <tr bgcolor="#E9EEF1">
                      <td width="116" align="center"><div align="center"><?php echo $txt[3]; ?> M636.XX.YZK&nbsp; L</div></td>
                      <td width="144" align="center"><div align="center"><?php echo $txt[4]; ?> M636.XX.YZK&nbsp; L</div></td>
                      <td width="63" align="center"><div align="center">1750</div></td>
                    </tr>
                    <tr bgcolor="#E9EEF1">
                      <td width="116" align="center"><div align="center"><?php echo $txt[3]; ?> M638.XX.YZK&nbsp; L</div></td>
                      <td width="144" align="center"><div align="center"><?php echo $txt[4]; ?> M638.XX.YZK&nbsp; L</div></td>
                      <td width="63" align="center"><div align="center">2000</div></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center"><br>
                        <table width="283" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="200" rowspan="3"><img src="../images/3&4dupe_crop.gif" alt="1" width="200" height="184"></td>
                            <td width="41" height="65" valign="top"><a href="javascript:popUp('r1smov.html');"><img src="../images/cam.gif" alt="1" width="30" height="30" border="0" align="top"></a></td>
                            <td width="42" valign="top"><a href="javascript:popUp('r1smov.html');"><? echo $txt[11]; ?></a></td>
                          </tr>
                          <tr>
                            <td height="62" valign="top"><img src="images/catalogue.png" alt="1" width="39" height="43" border="0" /></td>
                            <td valign="top"><?
			  if ($code!=""){
				print "<a href=\"../s1/RECORD  1S.htm\" target=_blank>$txt[12]</a>";
			  }else{
				print "<a href=register.php?lang=$lang&model=1S&index=1>$txt[12]</a>";
			  }
			  ?>
                            </td>
                          </tr>
                          <tr>
                            <td valign="top"><img src="images/catalogue.png" alt="1" width="39" height="43" border="0" /></td>
                            <td valign="top"><?
			  if ($code!=""){
				print "<a href=\"../s1-vw/Tupe lift trucks.htm\" target=_blank>$txt[13]</a>";
			  }else{
				print "<a href=register.php?lang=$lang&model=1S&index=2>$txt[13]</a>";
			  }
			  ?>
                            </td>
                          </tr>
                        </table>
                </div></td>
              </tr>
              <tr>
                <td width="23"></td>
                <td width="230"><div align="left"><?php echo $txt[5]; ?></div></td>
                <td width="173"></td>
              </tr>
              <tr>
                <td width="23"></td>
                <td width="230" valign="top"><div align="left"><?php echo $txt[6]; ?></div></td>
                <td width="173" valign="top"><div align="left"><?php echo $txt[7]; ?><br>
                </div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><div align="left"><?php echo $txt[8]; ?></div></td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" class="fontxt"><div align="left"><?php echo $txt[9]; ?></div></td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
            </table>              <p>&nbsp;</p></td>
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
