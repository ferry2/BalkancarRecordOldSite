<? 
require '../functions.php';
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='forklifts' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
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
</head>
<body>
<div align="<?=$SITE_ALIGN?>">
<table width="1025" height="430" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="799"><table width="1025" height="450" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="711" border="0" cellpadding="5" cellspacing="5">
          <tr>
            <td width="187" height="18" class="headerfon"><?=$txt[0]?> 1S (1250 &divide; 2000 <?=$kg?>) </td>
            <td width="188" class="headerfon"><?=$txt[0]?> 2S (2000 &divide; 5000 <?=$kg?>) </td>
            <td width="198" class="headerfon"><?=$txt[0]?> 3S (6000 &divide; 8000 <?=$kg?>) </td>
            </tr>
          <tr>
            <td valign="top" class="textfon"><p align="center"><img src="../images/Record_1S_small.jpg" width="185" height="135"></p>
              <p><?=$txt[3]?></p>
              <p><strong><a href="1s_specs.php?lang=<?=$lang;?>"><?=$txt[2]?></a></strong></p></td>
            <td valign="top" class="textfon">                  <p align="center"><img src="../images/RECORD_2S_small.jpg"></p>
              <p><?=$txt[4]?></p>
              <p><strong><a href="2s_specs.php?lang=<?=$lang;?>"><?=$txt[2]?></a></strong><br>
                  <br>
                </p></td>
            <td valign="top" class="textfon"><p align="center"><img src="../images/3S_pict_Small.jpg" width="195" height="136"></p>
              <p><?=$txt[5]?></p>
              <p><strong><a href="3s_specs.php?lang=<?=$lang;?>"><?=$txt[2]?></a></strong></p></td>
            </tr>
          <tr bgcolor="#FFFFFF">
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            </tr>
          <tr>
            <td valign="top" class="headerfon"><?=$txt[0]?>
2SR (4000 &divide; 5000
<?=$kg?>
) </td>
            <td valign="top" class="headerfon"><?=$txt[0]?>
&nbsp;4S (10000 &divide; 12500
<?=$kg?>
)</td>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
          <tr>
            <td height="297" valign="top" class="textfon"><p align="center"><img src="../images/SR_pict_Small.jpg" width="185" height="126"></p>
              <p>
                <?=$forklifts_text[6]?>
              </p>
              <p><strong><a href="2sr_specs.php?lang=<?=$lang;?>">
                <?=$txt[2]?>
              </a></strong></p></td>
            <td valign="top" class="textfon"><div align="center"><img src="../images/ALIM0453_small.jpg" alt="alimo" width="185" height="123"></div> 
              <p>
                <?=$txt[7]?>
</p>
              <p><strong><a href="4s_specs.php?lang=<?=$lang;?>">
                <?=$txt[2]?>
              </a></strong></p></td>
            <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
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
