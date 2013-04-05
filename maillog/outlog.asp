<%
	Dim MBoxName,FromDate,ToDate
    Dim fs, f, s , i,dateslogs

	FromDate =REquest("FromDate")
	ToDate =REquest("ToDate")
	If (NOT IsDate(FromDate)) or (NOT IsDate(FromDate)) then  
		Response.Redirect "default.asp?err=invaliddate"
	end if
%>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Mailbox Info</title>
</head>

<body>

<p>Log records for email <%=MBoxName%> <br>
<%
	'Response.write "Test"
	Const ForReading = 1, ForWriting = 2, ForAppending = 3
    Const TristateUseDefault = -2, TristateTrue = -1, TristateFalse = 0
    'Dim fs, f, ts, s
    
	function ctodaymonth(currdate)
		tmpm=Month(currdate)
		if tmpm>9 then
			ctodaymonth=tmpm
		else
			ctodaymonth="0"&tmpm
		end if 
	end function
	
	function ctodayday(currdate)
		tmpm=Day(currdate)
		if tmpm>9 then
			ctodayday=tmpm
		else
			ctodayday="0"&tmpm
		end if 
	end function
	
	function ctodayyear(currdate)
		ctodayyear=CSTR(Year(currdate)-1900)
	end function
	
	MBoxName= "@balkancar-record.com"
	Set fs = CreateObject("Scripting.FileSystemObject")

dateslogs= DateDiff("d",  CDate(FromDate),  CDate(ToDate)) 
for i=0 to 	dateslogs 
	currdate=DAteAdd("d",i,fromDate)
	tmpName = ctodayyear(currdate) & ctodaymonth(currdate) & ctodayday(currdate) 
	logname="D:\emwac\MAIL\outlog\"&tmpName&".log"
	Set ts = fs.OpenTextFile(logname,ForReading, TristateFalse)
	Do While ts.AtEndOfStream <> True
   		s = ts.ReadLine
		If InStr(1,s,MBoxName,vbTextCompare) then
			response.write Right(s,  Len(s)-43)
			response.write "<br>"
		end if
	Loop

	Set ts = Nothing
next 
	Set f = Nothing
	Set fs = Nothing
%><a href="default.asp">BACK</a> </p>
</body>
</html>
