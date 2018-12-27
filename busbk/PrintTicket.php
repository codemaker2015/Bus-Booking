<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#hed {
font-family: Arial, Helvetica, sans-serif;
	font-size: x-large;
	font-style: normal;
	color: #F00;
}
#psDet {
	font-family: Arial, Helvetica, sans-serif;
	font-size: x-large;
	font-style: normal;
	color: #F00;
}
#PassDetails {
	border: thin solid #666;
}
#PassDetails tr th {
	border: thin none #999;
}
#PassDetails tr th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	text-decoration: underline;
	color: #C3C;
}
.trColor
{
	font-family:"Courier New", Courier, monospace;
	color:#09F;
	font-size:16px;
	font-style:normal;
}
#printSheet {
	border: thin solid #666;
}
#printSheet tr td table #totalFld {
	font-size: 18px;
	color: #F00;
}
</style>
<script type="text/javascript">
function PrintTick()
{
	document.getElementById("printBtn").style.display="none";
	window.print();
}
function load()
{
		var person=prompt("Please enter your reservation no","Reservation No");
		if (person!=null && person!="")
  {
		document.location.href="PrintTicket.php?resid="+person;
  }
  else
  document.location.href="index.php";
  
}
function load1()
{
		var person=prompt("Please enter your reservation no","Reservation No");
		if (person!=null && person!="")
  {
		document.location.href="PrintTicket.php?pr=c&resid="+person;
  }
  else
  document.location.href="index.php";
  
}
</script>
<?php 
if(isset($_GET["resid"]))
$resid=$_GET["resid"];
if(isset($_GET["pr"]))
{
	if($_GET["pr"]=="cal"){
		echo '<script>load1();</script>';
	}
	else if($_GET["pr"]=="prtic"){
echo '<script>load();</script>'	;
	}
}


 require_once('connection/DB_Functions.php');
		$db=new DB_Functions();
		$db->connect();
	$result=$db->printticket($resid); 
	while($row=mysql_fetch_array($result))
		{
		 $start=$row['startingstop'];
		 $stop=$row['endingstop'];
		
		 $resdate=$row['res_date'];
		 $prooftype=$row['prooftype'];
		 $noofseats=$row['noofseats'];
		 $starttime=$row['route_starttime'];
		 $endtime=$row['route_endtime'];
		 $fare=$row['route_fare'];
		$mob= $row['mobile'];
	
		 $dt=$row['date'];
	
		 $busregno=$row['bus_regno'];
		 
		}

?>
</head>

<body>
<form action="PrintTicket.php" method="post">
<input type="hidden" value="<?php echo $resid; ?>" name="rid" />
<table width="56%" border="0" align="center" cellspacing="3" id="printSheet">
  <tr>
    <th width="38%" align="left" scope="col"><img src="images/logo.png" width="270" height="108" /></th>
    <th width="16%" scope="col">&nbsp;</th>
    <th width="45%" scope="col">&nbsp;</th>
    <th width="1%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td colspan="3" align="center" id="hed">Reservation Ticket</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" rowspan="2" valign="top"><table width="100%" border="0" cellspacing="3">
      <tr>
        <th width="46%" class="trColor" scope="col">Reservation No </th>
        <th colspan="2" class="trColor" scope="col">No Of People</th>
        <th width="12%" scope="col">&nbsp;</th>
        <th width="9%" class="trColor" scope="col">Date</th>
      </tr>
      <tr>
        <td align="center"><?php echo $resid ?></td>
        <td colspan="2" align="center"><?php echo $noofseats ?></td>
        <td align="center">&nbsp;</td>
        <td align="center"><?php echo $dt ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="24%">&nbsp;</td>
        <td width="9%">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="trColor">Bus Registration No </td>
        <td><strong>:</strong> <?php echo $busregno ?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="trColor">Boarding Stop    </td>
        <td><strong>:</strong> <?php echo $start ?> </td>
        <td class="trColor">Time</td>
        <td><strong>:</strong> <?php echo $starttime; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="trColor">Droping Stop</td>
        <td><strong>:</strong> <?php echo $stop ?></td>
        <td class="trColor">Time</td>
        <td><strong>:</strong> <?php echo $endtime ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td class="trColor">Mobile No</td>
        <td><strong>:</strong> <?php echo $mob;?></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="center" valign="top" id="psDet">Passerngers Details</td>
      </tr>
      <tr>
        <td colspan="5">
        
        <table width="100%" border="0" cellspacing="3" id="PassDetails">
          <tr>
            <th width="37%" height="20" scope="col">Name Of Passenger</th>
            <th width="29%" scope="col">Seat No</th>
            <th width="21%" scope="col">Age</th>
            <th width="13%" scope="col">Gender</th>
          </tr>
       
          
        <?php 
		$db->close();
		$db->connect();
	$res=$db->printticket($resid); 
		 while($row=mysql_fetch_array($res))
		{ ?>
           <tr>
            <td align="center"><?php echo $row["name"]; ?></td>
            <td align="center"><?php echo $row["seatno"]; ?></td>
            <td align="center"><?php echo $row["gender"]; ?></td>
            <td align="center"><?php echo $row["age"]; ?></td>
          </tr>
          <?php
		}?>
        </table></td>
        </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr id="totalFld">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2" bgcolor="#D6D6D6" >Total Amount</td>
        <td bgcolor="#D6D6D6">$<?php echo $noofseats*$fare; ?> </td>
      </tr>
      <tr>
        <td colspan="5">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="5" align="center" valign="middle"><input type="button" name="printBtn" id="printBtn" value="Print" onclick="PrintTick();" />
        <?php
		if(isset($_GET["pr"]))
		{
			if($_GET["pr"]=="c"){
			?>
        <input type="submit" name="cancelBtn" id="printBtn" value="Cancel Ticket" />
        <?php
			}
			 
		}
		?>
        </td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<?php
if(isset($_POST["cancelBtn"]))
{
if($_POST["cancelBtn"]=="Cancel Ticket")
{
	$rid=$_POST["rid"];
	require_once('connection/DB_Functions.php');
		$db=new DB_Functions();
		$db->connect();
		$rst=$db->DeleteTicket($rid);
		echo '<script> document.location.href="index.php";</script>'	;
}
}
?>
</form>
</body>
</html>