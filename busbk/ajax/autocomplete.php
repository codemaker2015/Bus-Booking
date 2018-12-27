<?php
	$q=$_GET['q'];
	
	$mysqli=mysqli_connect('localhost','root','','mydb') or die("Database Error");
	$sql="SELECT stop_name FROM tb_stop WHERE stop_name LIKE '%$q%' ORDER BY stop_name";
	$result = mysqli_query($mysqli,$sql) or die(mysqli_error());
	
	if($result)
	{
		while($row=mysqli_fetch_array($result))
		{
			echo $row['stop_name']."\n";
		}
	}
?>