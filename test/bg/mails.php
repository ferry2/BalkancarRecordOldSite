<? 
require '../functions.php';
//require_once("header.php");

$query = "select * from dealers order by bg;";
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
<link href="../style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<?
$result=fetchResult($query);
					print "<table width=1024 border=1>";
					while($row = mysql_fetch_array($result)) {
						$Email=$row["Email"];
						$phone=$row["Phone"];
						$dealer=$row["$lang"];
						//$DealersText="Контакти с наш дилър:<br><b>".$row["$lang"]."</b><br>Tel: XX XX XX";
						print "<tr><label><td align=left valign=top>$dealer</td><td valign=top>$Email</td><td align=left valign=top>$tel:$phone</td></label></tr>";
					}
					print "</table></div>";
?>
</body>
<?php //require_once("footer.php"); ?>
</html>
