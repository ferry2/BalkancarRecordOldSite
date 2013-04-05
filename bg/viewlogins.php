<?php
require '../functions.php';
?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="0">
<table width="1024" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="1075"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
    </table>
      <table width="1024" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="973" valign="top">
			<table width="629" height="26" border="0" align="center" cellpadding="0" cellspacing="0">
              
              <tr>
                <td width="900%" colspan="3" valign="top" class="header">Регистрирани потребители - каталози за резервни части: </td>
              </tr>
              
              <tr>
                <td colspan="3" valign="top"></td>
              </tr>
            </table>
            <br>
            <br>
            <table width="100%" border="1" cellspacing="1" cellpadding="2">
              <tr>
                <td width="9%" class="sidebar"><strong>Код</strong></td>
                <td width="11%" class="sidebar"><strong>Име</strong></td>
                <td width="16%" class="sidebar"><strong>Фирма</strong></td>
                <td width="16%" class="sidebar"><strong>Държава</strong></td>
                <td width="14%" class="sidebar"><strong>E-mail</strong></td>
                <td width="10%" class="sidebar"><strong>Телефон</strong></td>
                <td width="7%" class="sidebar"><strong>Факс</strong></td>
                <td width="17%" class="sidebar"><strong>Последно влизане (кликни за подробно) </strong></td>
              </tr>
              <?
			  //$query = "select Code,Name,Firm,Country,Email,Phone,Fax,max(DATE_FORMAT(Time, '%d.%m.%Y / %H:%i:%s')) as LastLogin from users, history WHERE Code=CodeID and Status != 'O' GROUP BY Code,Name,Firm,Country,Email,Phone,Fax order by Time ASC ";
			  $query = "select Code,Name,Firm,Country,Email,Phone,Fax,max(Time) as LastLogin from users, history WHERE Code=CodeID and Status != 'O' GROUP BY Code,Name,Firm,Country,Email,Phone,Fax order by Time DESC ";
			  $result=fetchResult($query);
			  while($row = mysql_fetch_array($result)) {
			  	  $usrcode = $row["Code"];
				  print "<tr>";
				  print "<td>$usrcode</td>";
				  print "<td>".$row["Name"]."</td>";
				  print "<td>".$row["Firm"]."</td>";
				  print "<td>".$row["Country"]."</td>";
				  print "<td>".$row["Email"]."</td>";
				  print "<td>".$row["Phone"]."</td>";
				  print "<td>".$row["Fax"]."</td>";
				  print "<td><a href=viewlogins.php?usercode=$usrcode>".$row["LastLogin"]."</a></td>";
				  print "</tr>";
			  }
			  ?>
			</table>		  </td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <?
	  if (isset($usercode) && $usercode!=""){
	    $query = "SELECT Name FROM users WHERE Code='$usercode'";
		$result=fetchResult($query);
		while($row = mysql_fetch_array($result)) {
			$user = $row["Name"];
		}
	  
	  print "<table width=800 border=0 align=center cellpadding=0 cellspacing=0>";
        print "<tr>";
          print "<td>История на влизане на регистриран потребител <b>$user</b> с код <b>$usercode</b> за последните 60 дни:</td>";
        print "</tr>";
        print "<tr>";
          print "<td>";
		    //$query = "SELECT DATE_FORMAT(Time, '%d.%m.%Y / %H:%i:%s') as FTime FROM users, history WHERE Code=CodeID AND Code='$usercode' ORDER BY FTime DESC";
			$query = "SELECT Time FROM users, history WHERE Code=CodeID AND Code='$usercode' ORDER BY Time DESC";
			$result=fetchResult($query);
			while($row = mysql_fetch_array($result)) {
				print $row["Time"]."<br>";
			}
		  print "</td>";
        print "</tr>";
      print "</table>";
	  }
	  ?>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
