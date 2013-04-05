<? 
require '../functions.php';
require_once("header.php");

$query = "SELECT $lang FROM lang1 where page='ndocs' order by pos";
  if ((!$result = mysql_db_query($DB, $query))) {
    //DisplayErrMsg(sprintf("internal error %d:%s\n",
    //mysql_errno(), mysql_error()));
	print "<font class=err>$noconn</font>";
    exit() ;
  }

for ($i=0; $i<mysql_num_rows($result); $i++) {
	$txt[$i] = mysql_result($result, $i);
}

?>
<html>
<head>
<title>&quot;Balkancar Record&quot; Co</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<SCRIPT type=text/javascript>
<!--
function popUp( url ) {
	window.open( url,"",'width=630,status=no,scrollbars=yes, location=no,toolbar=no,resizable=no');
}
-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>
<div align="<?=$SITE_ALIGN?>">
<table width="1025" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="799"><table width="1025" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="853" valign="top"><table width="850" height="493" border="0" cellpadding="5" cellspacing="5">
          <tr>
            <td height="18" class="headerfon">Нормативни документи </td>
            </tr>
          <tr>
            <td height="450" valign="top" class="textfon">


<table width="715" border="0" align="center" cellpadding="2" cellspacing="2" bgcolor="#FFFFFF">
  
                    <tr> 
 
                       <td width="231" align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;<a target="_blank" href="ndoc/1gdd-balkancar.pdf"><br>
  <img src="ndoc/record_1s.jpg" alt="1" width="200" border="0"><br>
                            </a><br>
                          </td>
 
          <td width="232" align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;<a target="_blank" href="ndoc/2dno-balkancar.pdf"><br>
                            <img src="ndoc/record_2s.jpg" alt="1" width="200" border="0"><br>
                            </a><br>
                          </p></td>
  
                    <td width="232" align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;<a target="_blank" href="ndoc/3fo-balkancar.pdf"><br>
                            <img src="ndoc/record_3s.jpg" alt="1" width="200" border="0"><br>
                            </a><br>
                          </p></td>
                      </tr>
                     
 <tr> 
                        <td align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;  <a  target="_blank" href="ndoc/4pbfo-balkancar.pdf"><br>
                          <img src="ndoc/record_3s1.jpg" alt="1" width="200" border="0"><br>
                            </a><br> </td>
 
                              <td align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;<a  target="_blank" href="ndoc/5odku-balkancar.pdf"><br>
                            <img src="ndoc/record_3s2.jpg" alt="1" width="200" border="0"><br>
                            </a><br></td>
                                                   <td align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;<a target="_blank" href="ndoc/6odvi-balkancar.pdf"><br>
                            <img src="ndoc/record_3s3.jpg" alt="1" width="200" border="0"><br>
                            </a><br></td>
                 
     </tr>
    
 </tr>
                     
 <tr> 
                        <td align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;  <a target="_blank" href="ndoc/7pcd1-balkancar.pdf"><br>
                            <img src="ndoc/record_2s1.jpg" alt="1" width="200" border="0"><br>
                            </a><br> </td>
 
                              <td align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;<a target="_blank" href="ndoc/8pcd2-balkancar.pdf"><br>
                            <img src="ndoc/record_2s2.jpg" alt="1" width="200" border="0"><br>
                            </a><br></td>
                                                   <td align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;<a target="_blank" href="ndoc/9pcd3-balkancar.pdf"><br>
                            <img src="ndoc/record_2s3.jpg" alt="1" width="200" border="0"><br>
                            </a><br></td>
                 
     </tr>

</tr>
                     
 <tr> 
                        <td align="center" valign="middle" bgcolor="#E9EEF1">&nbsp;  <a target="_blank" href="ndoc/10dosa-balkancar.pdf"><br>
                            <img src="ndoc/record_2sr1.jpg" alt="1" width="200" border="0"><br>
                            </a><br> </td>
 
                              <td align="center" valign="top" bgcolor="#E9EEF1">&nbsp;<a target="_blank"href="ndoc/11paln-balkancar.pdf"><br>
                            <img src="ndoc/record_2sr2.jpg" alt="1" width="200" border="0"><br>
                            </a><br></td>
                                                   <td align="center" valign="top" bgcolor="#E9EEF1">&nbsp;<a target="_blank"href=""><br>
                            <img src="ndoc/record_2sr3.jpg" alt="1" width="200" border="0"><br>
                            </a><br></td>
                 
     </tr>

                  
                  </table>


</td>
          </tr>
        </table></td>
        <td width="172" valign="top"><?php include("rside.php"); ?></td>
      </tr>
    </table></td>
  </tr>
</table>
</div>
</body>
<?php require_once("footer.php"); ?>
</html>
