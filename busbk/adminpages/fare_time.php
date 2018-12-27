
<form id="form1" name="form1" method="post" action="">
  <table width="50%" border="1" align="left" cellpadding="10">
    <tr>
      <td width="82">Bus Number </td>
      <td width="210"><label>
        </label>
        <label for="sel_busno"></label>
        <select name="sel_busno" id="sel_busno">
        
         <?php 
		   $db->close();
		   $db->connect();
		   $res=$db->select_bus();
		    for($index=0; $index<count($res); $index++){
		  ?>
	<option value="<?php echo $res[$index]['bus_id'];?>">
		  <?php echo $res[$index]["bus_regno"];?>
       </option>
	    <?php
	     }
		        
		?>
        </select></td>
    </tr>
    <tr>
      <td>Stop Name </td>
      <td><select name="sel_stopname" id="sel_stopname">
       <?php 
		 $db->close();
		 $db->connect();
            $res= $db->select_stop();
		      
		 for($index=0; $index<count($res); $index++){
		  ?>
	<option value="<?php echo $res[$index]['stop_id'];?>">
		  <?php echo $res[$index]["stop_name"];?>
       </option>
	    <?php
	     }
          ?>
      </select></td>
    </tr>
    <tr>
      <td>Fare</td>
      <td><input name="txt_fare" type="text" id="txt_fare" size="35" /></td>
    </tr>

    <tr>
      <td>Reaching Time </td>
      <td><label>
        <input name="txt_time" type="text" id="txt_time" size="15" />
        <input name="btn_add" type="submit" id="btn_add" value="ADD" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="reset" type="reset" id="reset" value="Reset" /></td>
    </tr>
  </table>
</form>

 <?php

	
	 if (isset($_POST['btn_add'])) 
     {
		
      if ($_POST["btn_add"]=="ADD")
       {
	
	$bid=$_POST['sel_busno'];
	$stop=$_POST['sel_stopname'];
	$fare=$_POST['txt_fare'];
	$time=$_POST['txt_time'];
	echo $bid ."  ";
	echo  $stop."  ";
	echo $fare."  ";
	echo $time."  ";
	$db->close();
	$db->connect();
	$result=$db->store_faretime($bid,$stop,$fare,$time);
	echo $result;
	if($result!=false)
	echo "success";
	else
	echo "not success";
	}
	
	}
?>

