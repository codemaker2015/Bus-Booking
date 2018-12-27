<?php
require_once('../connection/DB_Functions.php');

		$db=new DB_Functions();
		$db->connect();
$mode=$_REQUEST['mode'];
$id=$_REQUEST['id'];

if($mode=='delete')
{

$db->close();
$db->connect();
$db->delete_testimonial($id);

}
elseif($mode=="update")

{
echo "Id=".$id;
echo "Name".$_POST["textName"];


/*$db->update_testimonial($id,$text,$na,$val);*/

}


	
 
		
 
 
//header("location:../adminpanel.php?val=12");
		
?>