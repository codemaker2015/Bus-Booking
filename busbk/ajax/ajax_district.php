


<?php
$con=mysql_connect("localhost","root","");
		mysql_select_db("mydb",$con);
      $id=$_GET['q'];
	
     
		$sql="SELECT * FROM tb_district where state_id=".$id;
		$res=mysql_query($sql);
		 echo "<select id='sel_district' name='sel_district'>"; 
		 while($row=mysql_fetch_array($res))
		  {
		  ?>
	    <option value="<?php echo $row['district_id'];?>">
		  <?php echo $row['district_name'];?>
       </option>
	    <?php
	     }

  echo "</select>";
?>


