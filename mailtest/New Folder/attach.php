<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?
/*
		$to = "peter_k@abv.bg";
		$subject = "WebAdmin_$lang";
		
		$mail_body = "<body><b>Ôèðìà: $firm</b><br>Ëèöå çà êîíòàêòè: $name<br>Òåëåôîí: $phone<br>Äúðæàâà: $country<br>Îáðàòíà âðúçêà: $feedback<br><br>$comments<br><br><hr><br><font color=red>Òîçè åìàèë å àâòîìàòè÷íî ãåíåðèðàí îò <b>$lang</b> âåðñèÿ íà ñàéòà!</font>";
		$mail_body .= "</body></html>";
		
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset= windows-1251\r\n";
		//$headers .= "To: Balkancar-Record <$to>\r\n";
		$headers .= "From: $email <$email>\r\n";
		
		if (!mail($to, $subject, $mail_body, $headers))
				$message = "<font class=err>$txt[34]</font>";
			else
				$message = $message."<font class=success>$txt[35]</font>";
*/				
 use Mail::Sender;

 ref ($sender = new Mail::Sender({from => 'somebody@somewhere.com',smtp
 => 'mail.yourdomain.com'})) or die "$Mail::Sender::Error\n";

 (ref ($sender->MailFile(
  {to =>'peter_k@abv.bg', subject => 'this is a test',
   msg => "Hi Johnie.\nI'm sending you the pictures you wanted.",
   file => 'watermark.gif'
  }))
  and print "Mail sent OK."
 )
 or die "$Mail::Sender::Error\n";
?>
</body>
</html>
