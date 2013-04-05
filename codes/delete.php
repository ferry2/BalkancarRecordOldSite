<?
require "../functions.php";
$recsno=$_GET["recsno"];
$data=trim($recsno);
$ex=explode(" ",$data);
$size=sizeof($ex);
for($i=0;$i<$size;$i++) {
	$id=trim($ex[$i]);
	$sql="delete from users where Code='$id'";
	$result=mysql_query($sql) or die(mysql_error());
	
}
header("location: index.php");
?>
