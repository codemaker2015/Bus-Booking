 <style type="text/css">
 .vsblShow
{
	display:none;
}
 </style>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="3">
    <tr>
      <td>
      <div class="clear"></div>
      <div class="mainTag" align="center">
      <table width="100%" border="0" cellspacing="3">
  <tr>
    <th scope="col">Contact</th>
  </tr>
  <tr>
    <td>
    Chillayi infotech
    </td>
  </tr>
  <tr>
    <td>Thrissur ,kerala,india</td>
  </tr>
  <tr>
    <td> Pin:680724</td>
  </tr>
  <tr>
    <td>Phone:9744727952</td>
  </tr>
  <tr>
    <td>Email :info@eezzyticketz.com</td>
  </tr>
</table>
 </div>
      
      </td>
      <td valign="middle"><div class="clear"></div>
      <div class="mainTag"> 
      <table width="100%" border="0" cellspacing="3">
  <tr>
    <th scope="col">Enquires</th>
  </tr>
  <tr>
    <td>Please send your sugestionsand quires .</td>
  </tr>
  <tr>
    <td>We glad to hear from you.</td>
  </tr>
</table>
</div></td>
    </tr>
    <tr>
      <td><div class="clear"></div>
      <div class="mainTag"> <img src="images/gallery/6.jpg" width="360" height="280"></div>
       </td>
      <td valign="middle">
     <div class="clear"></div>
      <div class="mainTag" align="center"><table width="100%" border="0">
        <tr>
          <td width="51%"><div align="left">Name</div></td>
          <td width="49%"><div align="left">Email</div></td>
        </tr>
        <tr>
          <td><label for="txt_name"></label>
            <div align="justify">
              <input type="text" name="txt_name" id="txt_name">
            </div></td>
          <td><label for="txt_email"></label>
            <div align="justify">
              <input type="text" name="txt_email" id="txt_email">
            </div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="left">Message</div></td>
          </tr>
        <tr>
          <td colspan="2"><label for="txt_msg"></label>
            <div align="justify">
              <textarea name="txt_msg" id="txt_msg" cols="45" rows="5"></textarea>
            </div></td>
          </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="button" id="button" value="Send" />
          </div>            <div align="center"></div></td>
          </tr>
      </table>
      </div>
      </td>
    </tr>
  </table>
</form>
<?php if(isset($_POST['button']) && ($_POST['button']!=null))
{     
$na=$_POST['txt_name'];
$mail=$_POST['txt_email'];
$msg=$_POST['txt_msg'];
	     $db->close();
		$db->connect();

$res=$db->store_contact($na,$mail,$msg);
}
	?>
