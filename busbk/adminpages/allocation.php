
 <form id="form1" name="form1" method="post" action="">

  <table width="100%" border="1" align="left" cellpadding="10">
    <tr>
      <td>Shedule Name</td>
        <td><label for="txt_sn"></label>
        <input type="text" name="txt_sn" id="txt_sn" /></td>
      <td width="337" rowspan="6" valign="top">
        <ul id="demos-list">
            
            <li class="demo">
              
              <div class="box">
                <div id="with-altField"></div>
                <input type="text" id="altField" name="altField" >
                </div>
              
              <div class="code-box">
                <h4>Code used</h4>
                <pre class="code prettyprint" style="visibility:hidden">
$('#with-altField').multiDatesPicker({
	altField: '#altField'
});</pre>
                </div>
              </li>
            </ul>
          
          
          <?php
					/*$mystring=$_POST['txt_dates'];
                    $myArray = explode(',', $myString);
					echo count($mystring);*/
                    ?>
          
      </td>
    </tr>
    <tr>
      <td width="164">Bus Name</td>
      <td width="337"><label>
        <select name="sel_bus" id="sel_bus">
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
          </select>
      </label></td>
    </tr>
    <tr>
      <td>Seat Layout Name</td>
      <td><select name="sel_layout" id="sel_layout">
        <?php 
		   $db->close();
		   $db->connect();
		   $res=$db->select_layout();
		    for($index=0; $index<count($res); $index++){
		  ?>
        <option value="<?php echo $res[$index]['seatlayout_id'];?>">
          <?php echo $res[$index]["seatlayout_name"];?>
          </option>
        <?php
	     }
		        
		?>
      </select></td>
    </tr>
    <tr>
      <td>Bus Type Name</td>
      <td><label for="sel_bustype"></label>
        <select name="sel_bustype" id="sel_bustype">
        <?php 
		   $db->close();
		   $db->connect();
		   $res=$db->select_bustype();
		    for($index=0; $index<count($res); $index++){
		  ?>
	<option value="<?php echo $res[$index]['bustype_id'];?>">
		  <?php echo $res[$index]["bustype_name"];?>
       </option>
	    <?php
	     }
		        
		?>
      </select></td>
    </tr>
    <tr>
      <td>Conductor</td>
      <td><select name="sel_conductor" id="sel_conductor">
        <?php 
		   $db->close();
		   $db->connect();
		   $res=$db->select_conductor();
		    for($index=0; $index<count($res); $index++){
		  ?>
        <option value="<?php echo $res[$index]['conductor_id'];?>">
          <?php echo $res[$index]["conductor_name"];?>
          </option>
        <?php
	     }
		        
		?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Submit" />
      <input name="reset" type="reset" id="reset" value="Reset" /></td>
    </tr>
    <tr>
      <td colspan="2" id="w">Allocation Deatils</td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr id="hed">
      <td colspan="2"><table width="500" border="1">
        <tr>
          <td>
          <table width="500" border="1">
            <tr>
              <td>Shedule Name</td>
              <td>Bus Name</td>
              <td>Layout Name</td>
              <td>Bus Type</td>
              <td>Conductor</td>
            </tr>
            <?php  
   $con=$db->connect();
		   $r=$db->Select_Alocationn();
  for ($i=0;$i<count($r);$i++){ ?>
            <tr>
              <td><?php echo $r[$i]["allocation_name"]; ?></td>
              <td><?php echo $r[$i]["seatlayout_name"]; ?></td>
              <td><?php echo $r[$i]["bus_regno"]; ?></td>
              <td><?php echo $r[$i]["bustype_name"]; ?></td>
              <td><?php echo $r[$i]["conductor_name"]; ?></td>
            </tr>
            <?php } ?>
          </table></td>
        </tr>
      </table></td>
      <td valign="top">&nbsp;</td>
    </tr>
  </table>
</form>



<?php

if(isset($_POST['Submit']) && ($_POST['Submit']!=null))
{

	$mystring=$_POST['altField'];

$myArray = explode(',', $mystring);
//echo count($myArray);
	//echo $mystring;
	$shedule=$_POST['txt_sn'];
	$bus=$_POST['sel_bus'];
	$layout=$_POST['sel_layout'];
	
	$btype=$_POST['sel_bustype'];
	$con=$_POST['sel_conductor'];
	
	echo $bus."   ";
	echo $layout."   ";
	
	echo $btype."   ";
	echo $con."   ";
	
	$db->close();
	$db->connect();
	$result=$db->store_allocation($shedule,$bus,$layout,$btype,$con);
	
	if($result!=false)
	{
		
		echo "success";
	}
	else
	{
		echo "not success";

		
	}
	$allotid=$db->select_allocationid();
	$db->close();
	$db->connect();
	
     $j=0;
	while($j<count($myArray))
	{
	$db->close();
	$db->connect();
	$res=$db->store_allocationdate($allotid,$myArray[$j]);
	$j++;
	}
	
	
}



?>


