<? 
session_start();
require '../functions.php';
$uri = getUri();
setcookie("uriback", $uri , time()+86400);
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='er_specs' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    //DisplayErrMsg(sprintf("internal error %d:%s\n",
    //mysql_errno(), mysql_error()));
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
            <td height="18" class="headerfon"><a href="elcars.php?lang=<?=$lang?>"><?=$txt[9]?></a> <font class="navnext">&gt;&gt;</font> <?=$txt[11]?> </td>
            </tr>
          <tr>
            <td valign="top" class="textfon"><table width="90%"  border="0" align="center" cellpadding="0" cellspacing="0">

              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><div align="left"></div></td>
              </tr>
              <tr>
                <td width="147">&nbsp;</td>
                <td width="600" colspan="-2"><table width="279" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                            <td width="186" rowspan="2"><img src="../images/Electrocar.jpg" width="400" height="283"></td>
                      <td width="47" height="62" valign="top"><a href="javascript:popUp('elcarmov.html');"><img src="../images/cam.gif" alt="x" width="30" height="30" border="0" align="top"></a></td>
                      <td width="46" valign="top"><a href="javascript:popUp('elcarmov.html');"><? echo $txt[13]; ?></a></td>
                    </tr>
                    <tr>
                      <td valign="top">&nbsp;</td>
                      <td valign="top">&nbsp;</td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><?=$er_specs_text[12]?></td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><table width="98%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3"><table width="472" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
                          <tr bgcolor="#D5E6F1">
                            <td width="231"><div align="center"><?php echo $txt[0]; ?></div></td>
                            <td width="67"><div align="center"><?php echo $txt[1]; ?></div></td>
                            <td width="65"></td>
                            <td></td>
                          </tr>
                          <tr bgcolor="#E9EEF1">
                            <td><div align="center"><?php echo $txt[2]; ?> 630.XX.YZK 
                              L </div></td>
                            <td><div align="center">1250</div></td>
                            <td rowspan="2"><div align="center"><a href="<?php echo $pref;?>specs/er_specs_1,25-1,6t.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"></a><br>
                              <a href="<?php echo $pref;?>specs/er_specs_1,25-1,6t.pdf" target="_blank"><?php echo $txt[8]; ?></a></div>
                                <div align="center"></div></td>
                            <td rowspan="2" valign="top"><?
						  if ($code!="" || $no_login_required == true){
							print "<a href=\"../ER/Introduction.htm\" target=_blank><img src=\"../images/catalogue.gif\" width=39 height=43 border=0><br>$txt[14]</a>";
						  }else{
							print "<a href=register.php?lang=$lang><img src=\"../images/catalogue.gif\" width=39 height=43 border=0><br>$txt[14]</a>";
						  }
						  ?>
                                <!--<a href="../ER/Introduction.htm" target="_blank"><img src="images/catalogue.png" width="39" height="43" border="0" /></a><a href="../ER/Introduction.htm" target="_blank"><? echo $txt[14]; ?></a> --></td>
                          </tr>
                          <tr bgcolor="#E9EEF1">
                            <td><div align="center"><?php echo $txt[2]; ?> 634.XX.YZK&nbsp; 
                              L</div></td>
                            <td><div align="center">1600</div></td>
                          </tr>
                          <tr bgcolor="#E9EEF1">
                            <td><div align="center"><?php echo $txt[2]; ?> 638.XX.YZK&nbsp; 
                              L</div></td>
                            <td><div align="center">2000</div></td>
                            <td rowspan="2"><div align="center"><a href="<?php echo $pref;?>specs/er_specs_2t.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"><br>
                            </a><a href="<?php echo $pref;?>specs/er_specs_2t.pdf" target="_blank"><?php echo $txt[8]; ?></a></div></td>
                            <td rowspan="2" valign="top"><?
						  if ($code!="" || $no_login_required == true){
							print "<a href=\"../ER-2t/Introduction.htm\" target=_blank><img src=\"../images/catalogue.gif\" width=39 height=43 border=0><br>$txt[14]</a>";
						  }else{
							print "<a href=register.php?lang=$lang><img src=\"../images/catalogue.gif\" width=39 height=43 border=0><br>$txt[14]</a>";
						  }
						  ?>
                                <!--<a href="../ER-2t/Introduction.htm" target="_blank"><img src="images/catalogue.png" width="39" height="43" border="0" /></a><a href="../ER-2t/Introduction.htm" target="_blank"><? echo $txt[14]; ?></a> --></td>
                          </tr>
                          <tr bgcolor="#E9EEF1">
                            <td><div align="center"><?php echo $txt[2]; ?> 640.XX.YZK&nbsp; 
                              L</div></td>
                            <td><div align="center">2500</div></td>
                          </tr>
                      </table></td>
                    </tr>
                    <tr>
                      <td colspan="3"><div align="center"><br>
                      </div></td>
                    </tr>
                    <tr>
                      <td width="25"></td>
                      <td width="262"><div align="left"><?php echo $txt[3]; ?></div></td>
                      <td width="272" ></td>
                    </tr>
                    <tr>
                      <td width="25"></td>
                      <td width="262" valign="top"><div align="left"><?=$er_specs_text[4]?></div></td>
                      <td width="272" valign="top"><div align="left"><?=$er_specs_text[5]?></div>
                          <br>
                          <br>
                          <br>
                          <br>                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td colspan="2"><div align="left"><?php echo $txt[6]; ?></div></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="fontxt"><?=$er_specs_text[7]?></td>
                    </tr>
                    <tr>
                      <td colspan="3">&nbsp;</td>
                    </tr>
                </table></td>
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
