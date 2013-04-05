<? 
require '../functions.php';
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='cert' order by pos";
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
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../style.css" rel="stylesheet" type="text/css">
<SCRIPT type=text/javascript>
<!--
function popUp( url ) {
	window.open( url,"",'width=630,status=no,scrollbars=yes, location=no,toolbar=no,resizable=no');
}
-->
</script>
</head>
<body>
<div align="<?=$SITE_ALIGN?>">
<table width="1025" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="799"><table width="1025" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="2000" border="0" cellpadding="5" cellspacing="5">
          <tr>
            <td height="18" class="headerfon"><a name="cert"></a>              <?=$txt[0];?></td>
            </tr>
          <tr>
            <td height="1353" valign="top" class="textfon"><table width="715" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
                      <tr> 
                        <td width="231" align="center" valign="middle" bgcolor="#E9EEF1"><p class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=img008_big.jpg');"><br>
                            <img src="images/certificates/img008_small.jpg" alt="1" width="200" border="0"><br>
                            </a><br>
                          </p></td>
                        <td width="232" align="center" valign="top" bgcolor="#E9EEF1"><a href="javascript:popUp('popcert.php?pic=img010_big.jpg');"><br>
                          <img src="images/certificates/img010_small.jpg" alt="1" width="200" border="0"><br>
                          </a></td>
                        <td width="232" align="center" valign="top" bgcolor="#E9EEF1"><br> 
                          <span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=img012_big.jpg');"><img src="images/certificates/img012_small.jpg" alt="1" width="200" height="287" border="0"><br>
                          </a></span></td>
                      </tr>
                      <tr> 
                        <td align="center" valign="middle" bgcolor="#E9EEF1"><p class="DropDownCat"><br>
                            <a href="javascript:popUp('popcert.php?pic=img015_big.jpg');"><img src="images/certificates/img015_small.jpg" alt="1" width="200" height="275" border="0"></a><br>
                            <br>
                            <a href="javascript:popUp('popcert.php?pic=img008_big.jpg');"></a></p></td>
                        <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=img016_big.jpg');"><br>
                          <br>
                          </a> 
                          <?
				switch ($lang){
					case "bg":
						print "<a href=\"javascript:popUp('popcert.php?pic=aqap-bg_big.jpg');\"><img src=\"images/certificates/aqap-bg_small.jpg\" width=\"200\" height=\"280\" border=0></a>";
						break;
					case "en":
						print "<a href=\"javascript:popUp('popcert.php?pic=aqap-en_big.jpg');\"><img src=\"images/certificates/aqap-en_small.jpg\" width=\"200\" height=\"280\" border=0></a>";
						break;
					case "ru":
						print "<a href=\"javascript:popUp('popcert.php?pic=aqap-bg_big.jpg');\"><img src=\"images/certificates/aqap-bg_small.jpg\" width=\"200\" height=\"280\" border=0></a>";
						break;
				}
				?>
                          </span></td>
                        <td align="center" valign="top" bgcolor="#E9EEF1"><a href="javascript:popUp('popcert.php?pic=img010_big.jpg');"></a><span class="DropDownCat"><br>
                          </span><a href="javascript:popUp('popcert.php?pic=img014_big.jpg');"><img src="images/certificates/img014_small.jpg" alt="1" width="200" height="287" border="0"><br>
                          </a></td>
                      </tr>
                      <tr> 
                <td align=center valign=top bgcolor=#E9EEF1><span class=DropDownCat><br>          
<?
				switch ($lang){
					case "bg":
                        print "<a href=\"javascript:popUp('popcert.php?pic=BALKANCAR_RECORD_PLC_9001_BG_2013.jpg');\"><img src=\"images/certificates/BALKANCAR_RECORD_PLC_9001_BG_2013_small.jpg\" alt=\"1\" width=\"200\" height=\"284\" border=\"0\"><br>";
						break;
					case "en":
						print "<a href=\"javascript:popUp('popcert.php?pic=BALKANCAR_RECORD_PLC_9001_EN_2013.JPG');\"><img src=\"images/certificates/BALKANCAR_RECORD_PLC_9001_EN_2013_small.jpg\" alt=\"1\" width=\"200\" height=\"284\" border=\"0\"><br>";
						break;
					case "ru":
						print  "<a href=\"javascript:popUp('popcert.php?pic=BALKANCAR_RECORD_PLC_9001_BG_2013.jpg');\"><img src=\"images/certificates/BALKANCAR_RECORD_PLC_9001_BG_2013_small.jpg\" alt=\"1\" width=\"200\" height=\"284\" border=\"0\"><br>";
						break;
				}
