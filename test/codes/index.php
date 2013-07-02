<?
require "../functions.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Редакция на кодове</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="script.js"> </script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><hr size="1" noshade></td>
  </tr>
  <tr>
    <td>
      <form action="" method="post" name="" id="">
        <table width="1024" border="1" align="center" cellpadding="2" cellspacing="2">
          <tr>
            <td><input name="topcheckbox" type="checkbox" class="check" id="topcheckbox" onClick="selectall();" value="ON" disabled>						            </td>
            <td colspan="13" align="center"><a href="form.php?mode=add">Нов потребител</a></td>
          </tr>
          <tr>
            <td><strong><a href="javascript:goDel()">Изтрий</a></strong></td>
			<td align=center>Код</td>
            <td align=center>Име</td>
            <td align=center>Фирма</td>
            <td align=center>Държава</td>
            <td align=center>Емейл</td>
            <td align=center>Телефон</td>
            <td align=center>Факс</td>
            <td align=center>Статус</td>
            <td align=center nowrap=nowrap>Регистр. на</td>
            <td align=center nowrap=nowrap>Изтича на</td>
            <td align=center>Подновен</td>
            <td align=center>&nbsp;</td>
          </tr>
		  <?
		  $sql="select * from users order by name";
		  $result=mysql_db_query($DB, $sql) or die(mysql_error());
		  while($row=mysql_fetch_array($result)) {
		  ?>
          <tr>
            <td><input name="<?=$row['Code']; ?>" type="checkbox" class="check"></td>
            <td><?=$row['Code']; ?></td>
            <td><?=$row['Name']; ?></td>
            <td><?=$row['Firm']; ?></td>
            <td><?=$row['Country']; ?></td>
            <td><?=$row['Email']; ?></td>
            <td><?=$row['Phone']; ?></td>
            <td><?=$row['Fax']; ?></td>
            <td><?=$row['Status']; ?></td>
            <td><?=( (!(int)$row["DateRegister"]) ? ($dateRegister='') : ($dateRegister=date_format(date_create($row["DateRegister"]), 'd-m-Y'))); ?></td>
            <td><?=( (!(int)$row["ExpDate"]) ? ($expDate='') : ($expDate=date_format(date_create($row["ExpDate"]), 'd-m-Y'))); ?></td>
            <td><?=$row['Renew']; ?></td>
            <td><a href="<? echo "form.php?code=".$row['Code']."&mode=update"; ?>">Редакт.</a></td>
          </tr>
		  <? } ?>
          <tr>
            <td><strong><a href="javascript:goDel()">Изтрий</a></strong></td>
			<td align=center>Код</td>
            <td align=center>Име</td>
            <td align=center>Фирма</td>
            <td align=center>Държава</td>
            <td align=center>Емейл</td>
            <td align=center>Телефон</td>
            <td align=center>Факс</td>
            <td align=center>Статус</td>
            <td align=center nowrap=nowrap>Регистр. на</td>
            <td align=center nowrap=nowrap>Изтича на</td>
            <td align=center>Подновен</td>
            <td align=center>&nbsp;</td>
          </tr>
        </table>
    </form></td>
  </tr>
</table>
</body>
</html>
