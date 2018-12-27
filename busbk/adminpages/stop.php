
<form id="form1" name="form1" method="post" action="">
  <table width="50%" border="1" align="left" cellpadding="10">
    <tr>
      <td width="50">Stop Name </td>
      <td width="216"><label>
        <input name="txt_stopname" type="text" id="txt_stopname" size="35"/>
      </label></td>
    </tr>
    <tr>
      <td>State</td>
      <td><label for="sel_state"></label>
        <select name="sel_state" id="sel_state" onchange="showselect(this.value)">
        
        
        <?php 
		   $db->close();
		   $db->connect();
		   $res=$db->select_state();
		   while($row=mysql_fetch_array($res)){
		  ?>
	<option value="<?php echo $row['state_id'];?>">
		  <?php echo $row["state_name"];?>
       </option>
	    <?php
	     }
		        
		?>
      
      </select></td>
    </tr>

    <tr>
      <td>District</td>
      <td><p>
      <div id="distdiv">  
         <select name="sel_district" id="sel_district">
        <?php 
		   $db->close();
		   $db->connect();
		   $res=$db->select_district();
		    for($index=0; $index<count($res); $index++){
		  ?>
	<option value="<?php echo $res[$index]['district_id'];?>">
		  <?php echo $res[$index]["district_name"];?>
       </option>
	    <?php
	     }
		        
		?>
        
        </select>
        </div>
      </p></td>
    </tr>

    <tr>
      <td>RTO Stop Id </td>
      <td><p>
        <input name="txt_rto" type="text" id="txt_rto" size="35" />
      </p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit" />
        <input name="reset" type="reset" id="reset" value="Reset" />
      </label></td>
    </tr>
  </table>
</form>

<?php
if(isset($_POST['Submit']) && ($_POST['Submit']!=null))
{
	$stopname=$_POST['txt_stopname'];
	$state=$_POST['sel_state'];
	$district=$_POST['sel_district'];
    $rto=$_POST['txt_rto'];
	$db->close();
	$db->connect();
	$result=$db->store_stop($stopname,$state,$district,$rto);
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

