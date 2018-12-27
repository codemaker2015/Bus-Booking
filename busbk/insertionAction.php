<?php
require_once('connection/DB_Functions.php');
$a=$_POST['txt_name'];
$b=$_POST['txt_username'];
$c=$_POST['txt_password'];
$d=$_POST['gender'];
$e=$_POST['txt_age'];
$f=$_POST['txt_address'];
$g=$_POST['txt_mobile1'];
$h=$_POST['txt_mobile2'];
$db=new DB_Functions(); 
$db->connect();
$r=$db->insertregDetails($a,$b,$c,$d,$e,$f,$g,$h);
if($r>0)
header("location:index.php?val=1&msg=Sucessfully Registered");
else
header("location:person.php?index.php?val=1&msg=Not Sucessfully ");
?>