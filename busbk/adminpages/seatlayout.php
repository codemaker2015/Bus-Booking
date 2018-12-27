
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="50%" border="1" >
    <tr>
      <td width="164">Seat Layout Name </td>
      <td width="337"><input name="txt_name" type="text" id="txt_name" size="35" />       </td>
    </tr>
    <tr>
      <td>Location Of Image</td>
      <td><p>
        <input type="file" name="file_image" id="file_image" />
      </p>
      <p>The image size should be less than 100 kb.and the pixel size is preferred as 300*300</p></td>
    </tr>
    <tr>
      <td>Location of PHP File</td>
      <td><label for="file_file"></label>
      <input type="file" name="file_file" id="file_file">        <label for="file_image"><br>
        The image name and file name should be same.please make sure that you are uploading the correct PHP file
      that provided by the eezzy ticket solution</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit" />
        <input name="reset" type="reset" id="reset" value="Reset" />
      </label></td>
    </tr>
  </table>
  
</form>



<?php
//function to file uplaod
function fileupload($ctlname,$imgname,$allowedtypes,$allowedExts)
{
  
$filename=$_FILES[$ctlname]["name"];
$filetype=$_FILES[$ctlname]["type"];
$filesize=$_FILES[$ctlname]["size"];
$fileerror=$_FILES[$ctlname]["error"];	
$filetemp=$_FILES[$ctlname]["tmp_name"]; 	 
$extension = substr($filename, strpos($filename,'.')+1,strlen($filename)); 
$cimgname=$imgname.".".$extension;

echo $filename."   ";
echo $filetype."   ";
echo $filesize."   ";
echo $extension."   ";
echo $cimgname."   ";

if(
in_array($filetype,$allowedtypes)
&& ($filesize< 2000000)
&& in_array($extension, $allowedExts)
)
  {
   if ($fileerror > 0)
    {
    echo "Return Code: " . $fileerror . "<br>";
    }
  else
    {
    echo "Upload: " . $filename . "<br>";
    echo "Type: " . $filetype . "<br>";
    echo "Size: " . ($filesize / 1024) . " kB<br>";
    echo "Temp file: " . $filetemp . "<br>";

    if (file_exists("layouts/" . $cimgname))
      {
      echo $cimgname . " already exists. ";
      }
    else
      {
      move_uploaded_file($filetemp,
      "layouts/" . $cimgname);
      echo "Stored in: " . "layouts/" . $_FILES["file_image"]["name"];
	  return($cimgname);
      }
    }
  }
else
  {
  echo "       Invalid file";
  }

}
?>



<?php
 if (isset($_POST['Submit'])) 
     {
		
      if ($_POST["Submit"]=="Submit")
       {
		   
		   $na=$_POST['txt_name'];
		   //image upload starts
		  $types = array("image/jpeg", "image/jpg", "image/png");
		  
		   $exts = array("jpeg", "jpg", "png");
		  echo $res1=fileupload('file_image',$na,$types,$exts);
		   
		    //image upload ends
			
			//php file upload starts
			$types=array("application/octet-stream");
			$exts=array("php");
			echo $res2=fileupload('file_file',$na,$types,$exts);
			//php file upload ends
			echo $res1."    ";
			echo $res2."    ";
			
			$db->close();
			$db->connect();
			$result=$db->store_seatlayout($na,$res1,$res2,'layouts/');
			if($result!=false)
			{
		
			echo "success";
			}
			else
			{
			echo "not success";
			}
			
			
		   	
	   }
	 }

?>
