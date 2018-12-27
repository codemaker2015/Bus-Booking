
  <table width="100%" border="5" cellspacing="3">
  <tr>
    <th scope="col"><table width="100%" border="5" cellspacing="3">
      <tr>
        <th scope="col">Edit</th>
        <th scope="col">Text</th>
        <th scope="col">Name</th>
        <th scope="col">Accept</th>
       
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
      <?php
	
	       $db->close();
		   $db->connect();
		   $res=$db->select_testimonials();
		   $i=0;
	while($row=mysql_fetch_array($res))
		{   ?>
      <tr>
      <?php
	  $id=$row["testimonial_id"];
	  $text=$row['testimonial_text'];
	  $na=$row['person_id'];
	  
	  $a="chk".$i;
	  $b="txt_text".$i;
	  $c="txt_name".$i; 
	  $d="chk_accept".$i;
	  $e="btn".$i;
	  
	  ?>
      
        <td><input type="checkbox"  name="<?php echo $a?>" id="<?php echo $a?>" value="<?php echo $row['testimonial_id'];?>" onclick="editbox('<?php echo $b ?>','<?php echo $c ?>','<?php echo $d ?>');"></td>
        <td> <input type="text"  name="<?php echo $b;?>" id="<?php echo $b?>"  value="<?php echo $row['testimonial_text'];?>" disabled="disabled"/></td>
        <td> <input type="text"  name= "<?php echo $c;?>"id="<?php echo $c?>"  value="<?php echo $row['person_id'];?>" disabled="disabled"/></td>
        <td><input type="checkbox" name="accept" id="<?php echo $d?>" value="<?php echo $row['flag'];?>" disabled="disabled" <?php if($row['flag']==1) { echo 'checked="checked"'; }?>/></td>
           
         <td><a href="adminpages/updateTE.php?id=<?php echo $id; ?>&name=<?php echo $text; ?>">Update</a>
     
       <td><a href="adminpages/testMonDelete.php?id=<?php echo $id ?>&mode=delete">delete</a></td>
      
       
       </td>
       
       </tr>
      
      <?php $i++; } ?>
  
  </table>
   <div id="editData">dfdfdfdf
  
   </div>
   

 <div id="divdisp">
 </div>

<script type="text/javascript">
function UpdateData(id1,id2,id3)
{

	var id=document.getElementById(id1).value;
	var txt=document.getElementById(id2).value;
	if(document.getElementById(id3).checked)
	var chkval=1;
	else
	var chkval=0;
	
	alert(id);
   alert(txt);
   alert(chkval);	
 if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("editData").innerHTML=xmlhttp.responseText;
	
    }
	xmlhttp.open("GET","updatetest.php?id="+id+"&txt="+txt+"&chkval="+chkval,true);
xmlhttp.send();
  }


alert(xmlhttp.responseText);
	
}

 
 function editbox(b,c,d)
{
document.getElementById(b).removeAttribute("disabled");
//document.getElementById(c).removeAttribute("disabled");
document.getElementById(d).removeAttribute("disabled");
}
</script>

