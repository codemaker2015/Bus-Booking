<?php

global $conn;
$conn=mysql_connect ('localhost','root');
if(!$conn)
{
die("Could not connect to MySQL");
}
$db=mysql_select_db('testdb',$conn)
 or die ("could not open db".mysql_error());
echo "Connected";
?>