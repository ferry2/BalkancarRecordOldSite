<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>

<head>
<title>Get MboxInfo</title>
</head>

<body>
<form action="outlog.asp" method="POST">
<table>
<tr>
	<td>From</td>
	<td><input type="text" name="fromDate" value=<%= DateAdd("d",-7,Date) %>></td>
</tr>
<tr>
	<td>TO</td>
	<td><input type="text" name="toDate" value=<%=Date %>></td>
</tr>
<tr>
	<td></td>
	<td><input type="Submit" value="Submit">&nbsp;<input type="reset"> </td>
</tr>
</table>
</form>
</body>
</html>
