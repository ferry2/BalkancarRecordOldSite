<? 
session_start();
require '../functions.php';
$uri = getUri();
setcookie("uriback", $uri , time()+86400);
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='4s_specs' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
	print "<font class=err>$noconn</font>";
    exit() ;
}

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
      <td width="799"><table width="1025" height="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="853" valign="top"><table width="850" height="520" border="0" cellpadding="5" cellspacing="5">
                <tr>
                  <td height="18" class="headerfon"><a href="forklifts.php?lang=<?=$lang?>">
                    <?=$txt[9]?>
                    </a> <font class="navnext">&gt;&gt;</font>
                    <?=$txt[10]?></td>
                </tr>
                <tr>
                  <td valign="top" class="textfon"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="3"><table width="486" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
                            <tr bgcolor="#D5E6F1">
                              <td width="193" valign="TOP"><div align="center"><?php echo $txt[0]; ?></div></td>
                              <td width="104" valign="TOP"><div align="center"><?php echo $txt[1]; ?></div></td>
                              <td valign="TOP">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#E9EEF1">
                              <td width="193" height="4" align="center"><div align="center"><?php echo $txt[2]; ?> 1998.XX.YZK&nbsp; L</div></td>
                              <td width="104" height="4" align="center"><div align="center">10000</div></td>
                              <td width="87" rowspan="2" align="center"><div align="center"><a href="<?=$specs4s;?>" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"></a><br>
                                  <a href="<?=$specs4s;?>" target="_blank"><?php echo $txt[8]; ?></a></div></td>
                            </tr>
                            <tr bgcolor="#E9EEF1">
                              <td width="193" height="22" align="center" valign="TOP"><div align="center"><?php echo $txt[2]; ?> 1999.XX.YZK&nbsp; L</div></td>
                              <td width="104" align="center" valign="TOP">12500</td>
                            </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td colspan="3"><div align="center"><br>
                                <table width="283" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="200" rowspan="3"><img src="../images/ALIM0453.jpg" width="400" height="265"></td>
                                    <td width="41" height="65" valign="top">&nbsp;</td>
                                    <td width="42" valign="top">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td height="62" valign="top">&nbsp;</td>
                                    <td valign="top">&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td valign="top">&nbsp;</td>
                                    <td valign="top">&nbsp;</td>
                                  </tr>
                                </table>
                        </div></td>
                      </tr>
                      <tr>
                        <td width="23"></td>
                        <td width="230"><div align="left"><?php echo $txt[3]; ?></div></td>
                        <td width="173"></td>
                      </tr>
                      <tr>
                        <td width="23"></td>
                        <td width="230" valign="top"><div align="left">
                          <?=$txt[4]?>
                        </div></td>
                        <td width="173" valign="top"><div align="left">
                          <?=$txt[5]?>
                        </div></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td colspan="2"><div align="left"><?php echo $txt[6]; ?></div></td>
                      </tr>
                      <tr>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                      <tr>
                        <td colspan="3" class="fontxt"><div align="left">
                          <?=$txt[7]?>
                        </div></td>
                      </tr>
                      <tr>
                        <td colspan="3">&nbsp;</td>
                      </tr>
                    </table>
                      <p>&nbsp;</p></td>
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
