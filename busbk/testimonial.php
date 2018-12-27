<form name="form1" method="post" action="">
  <style type="text/css">
 .vsblShow
{
	display:none;
}
 </style>
 
    <div class="clear"></div>
    <div class="mainTag" align="left">
    This is What They say about Us.......
    </div>
   
     <div class="clear"></div>
    <div class="mainTag" > 
    <table>
    <tr>
      <td width="16%"><img src="images/icon_testimonial1.png" width="105" height="100"></td>
      <td width="72%"><p>This Is a Completly new idea and we are very glad to present it to you</p>
      <p>Anoop-CEO of eezzyTicketz.</p></td>
      </tr></table>
    
     </div>
      
     <div class="clear"></div>
    <div class="mainTag" > 
    <table>
    <tr>
      <td><img src="images/icon_testimonial1.png" alt="" width="105" height="100"></td>
      <td><p>By implementing this site and techniques our bussines domain spread in very high speed maner.Now we have agents in almost all cities.</p>
      <p>Jack.Marketing Manger-eezzy ticketz</p></td>
  
     </tr></table></div>
     
   <div class="clear"></div>
    <div class="mainTag" > 
    <table>
    <tr>
      <td><img src="images/icon_testimonial1.png" alt="" width="105" height="100"></td>
      <td><p>By using the application that provided by eezzy ticketz i saved alot of time in seat booking.i can also book the seat that i want.its a great idea..</p>
      <p>Agustin-travaller.</p></td>
   
    </tr></table></div>
    <div class="clear"></div>
    <div class="mainTag" align="center"> 
    <table>
    <tr>
    <td>Want to Say someThing..??? Write here.we will post it by examining the contents</td>
     </tr>
     <tr>
      <td align="center"><label for="textarea"></label>
      <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea></td>
     
    </tr>
    <tr>
     
      <td align="center"><input type="submit" name="button" id="button" value="Submit"></td>
     
    </tr>
   </table></div>
</form>
<?php if(isset($_POST['button']) && ($_POST['button']!=null))
{     
$words=$_POST['textarea'];
	     $db->close();
		$db->connect();
if(isset($_SESSION['pid']) and ($_SESSION['pid']!=null))
{
	$pid=$_SESSION['pid'];
$res=$db->store_testimonials($words,$pid);
}
else
{
	echo "login first";
}
}
	?>
