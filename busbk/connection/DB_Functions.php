<?php
class DB_Functions
{
	private $db;
	function DB_Functions()
	{
		
	}
	function connect()
	{
      //  require_once('config.php');
		$con=mysql_connect('localhost','root','');
		mysql_select_db("mydb");
	    //echo "connected";
	}
	public function close()
	{
		mysql_close();
		
	}
	public function store_user($name,$email,$password,$gender)
	{
	$qry="CALL insert_newperson('".$name."','".$email."','".$password."','".$gender."')";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
		
			
	}

	public function store_agent($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p)
	{
	$qry="CALL insert_newagent('".$a."','".$b."','".$c."','".$d."',".$e."
	,'".$f."','".$g."',".$h.",'".$i."',".$j.",".$k.",".$l.",'".$m."',".$n.",".$o.",'".$p."')";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
		
			
	}
	
	public function store_bus($regno,$modelname,$regdate,$seats)
	{
	$qry="CALL insert_newbus('".$regno."','".$modelname."','".$regdate."','".$seats."')";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
	 public function store_reservation($agentid,$flag,$prooftype,$totalseats,$proofno,$mobile,$email,$address,$nameonid)
	
	{
	$qry="CALL insert_newreservation(".$agentid.",'".$flag."','".$prooftype."',".$totalseats.",'".$proofno."',".$mobile.",'".$email."','".$address."','".$nameonid."')";
        echo $qry;
		$result= mysql_query($qry);
		$i=0;
		/*while($row=mysql_fetch_array($result)){
				
			$rows[$i]['reservation_id']=$row['reservation_id'];
		
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
		*/
	
	}
	
	public function store_testimonials($words,$pid)
	{
	$qry="CALL insert_newtestimonials('".$words."',".$pid.")";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
	public function store_contact($name,$email,$msg)
	{
	$qry="CALL insert_newcontactus('".$name."','".$email."','".$msg."')";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
	public function maxReservation()
	{
	$qry="SELECT MAX(reservation_id)AS reservation_id FROM tb_reservation";
	$res=mysql_query($qry);
	return $res;
	}
	public function store_faretime($bid,$stopid,$fare,$time)
	{
	$qry="CALL insert_newfaretime(".$bid.",".$stopid.",".$fare.",'".$time."')";
        
		
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
	public function store_route($allotid,$start,$end,$fare,$st,$et,$time)
	{
$qry="CALL insert_newroute(".$allotid.",".$start.",".$end.",".$fare.",'".$st."','".$et."','".$time."')";
        
		$result= mysql_query($qry);
		if($result)
		return $result;
	
	}
	public function store_bustype($btype,$movie,$water,$charger,$blanket)
	{
	$qry="CALL insert_newbustype('".$btype."','".$movie."','".$water."','".$charger."','".$blanket."')";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
		
	
public function store_allocation($allotname,$bus,$layout,$btype,$con)
	{
	$qry="CALL insert_newallocation('".$allotname."',".$bus.",".$layout.",".$btype.",".$con.")";
        
		$result= mysql_query($qry);
		
		if($result)
		
		return $result;
	
	}
	
	public function store_seatlayout($name,$img,$file,$location)
	{
	$qry="CALL insert_newseatlayout('".$name."','".$img."','".$file."','".$location."')";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
	public function store_stop($stopname,$stateid,$districtid,$rtostop)
	{
	$qry="CALL insert_newstop('".$stopname."',".$stateid.",".$districtid.",'".$rtostop."')";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
	public function store_conductor($conname,$conun,$conpwd)
	{
	$qry="CALL insert_newconductor('".$conname."','".$conun."','".$conpwd."')";
        
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
	public function store_state($s)
	{
		
	$qry="CALL insert_newstate('".$s."')";
   
		$result=mysql_query($qry);
		echo $qry;
		if($result)
		
		return $result;
	
	}
	public function store_district($stateid,$distname)
	{
	$qry1="CALL insert_newdistrict(".$stateid.",'".$distname."')";
        
		$result1= mysql_query($qry1);
		if($result1)
		
		return $result1;
	
	}
 public function store_allocationdate($allotid,$allotdate)
	{
		
	$qry="CALL insert_newallocationdates(".$allotid.",'".$allotdate."')";
   
		$result=mysql_query($qry);
		echo $qry;
		if($result)
		
		return $result;
	
	}
   public function store_bkdseats($id,$dt,$seat,$rid)
	{
	$qry="CALL insert_newbkdseats(".$id.",'".$dt."','".$seat."',".$rid.")";
        echo $qry;
		$result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['bkdseats_id']=$row['bkdseats_id'];
		
		}
		return $rows;
	
	}
	
	 public function store_passenger($bkid,$resid,$name,$seatno,$gender,$age)
	{
	$qry="CALL insert_newpassenger(".$bkid.",".$resid.",'".$name."','".$seatno."','".$gender."',".$age.")";
       // echo $qry;
		$result= mysql_query($qry);
		if($result)
		
		return $result;
	
	}
	public function GetMaxResvid()
	{
		$qry="SELECT MAX(reservation_id)AS reservation_id FROM tb_reservation";
		$result1=mysql_query($qry);
		return $result1;
		
	}
	
	public function fun_select($procname)
	{
	    $qry="CALL ".$procname."()";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['district_id']=$row['district_id'];
			$rows[$i]['district_name']=$row['district_name'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	
public function select_state()
	{
	   $qry="select  * from tb_state";
        $result1= mysql_query($qry) or die($$qry."<br/><br/>".mysql_error());   
		return $result1;

	
	}

public function select_stop()
	{
	    $qry="select stop_id,stop_name from tb_stop";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['stop_id']=$row['stop_id'];
			$rows[$i]['stop_name']=$row['stop_name'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	public function select_stopname($id)
	{
	    $qry="CALL select_stopname(".$id.")";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			
			$rows[$i]['stop_name']=$row['stop_name'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	public function select_conductor()
	{
	    $qry="select conductor_id,conductor_name,conductor_un,conductor_pwd from tb_conductor";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['conductor_id']=$row['conductor_id'];
			$rows[$i]['conductor_name']=$row['conductor_name'];
			$rows[$i]['conductor_un']=$row['conductor_un'];
			$rows[$i]['conductor_pwd']=$row['conductor_pwd'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	
	
	
		public function select_conductorbyname($uname,$password)
	     {
		echo $uname;
	    $qry="CALL select_condctr_name(".$uname.",".$password.")";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['conductor_id']=$row['conductor_id'];
			$rows[$i]['conductor_name']=$row['conductor_name'];
			$rows[$i]['conductor_un']=$row['conductor_un'];
	
			$i++;	
			
			
		
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	public function select_layout()
	{
	    $qry="select seatlayout_id,seatlayout_name from tb_seatlayout";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['seatlayout_id']=$row['seatlayout_id'];
			$rows[$i]['seatlayout_name']=$row['seatlayout_name'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	public function select_bustype()
	{
	    $qry="select bustype_id,bustype_name from tb_bustype";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['bustype_id']=$row['bustype_id'];
			$rows[$i]['bustype_name']=$row['bustype_name'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	
	public function select_district()
	{
	    $qry="select district_id,district_name from tb_district";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['district_id']=$row['district_id'];
			$rows[$i]['district_name']=$row['district_name'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	public function select_testimonialsById($id)
	{
	    $qry="select * from tb_testimonials where testimonial_id='$id' ";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['testimonial_id']=$row['testimonial_id'];
			$rows[$i]['testimonial_text']=$row['testimonial_text'];
			
			$rows[$i]['person_id']=$row['person_id'];
			$rows[$i]['flag']=$row['flag'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
public function Select_Alocationn()
{
	$qry="select tb_allocation.allocation_name,tb_seatlayout.seatlayout_name,tb_bus.bus_regno,tb_bustype.bustype_name,tb_conductor.conductor_name from tb_allocation INNER JOIN tb_seatlayout on tb_allocation.seatlayout_id=tb_seatlayout.seatlayout_id INNER JOIN tb_bus on tb_allocation.bus_id=tb_bus.bus_id INNER JOIN tb_bustype on tb_bustype.bustype_id=tb_allocation.bustype_id INNER JOIN tb_conductor on tb_conductor.conductor_id=tb_allocation.conductor_id";
	$result1= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result1)){
			$rows[$i]['allocation_name']=$row['allocation_name'];
			$rows[$i]['seatlayout_name']=$row['seatlayout_name'];
			$rows[$i]['bus_regno']=$row['bus_regno'];
			$rows[$i]['bustype_name']=$row['bustype_name'];
			$rows[$i]['conductor_name']=$row['conductor_name'];
			
		}
		if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
}
public function select_bus()
	{
	    $qry="select bus_id,bus_regno,bus_modelname,bus_regdate,bus_totalseats from tb_bus";
        $result1= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result1)){
				
			$rows[$i]['bus_id']=$row['bus_id'];
			$rows[$i]['bus_regno']=$row['bus_regno'];
			$rows[$i]['bus_modelname']=$row['bus_modelname'];
			$rows[$i]['bus_regdate']=$row['bus_regdate'];
			$rows[$i]['bus_totalseats']=$row['bus_totalseats'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	public function select_route()
	{
	    $qry="CALL select_route()";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['route_id']=$row['route_id'];
			$rows[$i]['route_startstop_id']=$row['route_startstop_id'];
			$rows[$i]['route_endstop_id']=$row['route_endstop_id'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	
	public function select_allocationid()
	{
	    $qry="select max(allocation_id) from tb_allocation";
        $result= mysql_query($qry);
		$row=mysql_fetch_array($result);
	
	     return($row[0]);		
	}
	
	public function select_allocation()
	{
	    $qry="select allocation_id,allocation_name from tb_allocation";
        $result= mysql_query($qry);
		$i=0;
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['allocation_id']=$row['allocation_id'];
			$rows[$i]['allocation_name']=$row['allocation_name'];
			
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}
	public function select_pics()
	{
	    $qry="CALL select_pics()";
        $result= mysql_query($qry);
		
		if($result)
			return $result;
			
			}
			
			public function select_testimonials()
	{
	    $qry="select * from tb_testimonials";
        $result= mysql_query($qry);
		
		if($result)
			return $result;
			
			}
			
			
		public function select_bkdseats($alloid,$allotdate,$layoutname,$routeid)
			{
	    $qry="CALL select_bkdseats(".$alloid."','".$allotdate."','".$layoutname."',".$routeid.")";
        $result= mysql_query($qry);
		$rows = array();
		$i=0;
		
		while($row=mysql_fetch_array($result)){
				
			$rows[$i]['seatno']=$row['seatno'];
			
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
		
	
	}



public function select_agent()
	{
	    $qry="select * from tb_agent";
        $result= mysql_query($qry);
		
		if($result)
			return $result;
			
			}
			
						

public function searchresult($a,$b,$c)
	{
	 //$qry="CALL searchresult('".$a."','".$b."','".$c."')";
	$qry="select * from view_all where startingstop='".$a."' and  endingstop='".$b."'  and allocation_date='".$c."'";
	
	
        $result1= mysql_query($qry);
		$i=0;
		$rows = array();
		
		while($row=mysql_fetch_array($result1)){
		    $rows[$i]['allocation_id']=$row['allocation_id'];
			$rows[$i]['bus_id']=$row['bus_id'];
			$rows[$i]['bus_modelname']=$row['bus_modelname'];
			$rows[$i]['bus_regno']=$row['bus_regno'];
			$rows[$i]['bustype_name']=$row['bustype_name'];
			$rows[$i]['movie']=$row['movie'];
			$rows[$i]['water']=$row['water'];
			$rows[$i]['charger']=$row['charger'];
			$rows[$i]['blanket']=$row['blanket'];
			$rows[$i]['seatlayout_name']=$row['seatlayout_name'];
			$rows[$i]['bus_totalseats']=$row['bus_totalseats'];
			$rows[$i]['route_startstop_id']=$row['route_startstop_id'];
			$rows[$i]['route_endstop_id']=$row['route_endstop_id'];
			$rows[$i]['route_starttime']=$row['route_starttime'];
			$rows[$i]['route_endtime']=$row['route_endtime'];
			$rows[$i]['route_runningtime']=$row['route_runningtime'];
			$rows[$i]['route_fare']=$row['route_fare'];
			$rows[$i]['startingstop']=$row['startingstop'];
			$rows[$i]['startingdistrict']=$row['startingdistrict'];
			$rows[$i]['startingstate']=$row['startingstate'];
			$rows[$i]['endingstop']=$row['endingstop'];
			$rows[$i]['endingdistrict']=$row['endingdistrict'];
			$rows[$i]['endingstate']=$row['endingstate'];
			$rows[$i]['allocation_date']=$row['allocation_date'];
			$rows[$i]['route_id']=$row['route_id'];
			$i++;	
		}
			if(is_array($rows) && count($rows) >0){
				return $rows;
			}else{
				return array();
			}
	
	
	}
	public function insertregDetails($a,$b,$c,$d,$e,$f,$g,$h)
	{
		$sql="insert into tb_person(person_name,person_emailid,person_password,person_gender,person_age,person_address,person_mobile1,	person_mobile2)values('$a','$b','$c','$d','$e','$f','$g','$h')";
	
		$res=mysql_query($sql);
		return $res;
	}
	public function delete_testimonial($id)
	{
		$qry=mysql_query("delete from tb_testimonials where testimonial_id='$id'");
		$result= mysql_query($qry);
	}
	public function update_testimonial($id,$text,$val)
	{
		$qry=mysql_query("update tb_testimonials set testimonial_text='$text' flag='$val where testimonial_id='$id'");
		$result= mysql_query($qry);
	}
	public function verification($una,$pwd)
	{
		$qry="SELECT COUNT(*) AS pcount,person_id,person_name FROM tb_person WHERE person_emailid='".$una."' AND person_password='".$pwd."'";
		//$qry=mysql_query($str);
		$result= mysql_query($qry);
		return $result;
	}
	public function printticket($resid)
	{
		
		 $qry="CALL print_ticket(".$resid.")";
        $result= mysql_query($qry);
		return $result;
		
		
	}
	public function DeleteTicket($resid)
	{
		$qry="delete from tb_reservation where reservation_id='".$resid."'";
		echo $qry;
		$result=mysql_query($qry);
		return $qry;
	}

}
?>