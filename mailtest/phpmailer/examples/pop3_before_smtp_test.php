<html>
<head>
<title>POP before SMTP Test</title>
</head>

<body>

<pre>
<?php
  require 'class.phpmailer.php';
  require 'class.pop3.php';

  $pop = new POP3();
  $pop->Authorise('pop3.libra-ag.com', 110, 30, 'admin_p', '953', 1);

  $mail = new PHPMailer();

  $mail->IsSMTP();
  $mail->SMTPDebug = 2;
  $mail->IsHTML(false);

  $mail->Host     = 'mail.libra-ag.com';

  $mail->From     = 'mailer@example.com';
  $mail->FromName = 'Example Mailer';

  $mail->Subject  =  'My subject';
  $mail->Body     =  'Hello world';
  $mail->AddAddress('peter_k@abv.bg', 'First Last');

  if (!$mail->Send())
  {
    echo $mail->ErrorInfo;
  }
?>
</pre>

</body>
</html>
