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

@mysql_query("SET NAMES 'utf8'", $link);

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

// Изчиства формулярите от тагове и спец. символи
function cleanup_text ($value = "", $preserve="", $allowed_tags="") {
   if (empty($preserve)) {
      $value = strip_tags($value, $allowed_tags);
   }
      $value = htmlspecialchars($value);
      return $value;
}

// Proverka za validen e-mail
function is_Email($email)
{
    if (preg_match("/^(\w+((-\w+)|(\w.\w+))*)\@(\w+((\.|-)\w+)*\.\w+$)/",$email))
       return true;
    else return false;
}

function loginChk($sid, $sessUser) {

	global $DB;
	$currSession = session_id();
  if (!($result = mysql_db_query($DB, "select Sid, UserID from user_profile where Sid = '$sid' and UserID='$sessUser'"))) {
     DisplayErrMsg(sprintf("internal error %d:%s\n", mysql_errno(), mysql_error()));
     return 0 ;
  }

  if (($row = mysql_fetch_array($result)) && ($currSession == $row["Sid"] && ($sessUser == $row["UserID"])))
     return 1 ;
  else
     return 0 ;
}

function loginChkAdmin($sid, $sessUser) {

	global $DB;
	$currSession = session_id();
  if (!($result = mysql_db_query("$DB", "select Sid, Name from users where Sid = '$sid' and Name='$sessUser'"))) {
     DisplayErrMsg(sprintf("internal error %d:%s\n", mysql_errno(), mysql_error()));
     return 0 ;
  }

  if (($row = mysql_fetch_array($result)) && ($currSession == $row["Sid"] && ($sessUser == $row["Name"])))
     return 1 ;
  else
     return 0 ;
}

function getUri() {
	$uri =  $_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]."?".$_SERVER['QUERY_STRING'];
	return $uri;
}
?>