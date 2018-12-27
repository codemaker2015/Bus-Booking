<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css"/>
<title>Untitled Document</title>
<script>
function showselect(str)
{
if (str=="")
  {
  document.getElementById("distdiv").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("distdiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_district.php?q="+str,true);
xmlhttp.send();
}
</script>



<!-- calnedr script starts-->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		
		<title>EEZZY TICKETZ-ADMIN PANEL</title>
		
		
		<!-- loads jquery and jquery ui -->
		<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
		<script type="text/javascript" src="js/jquery.ui.core.js"></script>
		<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script>
		<!-- script type="text/javascript" src="js/jquery.ui.datepicker-es.js"></script -->
		
		<!-- loads mdp -->
		<script type="text/javascript" src="js/jquery-ui.multidatespicker.js"></script>
		
		<!-- mdp demo code -->
		<script type="text/javascript">
		<!--
			var latestMDPver = $.ui.multiDatesPicker.version;
			var lastMDPupdate = '2012-03-28';
			
			$(function() {
				// Version //
				//$('title').append(' v' + latestMDPver);
				$('.mdp-version').text('v' + latestMDPver);
				$('#mdp-title').attr('title', 'last update: ' + lastMDPupdate);
				
				// Documentation //
				$('i:contains(type)').attr('title', '[Optional] accepted values are: "allowed" [default]; "disabled".');
				$('i:contains(format)').attr('title', '[Optional] accepted values are: "string" [default]; "object".');
				$('#how-to h4').each(function () {
					var a = $(this).closest('li').attr('id');
					$(this).wrap('<'+'a href="#'+a+'"></'+'a>');
				});
				$('#demos .demo').each(function () {
					var id = $(this).find('.box').attr('id') + '-demo';
					$(this).attr('id', id)
						.find('h3').wrapInner('<'+'a href="#'+id+'"></'+'a>');
				});
				
				// Run Demos
				$('.demo .code').each(function() {
					eval($(this).attr('title','NEW: edit this code and test it!').text());
					this.contentEditable = true;
				}).focus(function() {
					if(!$(this).next().hasClass('test'))
						$(this)
							.after('<button class="test">test</button>')
							.next('.test').click(function() {
								$(this).closest('.demo').find('.box').removeClass('hasDatepicker').empty();
								eval($(this).prev().text());
								$(this).remove();
							});
				});
			});
		// -->
		</script>
		
		<!-- loads some utilities (not needed for your developments) -->
		
		<script type="text/javascript" src="js/prettify.js"></script>
		<script type="text/javascript" src="js/lang-css.js"></script>
		<script type="text/javascript">
		$(function() {
			prettyPrint();
		});
		</script>

<!-- calnedr script ends-->
<style type="text/css">
#cnt {
	border: thin solid #333333;
	color: #FFFFFF;
}
#w {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-large;
	color: #06C;
	background-color: #333;
}
#hed {
	font-family: Arial, Helvetica, sans-serif;
	font-size: medium;
	color: #06F;
	background-color: #333;
}
</style>
</head>

<body>
<?php
$db=null;
include('/connection/DB_Functions.php');
$db=new DB_Functions();
$con=$db->connect();
?>

<table width="100%" border="6">
  <tr>
    <td colspan="2"><div align="center"><h1>ADMIN PANEL</h1></div></td>
  </tr>
  <tr>
    <td height="630" valign="top" style="width: 19%">
    <!--admin menu Starts here-->
    <?php
	include('adminmenu.php');
	?>
    
    <!-- admin menu ends here-->
    </td>
    <td width="89%"  valign="top">
    <div id="cnt">
    <!--content Starts here-->
     <?php 
	 if(isset($_GET['val'])){
	echo $_GET['val'];
	
	if($_GET['val']!="")
	{
	switch($_GET['val'])
	{
	case 1:
	
	echo "<script type=text/javascript>";
    echo "window.location='adminpanel.php'";
    echo "</script>";
	//include("main.php");
	break;
	
	case 2:
	include("/adminpages/bus.php");
	break;
	
	case 3:
	include("/adminpages/route.php");
	break;
	
	case 4:
	include("/adminpages/bustype.php");
	break;
	case 5:
	include("/adminpages/fare_time.php");
	break;
	case 6:
	include("/adminpages/agent.php");
	break;
	case 7:
	include("/adminpages/seatlayout.php");
	break;
	case 8:
	include("/adminpages/stop.php");
	break;
	case 9:
	include("/adminpages/allocation.php");
	break;
	case 10:
	include("/adminpages/state_district.php");
	break;
	case 11:
	include("/adminpages/conductor.php");
	break;
	case 12:
	include("/adminpages/testimonial.php");
	break;
	}
	}
	 }
	?>
    
    <!-- content ends here-->
    </div>
    </td>
  </tr>
</table>
</body>
</html>