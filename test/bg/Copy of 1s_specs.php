<? 
session_start();
require '../functions.php';
$uri = getUri();
setcookie("uriback", $uri , time()+86400);
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='1s_specs' order by pos";
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
            <td height="18" class="headerfon"><a href="forklifts.php?lang=<?=$lang?>"><?=$txt[14]?></a> <font class="navnext">&gt;&gt;</font> <?=$txt[15]?> </td>
            </tr>
          <tr>
            <td valign="top" class="textfon"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3"><table width="611" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
                            <tr bgcolor="#D5E6F1"> 
                              <td width="115" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[0]; ?></div></td>
                              <td width="142" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[1]; ?></div></td>
                              <td width="61" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[2]; ?></div></td>
                              <td colspan="3" valign="TOP">&nbsp;</td>
                            </tr>
                            <tr bgcolor="#E9EEF1"> 
                              <td width="115" height="4" align="center"><div align="center"><?php echo $txt[3]; ?> 
                                  M630.XX.YZK&nbsp; L</div></td>
                              <td width="142" height="4" align="center"><div align="center"><?php echo $txt[4]; ?> 
                                  M630.XX.YZK&nbsp; L</div></td>
                              <td width="61" height="4" align="center"><div align="center">1250</div></td>
                              <td width="85" rowspan="4" align="center"><a href="<?php echo $pref;?>specs/1s_specs.pdf" target="_blank"><img src="../images/PDF_Icon.gif" alt="1" width="30" height="28" border="0"></a><br><a href="<?php echo $pref;?>specs/1s_specs.pdf" target="_blank"><?php echo $txt[10]; ?></a></td>
                              <td width="85" rowspan="4" align="center"><img src="../images/catalogue.gif" width="39" height="43">
                                <br>
                                <?
			  if ($code!="" || $no_login_required == true){
				print "<a href=\"../s1/RECORD  1S.htm\" target=_blank>$txt[12]</a>";
			  }else{
				print "<a href=register.php?lang=$lang>$txt[12]</a>";
			  }
			  ?>                              </td>
                              <td width="85" rowspan="4" align="center"><img src="../images/catalogue.gif" width="39" height="43"><br>
                                <?
			  if ($code!="" || $no_login_required == true){
				print "<a href=\"../s1-vw/Tupe lift trucks.htm\" target=_blank>$txt[13]</a>";
			  }else{
				print "<a href=register.php?lang=$lang>$txt[13]</a>";
			  }
			  ?>                              </td>
                            </tr>
                            <tr bgcolor="#E9EEF1"> 
                              <td width="115" align="center" valign="TOP"><?php echo $txt[3]; ?> 
                                M632.XX.YZK&nbsp; L </td>
                              <td width="142" align="center" valign="TOP"><?php echo $txt[4]; ?> 
                                M632.XX.YZK&nbsp; L </td>
                              <td width="61" align="center" valign="TOP"> 1500</td>
                            </tr>
                            <tr bgcolor="#E9EEF1"> 
                              <td width="115" align="center"><div align="center"><?php echo $txt[3]; ?> 
                                  M636.XX.YZK&nbsp; L</div></td>
                              <td width="142" align="center"><div align="center"><?php echo $txt[4]; ?> 
                                  M636.XX.YZK&nbsp; L</div></td>
                              <td width="61" align="center"><div align="center">1750</div></td>
                            </tr>
                            <tr bgcolor="#E9EEF1"> 
                              <td width="115" align="center"><div align="center"><?php echo $txt[3]; ?> 
                                  M638.XX.YZK&nbsp; L</div></td>
                              <td width="142" align="center"><div align="center"><?php echo $txt[4]; ?> 
                                  M638.XX.YZK&nbsp; L</div></td>
                              <td width="61" align="center"><div align="center">2000</div></td>
                            </tr>
                          </table></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center"><br>
                        <table width="283" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td width="200" rowspan="3"><img src="../images/S1_big.jpg" width="400" height="335"></td>
                            <td width="41" height="65" valign="top"><a href="javascript:popUp('r1smov.html');"><img src="../images/cam.gif" alt="1" width="30" height="30" border="0" align="top"></a></td>
                            <td width="42" valign="top"><a href="javascript:popUp('r1smov.html');"><? echo $txt[11]; ?></a></td>
                          </tr>
                          <tr>
                                <td height="62" valign="top">&nbsp;</td>
                                <td valign="top">&nbsp; </td>
                          </tr>
                          <tr>
                                <td valign="top">&nbsp;</td>
                                <td valign="top">&nbsp; </td>
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
                <td width="230" valign="top"><div align="left"><?=$s1_specs_text[6]?></div></td>
                <td width="173" valign="top"><div align="left"><?=$s1_specs_text[7]?><br></div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><div align="left"><?php echo $txt[8]; ?></div></td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" class="fontxt"><div align="left"><?=$s1_specs_text[9]?></div></td>
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
