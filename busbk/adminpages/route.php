
<form id="form1" name="form1" method="post" action="">

          
  <table width="49%" border="1" align="left" cellpadding="10">

    <tr>
      <td width="87">Bus Shedule</td>
      <td width="364"><label for="select_start"></label>
        <label for="select"></label>
        <select name="sel_shedule" id="sel_shedule">
        
         <?php 
		   $db->close();
		   $db->connect();
		   $res=$db->select_allocation();
		    for($index=0; $index<count($res); $index++){
		  ?>
	<option value="<?php echo $res[$index]['allocation_id'];?>">
		  <?php echo $res[$index]["allocation_name"];?>
       </option>
	    <?php
	     }
		        
		?>
      </select></td>
    </tr>
    <tr>
      <td>Start Location </td>
      <td><select name="select_start" id="select_start">
        <?php 
		 $db->close();
		 $db->connect();
            $res= $db->select_stop();
		      
		 for($index=0; $index<count($res); $index++){
		  ?>
        <option value="<?php echo $res[$index]['stop_id'];?>"> <?php echo $res[$index]["stop_name"];?> </option>
        <?php
	     }
          ?>
      </select></td>
    </tr>
    <tr>
      <td>End Location</td>
      <td><select name="select_end" id="select_end">
        <?php 
                 
		 for($index=0; $index<count($res); $index++){
		  ?>
        <option value="<?php echo $res[$index]['stop_id'];?>"> <?php echo $res[$index]["stop_name"];?> </option>
        <?php
	     }
          ?>
      </select></td>
    </tr>
    <tr>
      <td>Fare      </td>
      <td><label for="textfield"></label>
     <input name="txt_fare" type="text" id="txt_fare" size="35" /></td>
    </tr>
    <tr>
      <td>Starting Time</td>
      <td><label for="textfield2"></label>
      <input name="txt_start" type="text" id="txt_start" /></td>
    </tr>
    <tr>
      <td>Ending Time</td>
      <td><label></label>
          <p>
            <label></label>
            <label for="select_end"></label>
            <input type="text" name="txt_end" id="txt_end" />
            <br />
        </p></td>
    </tr>
    <tr>
      <td>Total Running Time </td>
      <td><label>
        <input name="txt_total" type="text" id="txt_total" size="15" />
      Hours</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" />
        <input name="reset" type="reset" id="reset" value="Reset" /></td>
    </tr>
  </table>
</form>

<?php
if(isset($_POST['Submit']) && ($_POST['Submit']!=null))
{
	$shedule=$_POST['sel_shedule'];
	$start=$_POST['select_start'];
	$end=$_POST['select_end'];
	$fare=$_POST['txt_fare'];
	$st=$_POST['txt_start'];
	$et=$_POST['txt_end'];
	$time=$_POST['txt_total'];
        
		  
		 $db->close();
		 $db->connect();

	$result=$db->store_route($shedule,$start,$end,$fare,$st,$et,$time);
	
	if($result!=false)
	{
		
		echo "success";
	}
	else
	{
		echo "not success";

		
	}
	
}

?>



