<? 
session_start();
require '../functions.php';
$uri = getUri();
setcookie("uriback", $uri , time()+86400);
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='3s_specs' order by pos";
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
            <td height="18" class="headerfon"><a href="forklifts.php?lang=<?=$lang?>"><?=$txt[10]?></a> <font class="navnext">&gt;&gt;</font> <?=$txt[11]?> </td>
            </tr>
          <tr>
            <td valign="top" class="textfon"><table width="102%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>&nbsp;</td>
                <td><div align="right"><a href="javascript:popUp('r3smov.html');"><img src="../images/cam.gif" alt="1" width="30" height="30" border="0" align="top"><? echo $txt[9]; ?></a></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><img src="../images/3S_pict.jpg" alt="1"></td>
                <td><table width="409" height="279" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
                  <tr bgcolor="#D5E6F1">
                    <td valign="TOP"><div align="center" class="headerfon"><?php echo $txt[1]; ?></div></td>
                    <td width="241" valign="TOP"><div align="center" class="headerfon"><?php echo $txt[8]; ?></div></td>
                    <td width="45" valign="TOP">&nbsp;</td>
                    </tr>
                  
                  <tr bgcolor="#E9EEF1">
                    <td height="57" align="center">6000</td>
                    <td rowspan="3" align="center"><table width="79%" border="0" cellspacing="2" cellpadding="0">
                      <tr>
                        <td width="63%"><div align="left">
                          <?=$txt[13];?>
                        DEUTZ</div></td>
                        <td width="9%">->&nbsp;</td>
                        <td width="28%"><a href="<?php echo $pref;?>specs/LT-R3S-DEUTZ.pdf" target="_blank">
                          <?=$txt[0];?>
                        </a><a href="<?php echo $pref;?>specs/LT-TOYOTA_2s_diesel.pdf" target="_blank"></a></td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><a href="<?php echo $pref;?>specs/LT- TOYOTA-2S_LPG_GASOLINE.pdf" target="_blank"></a></td>
                      </tr>
                      <tr>
                        <td><?=$txt[13];?>&nbsp;MINSK</td>
                        <td>-></td>
                        <td><a href="<?php echo $pref;?>specs/LT-R3S-MINSK.pdf" target="_blank">
                          <?=$txt[0];?>
                        </a></td>
                      </tr>
                      

                    </table>
                      </td>
                    <td rowspan="3" align="center"><br>
                      <?
		  if ($code!="" || $no_login_required == true){
		  	print "<a href=../r3s/Introduction.htm target=_blank><img src=../images/catalogue.gif width=39 height=43 border=0 /><br>".$txt[12]."</a>";
		  }else{
		  	print "<a href=register.php?lang=$lang><img src=../images/catalogue.gif width=39 height=43 border=0 /><br>".$txt[12]."</a>";
		  }
		  ?></td>
                  </tr>
                  <tr bgcolor="#E9EEF1">
                    <td height="57" align="center">                      7000</td>
                    </tr>
                  <tr bgcolor="#E9EEF1">
                    <td height="58" align="center">8000</td>
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
