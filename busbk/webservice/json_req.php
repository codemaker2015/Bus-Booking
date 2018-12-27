<?php

if (isset($_POST['tag']) && $_POST['tag'] != '')
 {
    // get tag
	
    $tag = $_POST['tag'];
	//echo "tag name:".$tag;

    // include db handler
    require_once('DB_Functions.php');
		$db=new DB_Functions();

		$db->connect();
 
       // check for tag type
	    if ($tag == 'busdetails')
	 {
         $a = $_POST['src'];
         $b = $_POST['dest'];
		 $c = $_POST['date'];
         $user = $db->searchresult($a,$b,$c);
	     $response = array("tag" => $tag, "success" => 0, "error" => 0);
   			if(count($user)>0)
			{
			    		
            $response["success"] = 1;
            $response["bus_id"] = $user[0]['bus_id'];
            $response["bus_modelname"] = $user[0]['bus_modelname'];
			$response["bustype_name"] = $user[0]['bustype_name'];
			$response["bus_totalseats"] = $user[0]['bus_totalseats'];
			$response["route_starttime"] = $user[0]['route_starttime'];
			$response["allocation_date"] = $user[0]['allocation_date'];
        	header('Content-type: application/json');
            echo json_encode($response);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            echo json_encode($response);
        }
		
	 }
    if ($tag == 'login')
	 {
			//echo "hai";
        // Request type is check Login
        $uname = $_POST['uname'];
        $password = $_POST['password'];
        $user = $db->select_conductorbyname($uname,$password);
	  $response = array("tag" => $tag, "success" => 0, "error" => 0);
    
		//	echo "  count of user   ".count($user);
			
			if(count($user)>0)
			{
				
            // user found
            // echo json with success = 1
			
            $response["success"] = 1;
            $response["uid"] = $user[0]['conductor_id'];
            $response["name"] = $user[0]['conductor_name'];
            $response["username"] = $user[0]['conductor_un'];
			$response["Busid"] = '14';
			$response["Bus_Regno"] = 'kl-36-D-1964';
    		header('Content-type: application/json');
            echo json_encode($response);
        } else {
            // user not found
            // echo json with error = 1
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            echo json_encode($response);
        }		
	 }
		
		 if ($tag == 'loginuser')
	
	 {
            $uname = $_POST['uname'];
            $password = $_POST['password'];
            $user = $db->select_person($uname,$password);
	        $response = array("tag" => $tag, "success" => 0, "error" => 0);
   			
			if(count($user)>0)
			{
			    		
            $response["success"] = 1;
            header('Content-type: application/json');
            echo json_encode($response);
        } 
		else {
           
            $response["error"] = 1;
            $response["error_msg"] = "Incorrect email or password!";
            echo json_encode($response);
        }
		
	 }
	 
	  if ($tag == 'reserve')
	 {
			
        $regno = $_POST['regno'];
		$resdate=$_POST['resdate'];
        $user = $db->select_resid($regno,$resdate);
		$i=0;
		if(count($user)>0)
			{
            // user found
            // echo json with success = 1
			
			   while($i<count($user))
			   {
			
            $response[$i]["success"] = 1;
            $response[$i]["regno"] = $user[$i]['reservation_id'];
			   $i++;
			   }
            header('Content-type: application/json');
            echo json_encode($response);
        }
		else{
			
		 $response["error"] = 1;
            $response["error_msg"] = "couldnot retreive the value!";
            echo json_encode($response);	
		}
		
    
        }
	 if ($tag == 'reserveuser')
	 {		 			
		$credit=$_POST['credit'];		
		$agentid=$_POST['agentid'];
		$flag=$_POST['flag'];
		$prooftype="Voters ID";
		$totalseats=$_POST['seats'];
		$proofno=$_POST['votersid'];
		$nameonid=$_POST['name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$address=$_POST['address'];		
		
        $user = $db->store_reservation($agentid,$flag,$prooftype,$totalseats,$proofno,$mobile,$email,$address,$nameonid);
		$i=0;
		 $response[0]["success"] = 1;
		 $response[0]["fare"] = 45;
		 
		 $response[1]["success"] = 1;
		 $response[1]["fare"] = 45;
		 
		  header('Content-type: application/json');
            echo json_encode($response);
		if(count($user)>0)
			{
            // user found
            // echo json with success = 1
			
			   while($i<count($user))
			   {
			
            $response[$i]["success"] = 1;
            $response[$i]["regno"] = $user[$i]['reservation_id'];
			   $i++;
			   }
           
			
        }
		else{
			/*
		 $response["error"] = 1;
            $response["error_msg"] = "couldnot retreive the value!";
            echo json_encode($response);	*/
		}
		
    
        }
		
		 if ($tag == 'resdetails')
	 {		 			
		$credit=$_POST['credit'];		
		$agentid=$_POST['agentid'];
		$flag=$_POST['flag'];
		$prooftype="Voters ID";
		$totalseats=$_POST['seats'];
		$proofno=$_POST['votersid'];
		$nameonid=$_POST['name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$address=$_POST['address'];		
		
        $user = $db->store_reservation($agentid,$flag,$prooftype,$totalseats,$proofno,$mobile,$email,$address,$nameonid);
		$i=0;
		if(count($user)>0)
			{
            // user found
            // echo json with success = 1
			
			   while($i<count($user))
			   {
			
            $response[$i]["success"] = 1;
            $response[$i]["regno"] = $user[$i]['reservation_id'];
			   $i++;
			   }
            header('Content-type: application/json');
            echo json_encode($response);
        }
		else{
			
		 $response["error"] = 1;
            $response["error_msg"] = "couldnot retreive the value!";
            echo json_encode($response);	
		}
		
    
        }
 }
?>

