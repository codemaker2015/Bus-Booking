
<form id="bus_reg_form" name="bus_reg_form" method="post" action="">
  <table width="100%" border="1" align="left" cellpadding="10">

    <tr>
      <td width="149">RegistrationNumber </td>
      <td width="344"><input name="txt_registerno" type="text" id="txt_registerno" size="35" /></td>
    </tr>
    <tr>
      <td>Bus Model Name </td>
      <td><label></label>
          <p>
            <label></label>
            <textarea name="txt_busmodel" cols="35" id="txt_busmodel"></textarea>
            <br />
        </p></td>
    </tr>
    <tr>
      <td>Register Date </td>
      <td><input name="txt_registerdate" type="text" id="txt_registerdate" size="35" /></td>
    </tr>
    <tr>
      <td>Total Seats </td>
      <td><input name="txt_totalseats" type="text" id="txt_totalseats" size="35" /></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="btn_submit" value="Submit" id="btn_submit" />
        <input name="btn_reset" type="reset" id="btn_reset" value="Reset" />
      </label></td>
    </tr>
    <tr id="w">
      <td colspan="2">Bus Details</td>
    </tr>
    <tr>
      <td colspan="2"><table width="550" border="0">
        <tr id="hed">
          <td width="153">Registration No</td>
          <td width="131">Model Name</td>
          <td width="167">Registration Date</td>
          <td width="47">Total Seat</td>
        </tr>
         <?php  
		  $con=$db->connect();
		   $res=$db->select_bus();
		   for ($i=0;$i<count($res);$i++){ 
          ?>
        <tr>
          <td><?php echo $res[$i]['bus_regno'];?></td>
          <td><?php echo $res[$i]['bus_modelname'];?></td>
          <td><?php echo $res[$i]['bus_regdate'];?></td>
          <td><?php echo $res[$i]['bus_totalseats'];?></td>
        </tr>
        <?php
		   }
		?>
      </table></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<?php
if(isset($_POST['btn_submit']) && ($_POST['btn_submit']!=null))
{
	$regno=$_POST['txt_registerno'];
	$modelna=$_POST['txt_busmodel'];
	$regdate=$_POST['txt_registerdate'];
	$seats=$_POST['txt_totalseats'];
	  $db->close();
      $db->connect();
	$result=$db->store_bus($regno,$modelna,$regdate,$seats);
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

