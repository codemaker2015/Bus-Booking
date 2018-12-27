<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EezzY TicketZ</title>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script type="text/javascript">
function checkCredit()
{
	if((document.getElementById("txtcardNo").value=="")&&(document.getElementById("Expdate").value=="0")&&(document.getElementById("Expdate").value=="0"))
	{
		alert("Please Fill Credit card information");
		return false;
	}
}
function confirm1(rid)
{
	
}

(function(window) {
  if (window.location !== window.top.location) {
    window.top.location = window.location;
  }
})(this);

</script>
<body>
 <form id="form22" name="form22" method="post" action="" onsubmit="return checkCredit(); ">
	<?php
	  require_once('connection/DB_Functions.php');
		$db=new DB_Functions();
		$db->connect();
		//include_once("sessionCheck.php");
    $se=explode(",",$_GET["seats"]);
	$allotid=$_GET["allotID"];
    $allotdate=$_GET["allotDATE"];
    $layoutname = $_GET["layoutNA"];
    $routeid=$_GET["routeID"];
	$cnt=count($se)-1;
	
	for($i=$cnt-1,$j=0;$i>=0;$i--,$j++)
	{
		echo $se[$i];
		$seat[$j]=$se[$i];
	}
	
	
	 ?>
<div id="container">
<!--Headerrrr-->
<div>
<div id="log">
  <div id="menu" >
    <ul id="coolMenu">
      <li><a href="index.php?val=1">Home</a></li>
      <li><a href="index.php?val=2">Services</a></li>
      <li><a href="index.php?val=3">About Us</a></li>
      <li><a href="index.php?val=4">Gallery</a></li>
      <li><a href="index.php?val=5">Testimoninal</a></li>
            <li><a href="index.php?val=6">Contact Us</a></li>
    </ul>
  </div>
</div>
</div>
<!--Headerrrr-->

<div class="mainTag">
<div class="clear" ></div>
<div id="payDisp" class="mainTag">  
<table width="100%"  align="center"  >
<tr>
    <td width="7%">Total seats</td>
    <td width="7%"> <?php echo  $cnt; ?></td>
    <td width="7%">Amount</td>
    <td width="7%"><?php echo  $cnt*1000; ?></td>
    </tr>
    </table>
    </div>
    
<div class="clear" >

</div>
<div id="passDisp" class="mainTag">
<!-- pass disp strats-->
 <table width="100%" border="0" align="center" cellspacing="3">
            <tr>
              <td colspan="3" align="left" class="ac_over">Personal Details</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="120" align="center"><div align="right">ID Proof Type</div></td>
              <td width="155"><label for="txt_idtype"></label>
                <label for="txt_prooftype"></label>
                <input type="text" name="txt_prooftype" id="txt_prooftype" /></td>
              <td width="170"><div align="right">Name On ID</div></td>
              <td width="232"><label for="txt_name"></label>
                <input type="text" name="txt_name" id="txt_name" /></td>
              </tr>
            <tr>
              <td align="center"><div align="right">ID Proof Number</div></td>
              <td><label for="txt_proofno"></label>
                <input type="text" name="txt_proofno" id="txt_proofno" /></td>
              <td><div align="right">E-Mail ID</div></td>
              <td><label for="txt_email"></label>
                <input type="text" name="txt_email" id="txt_email" /></td>
              </tr>
            <tr>
              <td><div align="right">Mobile Number </div></td>
              <td><label for="txt_mob"></label>
                <div align="justify">
                  <input type="text" name="txt_mob" id="txt_mob" />
                  </div></td>
              <td><div align="right">Address</div></td>
              <td><div align="justify">
                <label for="txt_address"></label>
                <input type="text" name="txt_address" id="txt_address" />
                </div></td>
              </tr>
            
            
            </table>
          
          
