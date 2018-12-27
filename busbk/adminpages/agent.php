<form action="" method="get">

<table width="100%" border="3" cellspacing="3">
  <tr>
    
    <th scope="col">ID</th>
    <th scope="col">NAME</th>
    <th scope="col">EMAILID</th>
    <th scope="col">PASSWORD</th>
    <th scope="col">GENDER</th>
    <th scope="col">AGE</th>
    <th scope="col">SHOP NAME</th>
    <th scope="col">ADDRESS</th>
    <th scope="col">PINCODE</th>
    <th scope="col">SHOP NO</th>
    <th scope="col">MOBILE</th>
    <th scope="col">LAND LINE</th>
    <th scope="col">ACCOUNT NO</th>
    <th scope="col">BANK NAME</th>
    <th scope="col">STATE</th>
    <th scope="col">DISTRICT</th>
    <th scope="col">DATE</th>
    <th scope="col">STATUS</th>
    </tr>
    <?php
	       $db->close();
		   $db->connect();
		   $res=$db->select_agent();
	while($row=mysql_fetch_array($res))
		{   $i=0;?>
			<tr>
          
			<?php while($i<mysql_num_fields($res))
			{ 
			?>
				<td>
				<?php echo $row[$i];
				$i=$i+1;
				 ?> 
                </td>
		<?php	}  ?>
           
	<?php
	echo $row[$i-1];
		if($row[$i-1]==0){?>
		<td><input type="checkbox" name='chk[]' value="1" ></td>
			<?php } else { ?>
		<td><input type="checkbox" name='chk[]' value="0" checked="checked" ></td>
	<?php } ?></tr> <?php } ?>

 
</table>

</form>
