<?php
$query = "SELECT $lang FROM lang where page='infos_elcars' order by pos";
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
<table width="198"  border="0" cellpadding="2" cellspacing="1">
  <tr>
    <td width="100" valign="top" class="titlebar1"><div align="left"><?php echo $txt[0]; ?></div></td>
    <td width="100" valign="top" class="titlebar"><div align="left"><?php echo $txt[1]; ?></div></td>
  </tr>
</table>
