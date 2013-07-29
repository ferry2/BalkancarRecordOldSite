<?php require '../functions.php'; ?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<META name=keywords content="мотокари, електрокари, влекачи, промишленост, рекорд, балканкар, производител, IC engine, elcars, tows, industry, record, balkancar, producer, погрузчики, ел.погрузчики, автотягачи, производитель,balkancar, forklift, tow tractor, reach truck, loader, spare parts,producer, carrelli elevatori,racambi,carretillas,chariots,stapler,gabelstapler,voziky,retraky,viljuљkar,wуzki,macina,stivuitoare,piese stivuitoare,електро, дисел, газ, навантажувач, elektro, dizel, LPG, traktor">
<META name=description content="Balkancar Record Co - forklifts producer">
<style type="text/css">
<!--
body {
	background-image: url();
}
-->
</style></head>
<?php 
require_once("header.php"); 

$query = "SELECT $lang FROM lang1 where page='aboutus' order by pos";
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

switch ($lang){
	case 'ru':
echo <<<HTML
<!-- begin of Top100 code -->
<script id="top100Counter" type="text/javascript"
src="http://counter.rambler.ru/top100.jcn?1596923"></script><noscript><img
src="http://counter.rambler.ru/top100.cnt?1596923" alt="" width="1"
height="1" border="0"></noscript>
<!-- end of Top100 code -->
HTML;
	break;
}
?>


<body>
<div align="<?=$SITE_ALIGN?>">
<table width="1024" height="520" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="850"><table width="850" height="520" border="0" cellpadding="5" cellspacing="5">
      <tr>
        <td width="151" height="18" class="headerfon"><font class="textheader">
          <?=$txt[5];?>
        </font></td>
        <td width="352" class="headerfon"><font class="textheader">
          <?=$txt[0];?>
        </font> </td>
        <td width="135" class="headerfon">
          <?=$txt[13];?>
        </td>
        <td width="150" class="headerfon"><a href=cert.php?lang=<?=$lang;?>>
          <?=$txt[14];?>
        </a></td>
      </tr>
      <tr>
        <td rowspan="4" valign="top" class="textfon"><font class="textheader">
          <?=$aboutus_text[6]?>
        </font></td>
        <td rowspan="3" valign="top" class="textfon"><?=$aboutus_text[1]?>
            <br>
            <?=$txt[2];?>
          <br>
            <?=$txt[3];?>
          <br></td>
        <td rowspan="4" valign="top" class="textfon"><p>
            <?
				  $query = "select * from dealers order by $lang";
				  if ((!$result = mysql_db_query($DB, $query))) {
					//DisplayErrMsg(sprintf("internal error %d:%s\n",
					//mysql_errno(), mysql_error()));
					print "<font class=err>$noconn</font>";
					exit() ;
				  }
				  $result=fetchResult($query);
				  while($row = mysql_fetch_array($result)) {
				  	print "<a href=contacts.php?lang=$lang&num=".$row["Num"].">".$row["$lang"]."</a><br>";
				  }
				  ?>
        </p>
            <p align="center"><img src="images/DealersEarth.gif" width="110" height="75"></p></td>
        <td height="328" valign="top" class="textfon"><p>
            <?=$txt[4];?>
          </p>
            <p align="center"><img src="images/intertrek.jpg" width="43" height="54"><br>
              <br>
              <img src="images/OurCertif.gif" width="102"><br>
                <br>
                <img src="images/eac.png" width="54" height="43"></p></td>
      </tr>
      <tr>
        <td height="26" valign="top" class="headerfon"><?=$txt[8];?></td>
      </tr>
      <tr>
        <td rowspan="2" valign="top" class="textfon"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <form name="form" method="post" action="vote.php?lang=<?php echo $lang; ?>">
              <tr>
                <td width="100%"><div align="left">
                    <label>
                    <input type="radio" name="shop" value="internet">
                    <?=$txt[9];?>
                    </label>
                    <br>
                    <label>
                    <input type="radio" name="shop" value="distributor">
                    <?=$txt[10];?>
                    </label>
                    <br>
                    <label>
                    <input type="radio" name="shop" value="producer">
                    <?=$txt[11];?>
                    </label>
                    <br>
                </div></td>
              </tr>
              <tr>
                <td><div align="center">
                    <input type="submit" name="submit" value="<?php echo $txt[12]; ?>" class="btns">
                    <?php
         if (isset($cookie_err)) {
             printf("<font color=\"#CC0000\">");
             echo ("$cookie_err");
             printf("</font>");
             setcookie("cookie_err", "");
         } else {
             printf("<font color=\"#8995FE\">");
             echo ("$cookie_thanks_bg");
             printf("</font>");
         }
        ?>
                </div></td>
              </tr>
            </form>
        </table></td>
      </tr>
      <tr>
        <td height="18" valign="top" class="textfon"><div align="center" class="footer">
            <?=$txt[7];?>
        </div></td>
      </tr>
    </table></td>
    <td width="174" valign="top"><?php include("rside.php"); ?></td>
  </tr>
</table>
<iframe width="1000" height="70" scrolling="no" frameborder="no" allowtransparency="true" src="http://www.econt.com/voffice/1000x70/?mediator=http%3A%2F%2Fwww.balkancar-record.com%2Fbg%2Faboutus.php%3Flang%3Dbg"></iframe>
</div>
</body>
<?php require_once("footer.php"); ?>
<script type="text/javascript">

function blinkIt()
{
if (!document.all) return;
else
{
for(i=0;i<document.all.tags('blink').length;i++)
{
s=document.all.tags('blink')[i];
s.style.visibility=(s.style.visibility=='visible')?'hidden':'visible';
}
}
}

setInterval('blinkIt()',500)

</script>
</html>
