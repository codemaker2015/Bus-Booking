<?php
require_once('connection/DB_Functions.php');

		$db=new DB_Functions();
		$db->connect();
	
$id=$_GET["id"];
$text=$_GET["txt"];
$val=$_GET["chkval"];
echo $id;
$db->update_testimonial($id,$text,$val);

?>
