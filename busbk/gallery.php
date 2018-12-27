 <style type="text/css">
 .vsblShow
{
	display:none;
}
 </style>
     <?php
	$db->close();
	$db->connect();
	$result=$db->select_pics();
	if($result!=false)
	{
	 ?>  
     <table align="center" cellspacing="20">
	  
          <tr>
		
		<?php
	       $i=0;
		
		while($row=mysql_fetch_array($result))
		{
		
		     if($i!=3)
		     {
		     $i=$i+1;
		 ?>
		 
		       <td height="150" width="150">
			   <!--<h2 align="center"><?php echo $row['imgname'];?></h2>-->
		<div ><img class="expando" src="../eezzyticketz/images/gallery/<?php echo $row['imgname'];?>" width="200" height="200"></div>
        <p><div align="center"><?php echo $row['text'];?></div>
		 
		 </td>
		    
			<?php 
		     }
		     else
		     {
		     $i=1;
		     ?>
			 
			 </tr>
		     <tr>
			  <td height="150" width="150">
			   <!--<h2 align="center"><?php echo $row['imgname'];?></h2>-->
		<div><img class="expando" src="../eezzyticketz/images/gallery/<?php echo $row['imgname'];?>" width="200" height="200"></div>
		 <p><div align="center"><?php echo $row['text'];?></div>
		 </td>
			 
		 
		 <?php 
		 }
		}
		 ?>


</table> 
 <?php
		echo "success";
	}
	else
	{
		echo "not success";

		
	}
	
		  
		?> 





