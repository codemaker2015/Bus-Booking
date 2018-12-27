<?php
session_start();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EezzY TicketZ</title>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/tablestyle.css"/>
<style type="text/css">
img.expando{ /*sample CSS for expando images. Not required but recommended*/
border: none;
vertical-align: top; /*top aligns image, so mouse has less of a change of moving out of image while image is expanding*/
}
.vsblShow
{
	display:block;
	border:none;
}
#resdiv
{
	display:none;
}
#logout
{
	display:none;
}
#c
{
	display:none;
}
.subMenuss
{
	color:#06C;
	font-size:14px;
	font-style:italic;
	
}
</style>
</head>
<body>
<div id="log"></div>
<div id="container">
<h1>Sucessfully Logout</h1>
<p>Go to Login page.</p><a href="index.php">Click here </a>
</div>
</body>
</html>