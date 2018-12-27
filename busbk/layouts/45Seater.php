<?php
$allotid=$_GET["allotid"];
$allotdate=$_GET["allotdate"];
$layoutname = $_GET["layout"];
$routeid=$_GET["routeid"];
$selectedseats=array();
$seatResult = array();
$selSeat=array();
  require_once('DB_Functions.php');
		$db=new DB_Functions();
		$db->connect();

$res=$db->select_bkdseats($allotid,$allotdate,$layoutname,$routeid);
            if(count($res)==0)
			{
				//echo "no seats selected yet";
				
			}
			else
			{
		   	for($index=0; $index<count($res); $index++)
			{
		 // echo $res[$index]['seatno']."  ";
		 
     		}
			}
		 $seatResult =  $res;
		
		 
    
if(isset($_POST['next']) && ($_POST['next']!=null)){
	
        $db->close();
	    $db->connect();
	
	    echo "SELECTED SEATS ARE:  ";
		$j=0;
	  if(!empty($_POST['chk'])) {
	    foreach($_POST['chk'] as $check){
			echo $check."   ";
		$selSeat=$check.",".$selSeat;
	
			
			
			$j++;
			
		}
	}
	
	$db->close();
	$db->connect();
	$res=$db->select_bkdseats($allotid,$allotdate,$layoutname,$routeid);		   
	$seatResult =  $res;
	echo "<script>document.location.href=\"../PaDeatils.php?val=8&seats=".$selSeat."&allotID=".$allotid."&allotDATE=".$allotdate."&layoutNA=".$layoutname."&routeID=".$routeid."\"</script>";
    
   } 


 function checkBookedSeat($seatNumber,$seatResult){
	  
	 foreach($seatResult as $result){
			
				if (in_array($seatNumber, $result)) {
					
					return 'checked="checked" disabled';
					
				}		
		}
 }


?>


<style>

input[type=checkbox] {
  display:none; 
  }

  input[type=checkbox] + label
   {
      
	   
	   background:url(nseat.png);
       height: 24px;
       width: 24px;
       display:inline-block;
       padding: 0 0 0 0px;
   }

   input[type=checkbox]:checked + label
    {
	
      background:url(sseat.png);
        height: 24px;
        width: 24px;
        display:inline-block;
        padding: 0 0 0 0px;
    }
	input[type=checkbox]:disabled + label
    {
	
      background:url(seat.png);
        height: 24px;
        width: 24px;
        display:inline-block;
        padding: 0 0 0 0px;
    }
	#mydiv table tr td table tr td div #m {
	font-family: Verdana, Geneva, sans-serif;
	background-color: #06F;
	border: thin solid #666;
}
</style>
<form name="form1" method="post" action="">
<div name="mydiv" id="mydiv" style="float:left" align="center">

  <table width="576" border="0" cellspacing="3"   style="border:1px solid red;">
    <tr>
      <td width="29" rowspan="3" ><img src="steering.png" width="31" height="28"></td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="29">&nbsp;</td>
      <td width="31">&nbsp;</td>
      <td width="31">&nbsp;</td>
      <td width="28">&nbsp;</td>
      <td width="28" rowspan="7" valign="top"><table width="155" height="191" border="0" cellspacing="3" style="border:1px solid blue;" >
 
  <tr>
    <td><div align="justify"><img src="nseat.png" width="26" height="24" align="absmiddle">Available seats</div></td></tr>
   <tr> <td><div align="justify"><img src="ladiesseat.png" width="26" height="20" align="absmiddle">Ladies Seats</div></td>
  </tr>
  <tr>
    <td><div align="justify"><img src="sseat.png" width="26" height="24" align="absmiddle">Selected Seats</div></td>
  </tr>
  <tr>
    <td><div align="justify"><img src="seat.png" width="26" height="20" align="absmiddle">Booked Seats</div></td>
  </tr>
  <tr>
    <td height="77"><div align="center">
        <?php if (isset($_SESSION['pid']))
	  {?>
        <input type="submit" name="next" id="next" value="next"  >
      <?php
	  }
	  else{
	  ?>
           <p id="m">Please Resgister And cnt..</p>
           <?php
	  }?>
      
            
    </div></td>
  </tr>
