<?php
$query = "SELECT $lang FROM lang1 where page='rside' order by pos";
if ((!$result = mysql_db_query($DB, $query))) {
  DisplayErrMsg(sprintf("internal error %d:%s\n",
  mysql_errno(), mysql_error()));
  exit() ;
}

//get all texts from database and put it in variables
for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}
?>
<table width="178" height="100%" border="0" cellpadding="5" cellspacing="5">
  <tr>
    <td width="158" height="28" class="headerfon"><font class="textheader">
      <?=$txt[0];?>
    </font></td>
  </tr>
  <tr bgcolor="#E9EEF1">
    <td valign="top" class="textfon"><div align="center"><a href="http://www.efisiomarchese.it/" target="_blank"
				onmouseover="window.status='http://www.efisiomarchese.it/';  return true;"
				onmouseout="window.status='';  return true;">
      <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="100" height="67">
        <param name="movie" value="../images/efisio.swf" />
        <param name="quality" value="high" />
        <embed src="../images/efisio.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="100" height="67"></embed>
      </object>
      </a><a href="http://www.monbat.com/" target="_blank"
				onmouseover="window.status='http://www.monbat.com/';  return true;"
				onmouseout="window.status='';  return true;"><br />
      <br>
        <img src="images/Monbat.gif" height="62" border="0" alt=" " /><br />
        </a><a href="http://www.balkancar-record.com/sport/sport.htm" target="_blank"
				onmouseover="window.status='http://www.balkancar-record.com/sport/sport.htm';  return true;"
				onmouseout="window.status='';  return true;"><img src="images/Mama,Tatko.gif" height="121" border="0" alt=" " /><br />
        </a><a href="http://www.iskras.com/" target="_blank"
				onmouseover="window.status='http://www.iskras.com/';  return true;"
				onmouseout="window.status='';  return true;"><img src="images/Iskra.jpg" border="0" alt=" " /><br />
        <br />
        <!-- Facebook Badge START --><a href="http://www.facebook.com/pages/Balkancar-Record-JSC/151365561578329" target="_blank" style="font-family: &quot;lucida grande&quot;,tahoma,verdana,arial,sans-serif; font-size: 11px; font-variant: normal; font-style: normal; font-weight: normal; color: #3B5998; text-decoration: none;" title="Balkancar Record JSC">Balkancar Record JSC</a><br/><a href="http://www.facebook.com/pages/Balkancar-Record-JSC/151365561578329" target="_blank" title="Balkancar Record JSC"><img src="http://badge.facebook.com/badge/151365561578329.1737.212047539.png" style="border: 0px;" /></a><br/><!-- Facebook Badge END -->
        <br />
    </a></div></td>
  </tr>
</table>