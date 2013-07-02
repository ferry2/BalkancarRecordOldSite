<?
require "../functions.php";
?>
<html>
<head>
<title>Потребители - редакция</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../consolidated_common.css" />
<script type="text/javascript" src="livevalidation_standalone.js"></script>
</head>

<body>
<?="<p>Легенда: Статус - &quot;О&quot; - Деактивиран; &quot;P&quot; - чакащ одобрение; &quot;F&quot; - активен";?>
<table width="775" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>      <table width="700" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
		  <?
		  $mode=$_GET["mode"];
		  if($mode=="add") {
		  ?>
          <form name="form1" method="post" action="formsubmit.php?mode=add" enctype="multipart/form-data">
            <table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td><strong>Добавяне на потребител</strong></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>Код</td>
                <td><input name="newcode" type="text" id="newcode" />
                <script type="text/javascript">
					var newcode = new LiveValidation('newcode');
					newcode.add( Validate.Presence );
					newcode.add( Validate.Numericality );
					newcode.add( Validate.Length, { is: 5 } );
                </script>
                </td>
              </tr>
              <tr>
                <td>Име</td>
                <td><input name="name" type="text" id="name"></td>
              </tr>
              <tr>
                <td>Фирма</td>
                <td><input name="firm" type="text" id="firm"></td>
              </tr>
              <tr>
                <td>Държава</td>
                <td><input name="country" type="text" id="country"></td>
              </tr>
              <tr>
                <td>Е-мейл</td>
                <td><input name="email" type="text" id="email" maxlength="40">
			  </td>
              </tr>
              <tr>
                <td>Телефон</td>
                <td><input name="phone" type="text" id="phone"></td>
              </tr>
              <tr>
                <td>Факс</td>
                <td><input name="fax" type="text" id="fax"></td>
              </tr>
              <tr>
                <td>Статус</td>
                <td><input name="active" type="text" id="active" value="F" />
				<script type="text/javascript">
					var active = new LiveValidation('active');
					active.add( Validate.Presence );
					active.add( Validate.Inclusion, { within: [ 'F', 'O', 'P' ] } );
                </script>
                </td>
              </tr>
              <tr>
                <td>Валиден до</td>
                <td><input name="expDate" type="text" id="expDate" value="yyyy-mm-dd"></td>
              </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Запис">
                <input name="reset" type="reset" value="Изчисти"></td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </form>
		  <?		
		  } else  {
			$code=$_GET["code"];
			$sql="select * from users where Code='$code'";
			
			$result=mysql_query($sql);
			while($row=mysql_fetch_array($result)) {
				$code=$row['Code'];
				$name=$row['Name'];
				$firm=$row['Firm'];
				$country=$row['Country'];
				$email=$row['Email'];
				$phone=$row['Phone'];
				$fax=$row['Fax'];
				$status=$row['Status'];
				$dateRegister=$row['DateRegister'];
				$expDate=$row['ExpDate'];
				$renew=$row['Renew'];
			}
		?>
		<form name="form1" method="post" action="formsubmit.php?mode=update">
            <table width="500" border="1" align="center" cellpadding="2" cellspacing="2">
              <tr>
                <td><strong>Редакция на потребител</strong></td>
                <td><input type="hidden" name="code" value="<?=$code;?>">
                  &nbsp;</td>
              </tr>
              <tr>
                <td>Код</td>
                <td><input name="newcode" type="text" id="newcode" value="<?=$code;?>">
                <script type="text/javascript">
					var newcode = new LiveValidation('newcode');
					newcode.add( Validate.Presence );
					newcode.add( Validate.Numericality );
					newcode.add( Validate.Length, { is: 5 } );
                </script></td>
              </tr>
              <tr>
                <td>Име</td>
                <td><input name="name" type="text" id="name" value="<?=$name;?>"></td>
              </tr>
              <tr>
                <td>Фирма</td>
                <td><input name="firm" type="text" id="firm" value="<?=$firm;?>"></td>
              </tr>
              <tr>
                <td>Държава</td>
                <td><input name="country" type="text" id="country" value="<?=$country;?>"></td>
              </tr>
              <tr>
                <td>Е-мейл</td>
                <td><input name="email" type="text" id="email" value="<?=$email;?>"></td>
              </tr>
              <tr>
                <td>Телефон</td>
                <td><input name="phone" type="text" id="phone" value="<?=$phone;?>"></td>
              </tr>
              <tr>
                <td>Факс</td>
                <td><input name="fax" type="text" id="fax" value="<?=$fax;?>"></td>
              </tr>
              <tr>
                <td>Статус</td>
                <td><input name="active" type="text" id="active" value="<?=$status;?>">
				<script type="text/javascript">
					var active = new LiveValidation('active');
					active.add( Validate.Presence );
					active.add( Validate.Inclusion, { within: [ 'F', 'O', 'P' ] } );
                </script>
                </td>
              </tr>
              <tr>
                <td>Дата на регистр.</td>
                <td><input name="dateRegister" type="text" id="dateRegister" value="<?=$dateRegister;?>"></td>
              </tr>
              <tr>
                <td>Валиден до</td>
                <td><input name="expDate" type="text" id="expDate" value="<?=$expDate;?>"></td>
              </tr>
              <tr>
                <td>Подновен</td>
                <td><input name="renew" type="text" id="renew" value="<?=$renew;?>"></td>
              </tr>
              <tr>
                <td><input type="submit" name="Submit" value="Редактирай"></td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </form>
		
		<?	
			
		  }
		  ?>
		 
		  </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
