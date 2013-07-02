<?php
$DB_SERVER="localhost"; 		
$DB_LOGIN="balcancar";
$DB_PASSWORD="rekord";
$DB="balcancar";
$HTTP_HOST="www.balkancar-record.com/bg";
$SITE_ALIGN = "center";
$NOLOGINIP = "87.97.214.56";

global $DB_SERVER, $HTTP_HOST, $DB_LOGIN, $DB_PASSWORD, $DB;

function fetchResult($query) {
  global $DB;
	if (!($result = mysql_db_query($DB, $query))) {
  			DisplayErrMsg(sprintf("internal error %d:%s\n",
  			mysql_errno(), mysql_error()));
   			exit() ;
  }
	return $result; 
}

// transactions
function begin(){
  @mysql_query("BEGIN");
}

function commit(){
  @mysql_query("COMMIT");
}

function rollback(){
  @mysql_query("ROLLBACK");
}

function DisplayErrMsg( $message ) {
printf("<blockquote><blockquote><blockquote><h3><font color=\"#cc0000\">
        %s</font></h3></blockquote></blockquote></blockquote>\n", $message);
}

//connect to database
if (!($link = mysql_pconnect($DB_SERVER, $DB_LOGIN, $DB_PASSWORD))) {
  DisplayErrMsg(sprintf("internal error %d:%s\n",
  mysql_errno(), mysql_error()));
  exit();
}

//@mysql_query("SET NAMES cp1251");
@mysql_query("SET NAMES utf8", $link);


//select language prefix
switch ($lang) {
case 'bg':
	$pref = "";
	break;
case 'en':
	$pref = "../en/";
	break;
case 'ru':
	$pref = "../ru/";
	break;
}

?>

<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
<!-- <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" /> -->
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<?
$query = "SELECT * FROM lang2";
  if ((!$result = mysql_db_query($DB, $query))) {
	print "<font class=err>$noconn</font>";
    exit() ;
  }

//get all texts from database and put it in variables
for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}

?>
<body>
<?
print "Txt1=";
print $txt[0];
?>
</body>
</html>
