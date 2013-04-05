<?php
$query = "SELECT $lang FROM lang1 where page='footer' order by pos";
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
<table width="1025" height="54" border="0" align="<?=$SITE_ALIGN?>" cellpadding="0" cellspacing="0" background="images/Main-F_42.gif">
  <tr>
    <td width="10" height="45">&nbsp;</td>
    <td width="760" height="45"><a href="aboutus.php?lang=<?php echo $lang; ?>"><?php echo $txt[0]; ?></a> | <a href="forklifts.php?lang=<?php echo $lang; ?>"><?php echo $txt[1]; ?></a> | <a href="elcars.php?lang=<?php echo $lang; ?>"><?php echo $txt[2]; ?></a> | <a href="tows.php?lang=<?php echo $lang; ?>"><?php echo $txt[3]; ?></a> | <a href="platforms.php?lang=<?php echo $lang; ?>"><?php echo $txt[7]; ?></a> | <a href="cert.php?lang=<?php echo $lang; ?>"><?php echo $txt[8]; ?></a> | <a href="ndocs.php?lang=<?php echo $lang; ?>"><?php echo $txt[9]; ?></a> | <a href="contacts.php?lang=<?php echo $lang; ?>"><?php echo $txt[5]; ?></a></td>
    <td width="129"><font class="footer"><?php echo $txt[6]; ?></font></td>
<td width="53" valign="middle"><!-- Web Counter code start -->
        <font size=1>
        <script type="text/javascript" language="javascript"><!--
      _d=document; _n=navigator; _t=new Date(); function t() { _d.write(
      "<img src=\"http://counter.search.bg/cgi-bin/c?_id=record&_z=4&_r="+
      _r+"&_c="+_c+"&_j="+_j+"&_t="+(_t.getTimezoneOffset())+"&_k="+_k+
      "&_l="+escape(_d.referrer)+"\" width=70 height=15 "+
      "border=0>");} _c="0"; _r="0"; _j="U"; _k="U"; _d.cookie="_c=y";
      _d.cookie.length>0?_k="Y":_k="N";//--></script>
        <script type="text/javascript" language="javascript1.2"><!--
      _b=screen; _r=_b.width; _n.appName!="Netscape"?_c=_b.colorDepth : _c=_b.pixelDepth;
      _n.javaEnabled()?_j="Y":_j="N";//--></script>
        <a href="http://counter.search.bg/cgi-bin/s?_id=record"
      target="_blank">
        <script type="text/javascript" language="javascript"><!--
      t(); //--></script>
        </a></font>
        <!-- Web Counter code end -->
	</td>
	<td width="73" valign="middle" align="left">		
<?
switch ($lang){
	case 'ru':
echo <<<HTML
<!-- begin of Top100 logo -->
<a href="http://top100.rambler.ru/home?id=1596923"><img
src="http://top100-images.rambler.ru/top100/banner-88x31-rambler-black2.gif"
alt="Rambler's Top100" width="88" height="31" border="0" /></a>
<!-- end of Top100 logo -->
HTML;
	break;
}
?>	
		</td>
  </tr>
</table>