</div> 
<!-- pass disp ends-->
<div class="clear" ></div>
<div id="passData" class="mainTag">
<!--  div pass data starts-->
<table width="700" border="0" cellspacing="3">
  <tr>
   <th width="197" scope="col">Seat No</th>
    <th width="197" scope="col">Name</th>
    <th width="134" scope="col">Gender</th>
    <th width="149" scope="col">Age</th>
  </tr>
  <?php
  $i=0;
  while($i<$cnt)
  {  ?>
  <tr>
  <td align="center"><?php echo $seat[$i] ?>
   </td>
    <td><div align="center">
     <input type="text" name="txtname<?php echo $i ?>" >
    </div></td>
    <td align="center">
      <label>
         <input type="radio" name="RadioGroup<?php echo $i ?>" value="male">
        Male</label>
      
      <label>
        <input type="radio" name="RadioGroup<?php echo $i ?>" value="female">
        Female</label>
      
    </td>
    <td><label for="textfield8"></label>
      <div align="center">
        <input type="text" name="txtage<?php echo $i ?>" >
      </div></td>
  </tr>
<?php $i++;}?>
</table>
<table width="500" border="0">
  <tr>
    <td colspan="3" class="ac_over">Payment Information</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="152">Card Type</td>
    <td colspan="2"><select name="Expdate3" id="Expdate3">
      <option value="0" selected="selected">Select</option>
      <option value="1">Visa</option>
      <option value="2">Master</option>
      
    </select></td>
  </tr>
  <tr>
    <td>Card No</td>
    <td colspan="2"><input name="txtcardNo" type="text" id="txtcardNo" /></td>
  </tr>
  <tr>
    <td>Exp Date</td>
    <td width="65"><label for="Expdate"></label>
      <select name="Expdate" id="Expdate">
<option value="0">Select</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select> </td>
    <td width="269"><select name="Expdate2" id="Expdate2">
    <option value="0">Select</option>
      <option value="2013">2013</option>
      <option value="2013">2014</option>
      <option value="2013">2015</option>
      <option value="2013">2016</option>
      <option value="2013">2017</option>
      <option value="2013">2018</option>
      <option value="2013">2019</option>
      <option value="2013">2020</option>
      <option value="2021">2021</option>
      <option value="2023">2023</option>
      <option value="2024">2024</option>
      <option value="2025">2025</option>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</div><!--  div pass data ends-->
<div class="clear" ></div>

<div id="divsubmit"  class="mainTag" align="center">
<input type="submit" name="Submit" value="Submit" /></div>
</div>
</div>
</div>
</div>
</form>
</body>


   <?php

if(isset($_POST['Submit']) && ($_POST['Submit']!=null))
{
	$pt=$_POST['txt_prooftype'];
	$pno=$_POST['txt_proofno'];
	$mob=$_POST['txt_mob'];
	$na=$_POST['txt_name'];
	$email=$_POST['txt_email'];
	$addr=$_POST['txt_address'];
	$na=$_POST['txt_name'];
	$j=0;
	$db->close();
	$db->connect();
	$result=$db->store_reservation(0,'ok',$pt,$cnt,$pno,$mob,$email,$addr,$na);
	$recId=$db->GetMaxResvid();
	$resid;
	if ($rec=mysql_fetch_array($recId))
	{
	$resid=$rec['reservation_id'];
	}
	 while($j<$cnt)
	{
	$db->close();
	$db->connect();
	$stno=$seat[$j];
	$result=$db->store_bkdseats($allotid,$allotdate,$stno,$routeid);
	$sid[$j]=$result[0]['bkdseats_id'];
	$sid=$result[0]['bkdseats_id'];
	$txt="txtname".$j;
	$gen="RadioGroup".$j;
	$txtage="txtage".$j;
	$uname=$_POST[$txt];
	$genderRadio=$_POST[$gen];
	$UserAge=$_POST[$txtage];
	$db->close();
	$db->connect();
	echo "   sid:   ". $sid[$j];
	echo "   resid  ".$resid;
	echo "   name ".$uname;
	echo "   seatno:  ".$stno;
	echo "   gender:  ".$genderRadio;
	echo "  age:  ".$UserAge;
	$res=$db->store_passenger($sid,$resid,$uname,$stno,$genderRadio,$UserAge);
	$j++;
	}
	echo "<script>document.location.href=\"PrintTicket.php?resid=".$resid."\"</script>";
	
			    
 }

?>
        
</html>