?>
                          </a></span></td>
				<td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><br>
                          <a href="javascript:popUp('popcert.php?pic=motokar_dk_big.jpg');"><img src="images/certificates/motokar_dk_s.jpg" alt="1" width="200" height="284" border="0"><br>
                          </a></span></td>
                        <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=pogruzchik_dk_big.jpg');"><br>
                          <img src="images/certificates/pogruzchik_dk_s.jpg" alt="1" width="200" height="282" border="0"><br>
                          </a></span></td>
					  </tr>                                        
                      <tr> 
                      <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><br>
                          <a href="javascript:popUp('popcert.php?pic=forklift_dk_big.jpg');"><img src="images/certificates/forklift_dk_s.jpg" alt="1" width="200" height="284" border="0"><br>
                          </a></span></td>
				<td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat">&nbsp;</span></td>
                        <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat">&nbsp;</span></td>
                      </tr>                                                               
                  </table></td>
          </tr>
          <tr>
            <td height="18" valign="top" class="headerfon"><a name="diplomas"></a>
              <?=$txt[1];?></td>
          </tr>
          <tr>
            <td height="1045" valign="top" class="textfon"><table width="715" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
              
              <tr>
                <td width="231" align="center" valign="top" bgcolor="#E9EEF1"><br><span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=tractor-08_big.jpg');"><img src="images/certificates/tractor-08_small.jpg" alt="1" width="201" height="283" border="3"></a><br>
                    </span></td>
                <td width="232" align="center" valign="top" bgcolor="#E9EEF1"><br><span class="DropDownCat">
                      <a href="javascript:popUp('popcert.php?pic=diplom4_big.jpg');"><img src="images/certificates/diplom4_small.jpg" alt="1" width="200" height="297" border="0"></a></span><br></td>
                <td width="232" align="center" valign="top" bgcolor="#E9EEF1"><br><span class="DropDownCat">
                      <a href="javascript:popUp('popcert.php?pic=diplom3_big.jpg');"><img src="images/certificates/diplom3_small.jpg" alt="1" width="200" height="298" border="0"></a><a href="javascript:popUp('popcert.php?pic=s_en1_big.jpg');"><br>
                    </a></span></td>
              </tr>
              <tr>
                <td align="center" valign="middle" bgcolor="#E9EEF1"><span class="DropDownCat"><br><a href="javascript:popUp('popcert.php?pic=diplom1_big.jpg');"><img src="images/certificates/diplom1_small.jpg" alt="1" width="200" height="284" border="0"></a><br>
                </a></span><br></td>
                <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=r2_big.jpg');"><br>
                        <img src="images/certificates/r2_small.jpg" alt="1" width="200" height="133" border="0"><br>
                </a></span></td>
                <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><br>
                      <a href="javascript:popUp('popcert.php?pic=diplom5_big.jpg');"><img src="images/certificates/diplom5_small.jpg" alt="1" width="200" height="296" border="0">
                    </a></span><br></td>
              </tr>
              <tr>
                <td align="center" valign="middle" bgcolor="#E9EEF1"><p class="DropDownCat"><br>
                        <a href="javascript:popUp('popcert.php?pic=diplom6_big.jpg');"><img src="images/certificates/diplom6_small.jpg" alt="1" width="200" height="286" border="0">
                    </a></p><br></td>
                <td align="center" valign="top" bgcolor="#E9EEF1"><p class="DropDownCat"><br>
                        <a href="javascript:popUp('popcert.php?pic=forklift-99_big.jpg');"><img src="images/certificates/forklift-99_small.jpg" alt="1" width="200" height="286" border="0">
                    </a></p><br></td>
                <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><br>
<a href="javascript:popUp('popcert.php?pic=tractor-01_big.jpg');"><img src="images/certificates/tractor-01_small.jpg" alt="1" width="200" height="286" border="0">
                    </a></p><br></td>
                      <a href="javascript:popUp('popcert.php?pic=diplom3_big.jpg');"><br>
                    </a></span></td>
              </tr>
<tr>
                <td align="center" valign="middle" bgcolor="#E9EEF1"><br><span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=diplom2_big.jpg');"><img src="images/certificates/diplom2_small.jpg" alt="1" width="200" height="284" border="0"></a><br>
                </a></span><br></td>
                <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=forklift-04_big.jpg');"><br>
                        <img src="images/certificates/forklift-04_small.jpg" alt="1" width="200" height="283" border="0"><br>
                </a></span></td>
                <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><br>
                      <a href="javascript:popUp('popcert.php?pic=pogruzchik-06_big.jpg');"><img src="images/certificates/pogruzchik-06_small.jpg" alt="1" width="200" height="296" border="0">
                    </a></span><br></td>
              </tr>


<tr>
                <td align="center" valign="middle" bgcolor="#E9EEF1"><br><span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=Reachtruck-07_big.jpg');"><img src="images/certificates/Reachtruck-07_small.jpg" alt="1" width="200" height="284" border="0"></a><br>
                </a></span><br></td>
                <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><a href="javascript:popUp('popcert.php?pic=pogruzchik-08_big.jpg');"><br>
                        <img src="images/certificates/pogruzchik-08_small.jpg" alt="1" width="200" height="283" border="0"><br>
                </a></span></td>
                <td align="center" valign="top" bgcolor="#E9EEF1"><span class="DropDownCat"><br>
                      <a href="javascript:popUp('popcert.php?pic=tractor-08_big.jpg');"><img src="images/certificates/tractor-08_small.jpg" alt="1" width="200" height="296" border="0">
                    </a></span><br></td>
              </tr>
            </table></td>
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
