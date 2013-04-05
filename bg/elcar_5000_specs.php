<? 
session_start();
require '../functions.php';
$uri = getUri();
setcookie("uriback", $uri , time()+86400);
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='er_specs' order by pos";
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
            <td height="18" class="headerfon"><a href="elcars.php?lang=<?=$lang?>"><?=$txt[9]?></a> <font class="navnext">&gt;&gt;</font> <?=$elcars_text[8]?> </td>
            </tr>
          <tr>
            <td valign="top" class="textfon"><table width="102%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
                <td><div align="right"><a href="javascript:popUp('elcarmov.html');"></a></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><img src="../images/elcar5000.jpg" alt="er_specs"></td>
                <td><table width="409" height="187" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
                  <tr bgcolor="#D5E6F1">
                    <td width="100" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[1]; ?></div></td>
                    <td colspan="2" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[8]; ?><br>
                        <br>
                        <img src="../images/PDF_Icon.gif" alt="x" width="30" height="28" border="0"><br>
                    </div></td>
                    <td colspan="2" valign="TOP"><div align="center"><span class="headerfon"><?php echo $txt[14]; ?><br>
                        <br>
                          <img src="../images/catalogue.gif" alt="1" width="39" height="43"></span></div></td>
                    </tr>
                  <tr bgcolor="#E9EEF1">
                    <td width="100" height="49" align="center"><div align="center">3500</div></td>
                    <td width="80" rowspan="3" align="center"><a href="<?php echo $pref;?>record-er5-bg.pdf" target="_blank">DC</a></td>
                    <td width="70" rowspan="3" align="center">AC</td>
                    <td width="67" align="center"><?
						  if ($code!="" || $no_login_required == true){
							print "<a href=\"../ER/3-5/Introduction.html\" target=_blank>DC</a>";
						  }else{
							print "<a href=register.php?lang=$lang>DC</a>";
						  }
						  ?></td>
                    <td width="60" align="center">AC</td>
                  </tr>
                  <tr bgcolor="#E9EEF1">
                    <td width="100" height="49" align="center"><div align="center">4000</div></td>
                    <td align="center">&nbsp;</td>
                    <td align="center">&nbsp;</td>
                  </tr>
                  <tr bgcolor="#E9EEF1">
                    <td width="100" height="37" align="center" valign="CENTER"> 5000 </td>
                    <td width="67" align="center"><?
						  if ($code!="" || $no_login_required == true){
							print "<a href=\"../ER/5/Introduction.html\" target=_blank>DC</a>";
						  }else{
							print "<a href=register.php?lang=$lang>DC</a>";
						  }
						  ?></td>
                    <td width="60" align="center">AC</td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center"><br>
                </div></td>
              </tr>
              <tr>
                <td width="36"></td>
                <td width="364"><div align="left"></div></td>
                <td width="430"></td>
              </tr>
              <tr>
                <td width="36"></td>
                <td width="364" valign="top"><div align="left"></div></td>
                <td width="430" valign="top"><div align="left"><br>
                </div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td colspan="2"><div align="left"></div></td>
              </tr>
              <tr>
                <td colspan="3">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" class="fontxt"><div align="left"></div></td>
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
