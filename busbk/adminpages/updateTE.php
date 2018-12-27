<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="testMonDelete.php">
 
  <table width="100%" border="0" cellspacing="3">
    <tr>
      <td scope="col">Text</td>
      <td scope="col"><input type="text" name="textName" id="textfield" value="<?php echo $txt; ?>"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="radio" name="RadioGroup1" value="0" id="RadioGroup1_1" />
Accept
  <input type="radio" name="RadioGroup1" value="1" id="RadioGroup1_0" />
Reject </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Update" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
$val=$_POST['RadioGroup1'];
include('connection/DB_Functions.php');
$db=new DB_Functions();

		   $db->connect();
		   $res=$db->update_testimonial($val);

 
?>