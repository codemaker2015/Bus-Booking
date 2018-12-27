<?php
$username=$_POST["uname"];
$password=$_POST["pwd"];
//echo $username;
//echo $password;
 require_once('connection/DB_Functions.php');
		$db=new DB_Functions();
		$db->connect();
		$result=$db->verification($username,$password);
	//	echo " count: ".count($result);
		
		
		while($row=mysql_fetch_array($result))
		{  $pcount=$row['pcount'];
			$pid=$row['person_id'];
			$pname=$row['person_name'];
			  if($pcount>0)
			  {
			    session_start();
			    $_SESSION['pid']=$pid;
				$_SESSION["uname"]=$pname;
			   header("location:index.php");
			  }
			  else
			  {
					echo "invalid";  
			  }
			
		}
		

//echo $username.$password;
?>
