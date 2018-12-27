<html>
<body>
<form action="LoadTestData.php" method="post">
<?php
require_once('../connection/DB_Functions.php');

		$db=new DB_Functions();
		$db->connect();
$tId=$_REQUEST["q"];
echo $tId;
$res=$db->select_testimonialsById($tId);
  	for($index=0; $index<count($res); $index++)
			{ 
			
				echo "<table border='1'><tr><th>Text</th></tr>";
		  echo "<tr><td>".$res[$index]['testimonial_text']."</td></td>";
		  echo "<tr><td></td></tr>";
		  echo "</table>";
	?>	  
		 
     	


<table width="100%" border="0" cellspacing="3">
  
  <tr>
    <td>`
      <label for="txtName"></label>
      <input type="text" name="txtName" value="<?php echo $res[$index]['testimonial_text']?>" id="txtName"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 
</table>
<?php
			}
			if(isset($_POST['sub']) && ($_POST['sub']!=null))

{
	echo $_POST["txtName"];
}
?>
 <div>
  <input type='submit' name='sub' value='Update'/> </div>
</form>
</body>
</html>

