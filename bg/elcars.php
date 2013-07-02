<? 
require '../functions.php';
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='elcars' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    //DisplayErrMsg(sprintf("internal error %d:%s\n",
    //mysql_errno(), mysql_error()));
	print "<font class=err>$noconn</font>";
    exit() ;
  }

//get all texts from database and put it in array txt
for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}
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
    <td width="799"><table width="1025" height="75%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="487" border="0" cellpadding="5" cellspacing="5">
          <tr>
            <td width="155" height="18" class="headerfon"><?=$txt[1]?></td>
                <td width="155" class="headerfon"><?=$elcars_text[8]?></td>
                <td width="155" class="headerfon"><?=$elcars_text[9]?></td>
                <td width="155" class="headerfon">
                  <?=$txt[3]?>                </td>
                <!--<td width="153" class="headerfon"><?=$elcars_text[7]?></td> -->
          </tr>
          <tr>
            <td height="446" valign="top" class="textfon"><p align="center"><img src="../images/carE1r.jpg" width="155" height="117"></p>
                  <p><?=$txt[4]?></p>
              <p><strong><a href="er_specs.php?lang=<?=$lang;?>"><?=$txt[6]?></a></strong></p></td>
            <td valign="top" class="textfon"><p><img src="../images/elcar5000_small.jpg" width="155" height="89"></p>
              <p><?=$elcars_text[11]?><br>
                  <br>
                    <strong><a href="elcar_5000_specs.php?lang=<?=$lang;?>">
                <?=$txt[6]?>
              </a></strong></p>              </td>
            <td valign="top" class="textfon"><img src="../images/elcar8000_small.gif" width="155" height="95" border="0"><br>
                <br>
                <?=$elcars_text[12]?>
                  <br>
              <br><strong><a href="elcar_8000_specs.php?lang=<?=$lang;?>">
              <?=$txt[6]?>
            </a></strong></td>
            <td valign="top" class="textfon"><p align="center"><img src="../images/Retrak_eer-16.jpg" width="155" height="206"></p>
                  <p><?=$txt[5]?></p>
              <p><strong><a href="err_specs.php?lang=<?=$lang;?>"><?=$txt[6]?></a></strong><br>
                  <br>
                </p></td>
            <!--<td valign="top" class="textfon"><img src="../images/hs.gif" width="150" height="220"><br>
              <br><strong><a target="blank" href="../HScatalogue2005.pdf">
            <?=$elcars_text[10]?>
            </a></strong></td> -->
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
