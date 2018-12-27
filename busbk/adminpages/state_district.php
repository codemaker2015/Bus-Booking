<table width="100%" border="0">
  <tr>
    <td width="56%"><form name="form1" method="post" action="">
      <table width="101%" border="0">
        <tr>
          <td colspan="2">STATE</td>
          </tr>
        <tr>
          <td width="23%">State Name</td>
          <td width="77%"><label for="state_txt_name"></label>
            <input type="text" name="state_txt_name" id="state_txt_name"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btn_submit" id="btn_submit" value="Submit">
            <input type="reset" name="state_btn_reset" id="button" value="Reset"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form></td>
    <td width="44%"><form name="form2" method="post" action="">
      <table width="100%" border="0">
        <tr>
          <td>DISTRICT</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Name</td>
          <td><label for="dis_txt_name"></label>
            <input type="text" name="dis_txt_name" id="dis_txt_name"></td>
        </tr>
        <tr>
          <td>State</td>
          <td><label for="dis_sel_state"></label>
          <?php  
		  $con=$db->connect();
		   $res=$db->select_state();
		  
          ?>
          <select name="dis_sel_state" id="dis_sel_state">
    <?php 
		  
		   
		   while($row=mysql_fetch_array($res)){
		  ?>
	<option value="<?php echo $row['state_id'];?>">
		  <?php echo $row["state_name"];?>
       </option>
	    <?php
	     }
		        
		?>
         
            </select>
        <?php ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="dis_btn_submit" id="dis_btn_submit" value="Submit">
            <input type="reset" name="dis_btn_reset" id="dis_btn_reset" value="Reset"></td>
        </tr>
      </table>
    </form></td>
  </tr>
  
  </table>
  
  
  <?php
    if (isset($_POST['btn_submit'])) 
     {
      if ($_POST["btn_submit"]=="Submit")
       {
   
    
  
	$st=$_POST['state_txt_name'];
	 $db->close();
		 $db->connect();
	$result=$db->store_state($st);
	
	if($result!=false)
	echo "success";
	else
	
		echo "not success";
   }
   else 
   echo "not ";
	}
?>

    
	 <?php

	
	 if (isset($_POST['dis_btn_submit'])) 
     {
      if ($_POST["dis_btn_submit"]=="Submit")
       {
	
	$dt=$_POST['dis_txt_name'];
	$stid=$_POST['dis_sel_state'];
	echo $dt;
	echo $stid;
	$db->close();
	$db->connect();
	$result1=$db->store_district($stid,$dt);
	echo $result1;
	if($result1!=false)
	
		
		echo "success";
	
	else
	
		echo "not success";

		
	   }
	
	
}
?>
