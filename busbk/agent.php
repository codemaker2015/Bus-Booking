
<form id="frm_agentregistration" name="frm_agentregistration" method="post" action="">
  <table width="100%" border="1" align="left" cellpadding="10">
    <tr>
      <td colspan="4">Before You Fill the apllication form Please read the terms and conditions carefully</td>
    </tr>
    <tr>
      <td width="87">Agent Name </td>
      <td width="210"><input name="txt_name" type="text" id="txt_name" size="35"/></td>
      <td width="54">E-Mail ID </td>
      <td width="219"><input name="txt_emailid" type="text" id="txt_emailid" size="35" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label>
        <input type="radio" name="gender" value="M" />
        Male</label>
        <label>
          <input type="radio" name="gender" value="F" />
      Female</label></td>
      <td>Age</td>
      <td><input name="txt_age" type="text" id="txt_age" size="15" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input name="txt_password" type="password" id="txt_password" size="35" /></td>
      <td>Shop Name</td>
      <td><label></label>
          <p>
            <input name="txt_shopname" type="text" id="txt_shopname" size="35" />
            <br />
        </p></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txt_address" cols="28" id="txt_address"></textarea></td>
      <td>Pin Code </td>
      <td><input name="txt_pincode" type="text" id="txt_pincode" size="35" /></td>
    </tr>
    <tr>
      <td>Shop Registration Number </td>
      <td><input name="txt_shopregno" type="text" id="txt_shopregno" size="35" /></td>
      <td>Mobile Number </td>
      <td><input name="txt_mobile1" type="text" id="txt_mobile1" size="35" /></td>
    </tr>
	<tr>
      <td>Alternative Contact Number </td>
      <td><input name="txt_landline" type="text" id="txt_landline" size="35" /></td>
      <td>Account Number </td>
      <td><input name="txt_accountno" type="text" id="txt_accountno" size="35" /></td>
    </tr><tr>
      <td>Bank Name </td>
      <td><select name="sel_bankname">
        <option value="SBI">State Bank Of India </option>
        <option  value=" SBT">State Bank Of Travancore </option>
      </select></td>
      <td>State</td>
      <td><select name="sel_state" onchange="showselect(this.value)">
      
       <?php 
	   
	      $db->close();
		   $db->connect();
		   $res=$db->select_state();
		    for($index=0; $index<count($res); $index++){
		  ?>
	<option value="<?php echo $res[$index]['state_id'];?>">
		  <?php echo $res[$index]["state_name"];?>
       </option>
	   <?php } ?>
      </select></td>
    </tr>
	<tr>
	  <td>District</td>
	  <td> <div id="distdiv">  <select name="sel_district" id="sel_district">
	    
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
      </select></div></td>
	  <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
	<tr>
      <td colspan="4"><input type="checkbox" name="checkbox" id="checkbox">
      <label for="checkbox">I accept the terms and conditions</label></td>
    </tr><tr>
      <td colspan="4"><div align="center">
        <input type="submit" name="Submit" value="Submit" />
        <input name="reset" type="reset" id="reset" value="Reset" />
      </div></td>
      </tr>
  </table>
</form>
<?php
if(isset($_POST['Submit']) && ($_POST['Submit']!=null))
{
$a=$_POST['txt_name'];
$b=$_POST['txt_emailid'];
$c=$_POST['txt_password'];
$d=$_POST['gender'];
$e=$_POST['txt_age'];
$f=$_POST['txt_shopname'];
$g=$_POST['txt_address'];
$h=$_POST['txt_pincode'];
$i=$_POST['txt_shopregno'];
$j=$_POST['txt_mobile1'];
$k=$_POST['txt_landline'];
$l=$_POST['txt_accountno'];
$m=$_POST['sel_bankname'];
$n=$_POST['sel_state'];
$o=$_POST['sel_district'];
$p='27/10/2012';
$db->close();
$db->connect();
$result=$db->store_agent($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p);
if($result!=false)
	echo "success";
	else
	echo "not success";

}

?>