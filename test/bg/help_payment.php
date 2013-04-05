<? 
require '../functions.php';
//select text from database
$query = "SELECT pos,$lang FROM lang1 where page='help_register' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    //DisplayErrMsg(sprintf("internal error %d:%s\n",
    //mysql_errno(), mysql_error()));
	print "<font class=err>$noconn</font>";
    exit() ;
  }

while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
   $txt[$row[0]] = $row[1];
}

//set pictures
switch ($lang){
	case "bg":
		$pic1 = "help1.JPG";
		$pic2 = "help2.JPG";
		$pic3 = "help3.JPG";
		$pic4 = "help4.JPG";
		$pic5 = "help5.JPG";
		break;
	case "en":
		$pic1 = "help1_en.JPG";
		$pic2 = "help2_en.JPG";
		$pic3 = "help3_en.JPG";
		$pic4 = "help4_en.JPG";
		$pic5 = "help5_en.JPG";
		break;
	case "ru":
		$pic1 = "help1_en.JPG";
		$pic2 = "help2_en.JPG";
		$pic3 = "help3_en.JPG";
		$pic4 = "help4_en.JPG";
		$pic5 = "help5_en.JPG";
		break;
}

?>
<HTML>
<HEAD>
<TITLE>Balkancar - Record Co - Payment help</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251"></HEAD>
<BODY>
<p><font size="4"><?=$txt[0]?></font></p>
<p>1. <?=$txt[1]?></p>
<li> <?=$txt[2]?><img src="../images/<?=$pic1?>"></p>
<p>2. <?=$txt[3]?></p>
<p><img src="../images/<?=$pic2?>"></p>
<p>3. <?=$txt[4]?></p>
<p><img src="../images/<?=$pic3?>"></p>
<p>4. <?=$txt[5]?></p>
<p><img src="../images/<?=$pic4?>"></p>
<p><?=$txt[6]?></p>
<p><img src="../images/<?=$pic5?>"></p>
<p><?=$txt[7]?><br><br><img src="../images/help6.jpg"><br><br><img src="../images/help7.jpg"></p>
<p><?=$txt[8]?></p>
</BODY>
</HTML>