</table></td>
      </tr>
    <tr>
      <td><input type='checkbox' name='chk[]' value='A1' id="chk1"  <?php if(count($seatResult) > 0){echo checkBookedSeat("A1",$seatResult);}?>/><label for="chk1"></label></td>
      <td><input type='checkbox'  name='chk[]' value='B1' id="chk5" <?php if(count($seatResult) > 0){echo checkBookedSeat("B1",$seatResult);}?>/><label for="chk5"></label></td>
       <td><input type='checkbox' name='chk[]' value='C1' id="chk9" <?php if(count($seatResult) > 0){echo checkBookedSeat("C1",$seatResult);}?>/><label for="chk9"></label></td>
       <td><input type='checkbox' name='chk[]' value='D1' id="chk13" <?php if(count($seatResult) > 0){echo checkBookedSeat("D1",$seatResult);}?>/><label for="chk13"></label></td>
       <td><input type='checkbox' name='chk[]' value='E1' id="chk17" <?php if(count($seatResult) > 0){echo checkBookedSeat("E1",$seatResult);}?>/><label for="chk17"></label></td>
        <td><input type='checkbox' name='chk[]' value='F1' id="chk21" <?php if(count($seatResult) > 0){echo checkBookedSeat("F1",$seatResult);}?>/><label for="chk21"></label></td>
       <td><input type='checkbox' name='chk[]' value='G1' id="chk25" <?php if(count($seatResult) > 0){echo checkBookedSeat("G1",$seatResult);}?>/><label for="chk25"></label></td>
       <td><input type='checkbox' name='chk[]' value='H1' id="chk29" <?php if(count($seatResult) > 0){echo checkBookedSeat("H1",$seatResult);}?>/><label for="chk29"></label></td>
       <td><input type='checkbox' name='chk[]' value='I1' id="chk33" <?php if(count($seatResult) > 0){echo checkBookedSeat("I1",$seatResult);}?>/><label for="chk33"></label></td>
        <td><input type='checkbox' name= 'chk[]' value='J1' id="chk37" <?php if(count($seatResult) > 0){echo checkBookedSeat("J1",$seatResult);}?>/><label for="chk37"></label></td>
        <td><input type='checkbox' name='chk[]' value='K1' id="chk41" <?php if(count($seatResult) > 0){echo checkBookedSeat("K1",$seatResult);}?>/><label for="chk41"></label></td>
        <td><input type='checkbox' name='chk[]' value='L1' id="chk45" <?php if(count($seatResult) > 0){echo checkBookedSeat("L1",$seatResult);}?>/><label for="chk45"></label></td>
        <td>&nbsp;</td>
      </tr>
    <tr>
      <td><input type='checkbox' name='chk[]' value='A2' id="chk2" <?php if(count($seatResult) > 0){echo checkBookedSeat("A2",$seatResult);}?>/><label for="chk2"></label></td>
      <td><input type='checkbox' name='chk[]' value='B2' id="chk6" <?php if(count($seatResult) > 0){echo checkBookedSeat("B2",$seatResult);}?>/><label for="chk6"></label></td>
       <td><input type='checkbox' name='chk[]' value='C2' id="chk10" <?php if(count($seatResult) > 0){echo checkBookedSeat("C2",$seatResult);}?>/><label for="chk10"></label></td>
       <td><input type='checkbox' name='chk[]' value='D2' id="chk14" <?php if(count($seatResult) > 0){echo checkBookedSeat("D2",$seatResult);}?>/><label for="chk14"></label></td>
        <td><input type='checkbox' name='chk[]' value='E2' id="chk18" <?php if(count($seatResult) > 0){echo checkBookedSeat("E2",$seatResult);}?>/><label for="chk18"></label></td>
       <td><input type='checkbox' name='chk[]' value='F2' id="chk22" <?php if(count($seatResult) > 0){echo checkBookedSeat("F2",$seatResult);}?>/><label for="chk22"></label></td>
       <td><input type='checkbox' name='chk[]' value='G2' id="chk26" <?php if(count($seatResult) > 0){echo checkBookedSeat("G2",$seatResult);}?>/><label for="chk26"></label></td>
       <td><input type='checkbox' name='chk[]' value='H2' id="chk30" <?php if(count($seatResult) > 0){echo checkBookedSeat("H2",$seatResult);}?>/><label for="chk30"></label></td>
       <td><input type='checkbox' name='chk[]' value='I2' id="chk34" <?php if(count($seatResult) > 0){echo checkBookedSeat("I2",$seatResult);}?>/><label for="chk34"></label></td>
       <td><input type='checkbox' name='chk[]' value='J2' id="chk38" <?php if(count($seatResult) > 0){echo checkBookedSeat("J2",$seatResult);}?>/><label for="chk38"></label></td>
       <td><input type='checkbox' name='chk[]' value='K2' id="chk42" <?php if(count($seatResult) > 0){echo checkBookedSeat("K2",$seatResult);}?>/><label for="chk42"></label></td>
       <td><input type='checkbox' name='chk[]' value='L2' id="chk46" <?php if(count($seatResult) > 0){echo checkBookedSeat("L2",$seatResult);}?>/><label for="chk46"></label></td>
       <td>&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td bgcolor="#FF0000">
      <input type='checkbox' name='chk[]' value='L3' id="chk47" <?php if(count($seatResult) > 0){echo checkBookedSeat("L3",$seatResult);}?> /><label for="chk47"></label></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type='checkbox' name='chk[]' value='A3' id="chk3" <?php if(count($seatResult) > 0){echo checkBookedSeat("A3",$seatResult);}?>/><label for="chk3"></label></td>
      <td><input type='checkbox' name='chk[]' value='B3' id="chk7" <?php if(count($seatResult) > 0){echo checkBookedSeat("B3",$seatResult);}?>/><label for="chk7"></label></td>
        <td><input type='checkbox' name='chk[]' value='C3' id="chk11" <?php if(count($seatResult) > 0){echo checkBookedSeat("C3",$seatResult);}?>/><label for="chk11"></label></td>
       <td><input type='checkbox' name='chk[]' value='D3' id="chk15" <?php if(count($seatResult) > 0){echo checkBookedSeat("D3",$seatResult);}?>/><label for="chk15"></label></td>
        <td><input type='checkbox' name='chk[]' value='E3' id="chk19" <?php if(count($seatResult) > 0){echo checkBookedSeat("E3",$seatResult);}?>/><label for="chk19"></label></td>
        <td><input type='checkbox' name='chk[]' value='F3' id="chk23" <?php if(count($seatResult) > 0){echo checkBookedSeat("F3",$seatResult);}?>/><label for="chk23"></label></td>
       <td><input type='checkbox' name='chk[]' value='G3' id="chk27" <?php if(count($seatResult) > 0){echo checkBookedSeat("G3",$seatResult);}?>/><label for="chk27"></label></td>
        <td><input type='checkbox' name='chk[]' value='H3' id="chk31" <?php if(count($seatResult) > 0){echo checkBookedSeat("H3",$seatResult);}?>/><label for="chk31"></label></td>
       <td><input type='checkbox' name='chk[]' value='I3' id="chk35" <?php if(count($seatResult) > 0){echo checkBookedSeat("I3",$seatResult);}?>/><label for="chk35"></label></td>
       <td><input type='checkbox' name='chk[]' value='J3' id="chk39" <?php if(count($seatResult) > 0){echo checkBookedSeat("J3",$seatResult);}?>/><label for="chk39"></label></td>
       <td><input type='checkbox' name='chk[]' value='K3' id="chk43" <?php if(count($seatResult) > 0){echo checkBookedSeat("K3",$seatResult);}?>/><label for="chk43"></label></td>
       <td><input type='checkbox' name='chk[]' value='L4' id="chk48" <?php if(count($seatResult) > 0){echo checkBookedSeat("L4",$seatResult);}?>/><label for="chk48"></label></td>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type='checkbox' name='chk[]' value='A4' id="chk4" <?php if(count($seatResult) > 0){echo checkBookedSeat("A4",$seatResult);}?>/><label for="chk4"></label></td>
       <td><input type='checkbox' name='chk[]' value='B4' id="chk8" <?php if(count($seatResult) > 0){echo checkBookedSeat("B4",$seatResult);}?>/><label for="chk8"></label></td>
      <td><input type='checkbox' name='chk[]' value='C4' id="chk12" <?php if(count($seatResult) > 0){echo checkBookedSeat("C4",$seatResult);}?>/><label for="chk12"></label></td>
        <td><input type='checkbox' name='chk[]' value='D4' id="chk16" <?php if(count($seatResult) > 0){echo checkBookedSeat("D4",$seatResult);}?>/><label for="chk16"></label></td>
       <td><input type='checkbox' name='chk[]' value='E4' id="chk20" <?php if(count($seatResult) > 0){echo checkBookedSeat("E4",$seatResult);}?>/><label for="chk20"></label></td>
       <td><input name='chk[]' type='checkbox' id="chk24" value='F4' <?php if(count($seatResult) > 0){echo checkBookedSeat("F4",$seatResult);}?>/><label for="chk24"></label></td>
       <td><input type='checkbox' name='chk[]' value='G4' id="chk28" <?php if(count($seatResult) > 0){echo checkBookedSeat("G4",$seatResult);}?>/><label for="chk28"></label></td>
       <td><input type='checkbox' name='chk[]' value='H4' id="chk32" <?php if(count($seatResult) > 0){echo checkBookedSeat("H4",$seatResult);}?>/><label for="chk32"></label></td>
       <td><input type='checkbox' name='chk[]' value='I4' id="chk36" <?php if(count($seatResult) > 0){echo checkBookedSeat("I4",$seatResult);}?>/><label for="chk36"></label></td>
      <td><input type='checkbox' name='chk[]' value='J4' id="chk40" <?php if(count($seatResult) > 0){echo checkBookedSeat("J4",$seatResult);}?>/><label for="chk40"></label></td>
       <td><input type='checkbox' name='chk[]' value='K4' id="chk44" <?php if(count($seatResult) > 0){echo checkBookedSeat("K4",$seatResult);}?>/><label for="chk44"></label></td>
       <td><input type='checkbox' name='chk[]' value='L5' id="chk49" <?php if(count($seatResult) > 0){echo checkBookedSeat("L5",$seatResult);}?>/><label for="chk49"></label></td>
       <td>&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
  </table>
</div>
</form>
