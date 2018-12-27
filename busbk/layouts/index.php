<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EEZZY TICKETZt</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<script type="text/javascript" src="js/ajaxscript.js"></script>
<script type="text/javascript" src="js/datetimepicker.js"></script>


<!--  gallery image expando script starts -->
<style type="text/css">
img.expando{ /*sample CSS for expando images. Not required but recommended*/
border: none;
vertical-align: top; /*top aligns image, so mouse has less of a change of moving out of image while image is expanding*/
}
</style>
<script type="text/javascript" src="js/expando.js"></script>
<!--  gallery image expando script ends -->

<!-- auto complete script starts*/ -->
</script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<script>
$(document).ready(function(){
 $("#txt_sl").autocomplete("Ajax/autocomplete.php", {
		selectFirst: true
	});
});

$(document).ready(function(){
 $("#txt_el").autocomplete("Ajax/autocomplete.php", {
		selectFirst: true
	});
});
</script>
<!-- auto complete script ends-->
<!-- date picker script starts-->

  
<!-- auto date picker script ends-->
</head>



<body>
<table width="100%" border="5" align="center"  >
  <tr>
    <td width="7%">&nbsp;</td>
    <td width="86%">
    <!--header starts here-->
     <?php
	  require_once('/connection/DB_Functions.php');
		$db=new DB_Functions();
		$db->connect();
		//require_once('/connection/CommonFunctions.php');
		//$obj=new CommonFunctions();
		//$obj->test();
	 include('header.php');
	 ?>
    <!--header ends here-->
    </td>
    <td width="7%">&nbsp;</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <!-- menu starts here -->
    <td>
    <!-- menu starts here -->
     <?php
	 
	 include('menu.php');
	 ?>
  
    
     <!-- menu starts here -->
    </td>
   <!-- menu ends here -->
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <!-- content starts here -->
    
    <?php 
	if(isset($_GET['val'])){
	echo $_GET['val'];
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
	include("passengerdetails.php");
	break;
	}
	}
	}
		
	?>
    <!--content ends here -->
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <!-- footer starts here-->
      <?php
	 
	 include('footer.php');
	 ?>
    <!-- footer sends here-->
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>