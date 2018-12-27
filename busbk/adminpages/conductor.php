<style type="text/css">

</style>
<form name="form1" method="post" action="">
  <table width="100%" border="5" cellspacing="3">
    <tr>
      <td width="49%">Name</td>
      <td width="51%"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"></td>
    </tr>
    <tr>
      <td>Username</td>
      <td><label for="txt_un"></label>
      <input type="text" name="txt_un" id="txt_un"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pwd"></label>
      <input type="password" name="txt_pwd" id="txt_pwd"></td>
    </tr>
    <tr>
      <td>Re- Enter Password</td>
      <td><input type="password" name="txt_pwd" id="txt_pwd"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" id="Submit" value="Submit">
      <input type="reset" name="button2" id="button2" value="Reset"></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" id="w">Conductor Deatils</td>
    </tr>
    <tr>
      <td colspan="2">
     
      <table width="500" border="1">
  <tr id="hed">
    <td>Name</td>
    <td>Username</td>
    <td>Password</td>
    <td>&nbsp;</td>
  </tr>
   <?php  
   $con=$db->connect();
		   $r=$db->select_conductor();
  for ($i=0;$i<count($r);$i++){ ?>
  <tr>
 
    <td><?php echo $r[$i]["conductor_name"]; ?></td>
    <td><?php echo $r[$i]["conductor_un"]; ?></td>
    <td><?php echo $r[$i]["conductor_pwd"]; ?></td>
    <td>&nbsp;</td>
 
  </tr>
     <?php
  }
  ?>
</table>

       
      &nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">
   
         
      </td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
  
  
</form>
<?php
if(isset($_POST['Submit']) && ($_POST['Submit']!=null))
{
	$conname=$_POST['txt_name'];
	$conun=$_POST['txt_un'];
	$conpwd=$_POST['txt_pwd'];
    
	$db->close();
	$db->connect();
	$result=$db->store_conductor($conname,$conun,$conpwd);
	if($result!=false)
	{
		
		echo "success";
	}
	else
	{
		echo "not success";

		
	}
	
}

