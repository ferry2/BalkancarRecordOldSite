<?php
require '../functions.php';

$query = "SELECT $lang FROM lang1 where page='vote' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    DisplayErrMsg(sprintf("internal error1 %d:%s\n",
    mysql_errno(), mysql_error()));
    exit() ;
  }
$choose = mysql_result($result, 0);
$thanks = mysql_result($result, 1);


if (trim($shop) == "") {
   setcookie("cookie_err","<br>$choose");
   header("Location:http://$HTTP_HOST/aboutus.php?lang=$lang");
   exit();
}

if (isset($shop) == true) {
   setcookie("cookie_thanks","<br>$thanks");
}

if (isset($cookie_thanks_bg)) {
   header("Location:http://$HTTP_HOST/aboutus.php?lang=$lang");
   exit();
}

if ($shop == "internet") {
$query = "SELECT * FROM anketa where ver='bg'";
  if ((!$result = mysql_db_query(anketa, $query))) {
    DisplayErrMsg(sprintf("internal error3 %d:%s\n",
    mysql_errno(), mysql_error()));
    exit() ;
  }
  $row = mysql_fetch_array($result);
  $total = ($row["total"]+1);
  $inter = ($row["inter"]+1);
  $query = "UPDATE anketa SET inter='$inter', total='$total' where ver='bg'";
  if ((!$result = mysql_db_query(anketa, $query))) {
    DisplayErrMsg(sprintf("internal error4 %d:%s\n",
    mysql_errno(), mysql_error()));
    exit() ;
  }
  header("Location:http://$HTTP_HOST/aboutus.php?lang=$lang");
  exit();
}
elseif ($shop == "producer") {
$query = "SELECT * FROM anketa where ver='bg'";
  if ((!$result = mysql_db_query(anketa, $query))) {
      DisplayErrMsg(sprintf("internal error5 %d:%s\n",
      mysql_errno(), mysql_error()));
      exit() ;
  }
  $row = mysql_fetch_array($result);
  $total = ($row["total"]+1);
  $prod = ($row["prod"]+1);
  $query = "UPDATE anketa SET prod='$prod', total='$total' where ver='bg'";
  if ((!$result = mysql_db_query(anketa, $query))) {
      DisplayErrMsg(sprintf("internal error6 %d:%s\n",
      mysql_errno(), mysql_error()));
      exit();
  }
  header("Location:http://$HTTP_HOST/aboutus.php?lang=$lang");
  exit();
}
elseif ($shop == "distributor") {
  $query = "SELECT * FROM anketa where ver='bg'";
  if ((!$result = mysql_db_query(anketa, $query))) {
    DisplayErrMsg(sprintf("internal error7 %d:%s\n",
    mysql_errno(), mysql_error()));
    exit() ;
  }
  $row = mysql_fetch_array($result);
  $total = ($row["total"]+1);
  $distr = ($row["distr"]+1);
  $query = "UPDATE anketa SET distr='$distr', total='$total' where ver='bg'";
  if ((!$result = mysql_db_query(anketa, $query))) {
    DisplayErrMsg(sprintf("internal error8 %d:%s\n",
    mysql_errno(), mysql_error()));
    exit();
  }
  header("Location:http://$HTTP_HOST/aboutus.php?lang=$lang");
  exit();
}
?>