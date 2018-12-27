<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EezzY TicketZ</title>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/tablestyle.css"/>

<script type="text/javascript" src="js/ajaxscript.js"></script>
<script type="text/javascript" src="js/datetimepicker.js"></script>
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script type="text/javascript">
function ticktefun()
{
	var person=prompt("Please enter your reservation no","Reservation No");
if (person!=null && person!="")
  {

var browsername=navigator.appName; 
if( browsername == "Netscape" )
{ 
   document.location.href="index.php1";
}
else if ( browsername =="Microsoft Internet Explorer")
{
 document.location.href="index.php1";
}
else
{
  document.location.href="index.php1";
}

	
	alert("hai");

  }
}

</script>
<!--  gallery image expando script starts -->
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
<script type="text/javascript" src="js/expando.js"></script><!--  gallery image expando script ends -->
<!-- auto complete script starts*/ -->





<script type="text/javascript">
$(document).ready(function(){
 $("#txt_sl").autocomplete("ajax/autocomplete.php", {
		selectFirst: true
	});
});

$(document).ready(function(){
 $("#txt_el").autocomplete("ajax/autocomplete.php", {
		selectFirst: true
	});
});
</script>
<!-- auto complete script ends-->

<script> 
$(document).ready(function(){
  $("#lgClick").click(function(){
    $("#loginWin").slideToggle("slow");
  });
});
</script>
</head>

<body>
<form action="loginAction.php" method="post">

<div id="loginBox">
<div><h5>Welcome :<?php if (isset($_SESSION["uname"])){
echo $_SESSION["uname"];?> <a href="logout.php">Logout</a>
<?php
}
else
echo "Guest";
 ?></h5> </div>
<?php if(isset($_SESSION["uname"]))
{
	
}
else
{
?>
<table width="250" border="0" cellspacing="3" id="lgDisplay">
  <tr>
    <th scope="col"><a href="#" id="lgClick">Login/</a></a></th>
    <th scope="col"><a href="index.php?val=9">Register/</a></th>
    <th scope="col">&nbsp;</th>
  </tr>
</table>

<div id="loginWin">

 <table width="100%" border="0" cellspacing="3">
  <tr>
    <td scope="col">&nbsp;username
    <td scope="col"><input type="text" name="uname" id="uname" />
   <td rowspan="2" valign="bottom"><input type="submit" name="Login" id="Login" value="Login"/></td>
    </tr>
  <tr>
    <td>Password</td>
    <td><input type="text" name="pwd" id="uname2" /></td>
    </tr>
</table>

</div>

<?php
}
?>
</div>
</form>
<?php
	  require_once('connection/DB_Functions.php');
		$db=new DB_Functions();
		$db->connect();
	 ?>
<div id="container">
<!--Headerrrr-->
<div>
<div id="log">
  <div id="menu" >
    <ul id="coolMenu">
      <li><a href="index.php?val=1">Home</a></li>
      <li><a href="index.php?val=2">Services</a></li>
      <li><a href="index.php?val=3">About Us</a></li>
      <li><a href="index.php?val=4">Gallery</a></li>
      <li><a href="index.php?val=5">Testimoninal</a></li>
            <li><a href="index.php?val=6">Contact Us</a></li>
            <li><a href="download/EEZY.apk">Download</a></li>
    </ul>
    <br />
    <table width="87%" border="0" cellspacing="3" >
  <tr>
  <?php if(isset($_SESSION["uname"]))
{ ?>
	<th width="12%" align="left" scope="col">&nbsp;</th>
    <th width="12%" align="left" scope="col">&nbsp;</th>
    <th width="9%" align="left" scope="col">&nbsp;</th>
    <th width="16%" align="left" scope="col"><a href="PrintTicket.php?pr=prtic" class="subMenuss" >Print Ticket</a></th>
    <th width="17%" align="left" scope="col"><a href="PrintTicket.php?pr=prtic" class="subMenuss">Status Ticket</a></th>
    <th width="15%" align="left" scope="col"><a href="#" class="subMenuss">SMS Ticket</a></th>
    <th width="19%" align="left" scope="col"><a href="PrintTicket.php?pr=cal" class="subMenuss">Cancel Ticket</a></th>
    <?php
}
 ?>
  </tr>
</table>

  </div>
</div>
</div>
<!--Headerrrr-->
  <?php if(isset($_GET["msg"])){
	?>
    <div><?php echo $_GET["msg"]; ?></div>
	<?php }
	?>
<div class="mainTag">

 <!-- content starts here -->
    
    <?php 
	if(isset($_GET['val']))
	{
		$val=$_GET['val'];
		echo "<script> showhide('$val')</script>";
		if($_GET['val']!="")
		{
		
		switch($_GET['val'])
		{
			case 1:
			include("search.php");
	        break;
	
		    case 2:
			include("service.php");
			break;
	
			case 3:
			include("about.php");
			break;
	
			case 4:
			include("gallery.php");
			break;
	
			case 5:
			include("testimonial.php");
			break;
			
			case 6:
			include("contact.php");
			break;
			
			case 7:
			include("agent.php");
			break;
			case 8:
			$se=$_GET["seats"];
			$sid=$_GET["SeatID"];
			include("passengerDetails.php");
			break;
			case 9:
			include("person.php");
			break;
			
		}
		}
	}
	else
	{
		include("search.php");
	}
		
	?>
    <!--content ends here -->
    
</div>
<div id="vsbl" class="vsblShow">
<div class="clear" ></div>
<div id="resdiv" class="mainTag" align="center">Search Result</div>
<div class="clear" ></div>
<div id="c" class="mainTag" align="center">Layout Display<iframe id="content" name="content" class="iframeFirst"></iframe></div>
</div>
</div>
</body>
</html>
