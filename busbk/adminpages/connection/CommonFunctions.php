<?php
class CommonFunctions
{
	
	function CommonFunctions()
	{
		
	}
	
	public function state()
	{
		 
		   $db->close();
		   $db->connect();
		   $res=$db->select_state();
		    for($index=0; $index<count($res); $index++)
			{
		  
	      echo "<option value='";
		  echo $res[$index]['state_id'];
		  echo "'>";
		  echo $res[$index]["state_name"];
          echo "</option>";
	      
	     }
		        
	}
	
	public function test()
	{
		echo "haiiiiiii";
	
	}
}
?>