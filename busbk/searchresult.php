<?php
$source=$_GET["sid"];
$des=$_GET["eid"];
$originalDate = $_GET["dat"];
$dateOfTravel=  date("m/d/Y", strtotime($originalDate));
 require_once('connection/DB_Functions.php');
		$db=new DB_Functions(); 

		$db->connect();


$rows=$db->searchresult($source,$des,$dateOfTravel);
if(count($rows)>0)
{
//echo $dateOfTravel;
?>

<table width="594" border="1" id="rounded-corner">
  <tr>
    <th width="44"  scope="col" >Bus Model</th>
    <th width="34" scope="col" >Bus Type</th>
    <th colspan="4" scope="col">Amenities</th>
    <th width="37" scope="col">Start Time</th>
    <th width="34" scope="col">End Time</th>
    <th width="39" scope="col">Total Time</th>
    <th width="37" scope="col">Seats</th>
    <th width="31" scope="col">Fare</th>
     <th width="47" scope="col">Seat Layout</th>

  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="26"><img src="images/movie.jpg" width="26" height="26"></td>
    <td width="26"><img src="images/Water_Bottle-icon.png" width="26" height="26"></td>
    <td width="26"><img src="images/charger.png" width="26" height="16"></td>
    <td width="26"><img src="images/blanket.png" width="26" height="26"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
   <?php
     for($i=0; $i<count($rows); $i++){
		  ?>
          <tr>
		<?php $allotid=$rows[$i]['allocation_id'];?>
  
    	    <td><?php echo $rows[$i]['bus_modelname'];?></td>
		
			<td><?php echo $rows[$i]['bustype_name'];?></td>
             <?php $mov=$rows[$i]['movie'];
			       $water= $rows[$i]['water'];
				   $charger= $rows[$i]['charger'];
				   $blanket=$rows[$i]['blanket'];
				   
             if($mov=='1') {?>
             <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
            <?php } else{ ?>
            
             <td><input type="checkbox"  disabled="disabled" /></td>
		    
            
		    <?php  }if($water=='1') {?>
             <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
            <?php } else{ ?>
            
             <td><input type="checkbox"  disabled="disabled" /></td>
            
		<?php  }if($charger=='1'){ ?>
             <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
            <?php } else{ ?>
            
             <td><input type="checkbox"  disabled="disabled" /></td>
             <?php  }if($blanket=='1'){ ?>
             <td><input type="checkbox" checked="checked" disabled="disabled" /></td>
            <?php } else{ ?>
            
             <td><input type="checkbox"  disabled="disabled" /></td>
             
             
             <?php } ?>
			
			<td><?php echo $rows[$i]['route_starttime'];?></td>
			<td><?php echo $rows[$i]['route_endtime'];?></td>
            <td><?php echo $rows[$i]['route_runningtime'];?></td>
			<td><?php echo $rows[$i]['bus_totalseats'];?></td>
			<?php $layout= $rows[$i]['seatlayout_name'];?>
            <td><?php echo $rows[$i]['route_fare'];?></td>
		    <?php  $allotdate=$rows[$i]['allocation_date']; 
		     $routeid=$rows[$i]['route_id']; 
           $link=$layout.".php?allotid=".$allotid."&allotdate=".$allotdate."&layout=".$layout."&routeid=".$routeid ?>
   <td> <a href="layouts/<?php echo $link ?>" target="content" onclick="changeClass();">View Seat</a></td>
			</tr>
	    <?php
	     }
  ?>
  
   </table>
   <?php
   
}
else
echo "No record";
?>
   
		