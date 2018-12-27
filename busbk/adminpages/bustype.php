<form id="form1" name="form1" method="post" action="">
  <table width="70%" border="1" align="left" cellpadding="10">
    <tr>
      <td width="68">Bus Type Name </td>
      <td width="370"><label>
        <input name="txt_bustype" type="text" id="txt_bustype" size="35"/>
      </label></td>
    </tr>

    <tr>
      <td>Amenities</td>
      <td>
          <p>
            
            <label>
            <input name="chk_movie" type="checkbox" id="chk_movie" value="1" />Movie </label>
            <label>
            <input name="chk_water" type="checkbox" id="chk_water" value="1" />Water Bottle
            <input name="chk_charger" type="checkbox" value="1" id="chk_charger" />            </label>
            Charging Point
            <input name="chk_blanket" type="checkbox" id="chk_blanket" value="1" />
        Blanket<br />
        </p></td>
    </tr>


    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit" />
        <input name="reset" type="reset" id="reset" value="Reset" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php
if(isset($_POST['Submit'])&&($_POST['Submit']!=null))
{
	 $movie=0;$water=0;$blanket=0;

	if (isset($_POST['chk_movie']) && $_POST['chk_movie'] == '1') 
	$movie=1;
	if (isset($_POST['chk_water']) && $_POST['chk_water'] == '1') 
	$water=1;
	if (isset($_POST['chk_charger']) && $_POST['chk_charger'] == '1') 
	$charger=1;
	if (isset($_POST['chk_blanket']) && $_POST['chk_blanket'] == '1') 
	$blanket=1;
    
	$btype=$_POST['txt_bustype'];
	echo $btype;
	echo $movie;
	echo $water;
	echo $blanket;
	$db->close();
	$db->connect();
	$result=$db->store_bustype($btype,$movie,$water,$charger,$blanket);
	if($result!=false)
	echo "success";
    else
     echo "not success";

}
?>

