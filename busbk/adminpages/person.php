<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>


<form id="frm_personregister" name="frm_personregister" method="post" action="">
  <table width="50%" border="1" align="left" cellpadding="10">
    <tr>
      <td width="164">Name</td>
      <td width="337"><label>
        <input name="txt_name" type="text" id="txt_name" size="35"/>
      </label></td>
    </tr>
    <tr>
      <td>E-Mail ID </td>
      <td><input name="txt_emailid" type="text" id="txt_emailid" size="35" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label></label>
        <p>
          <label>
          <input type="radio" name="gender" value="1" />
          Male</label>
          
          <label>
          <input type="radio" name="gender" value="0" />
          Female</label>
          <br />
      </p></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><input name="txt_emailid2" type="text" id="txt_emailid2" size="15" /></td>
    </tr>
<tr>
	<td>Password</td>
      <td><input name="txt_password" type="password" id="txt_password" size="35" /></td>
    </tr>
      <td>Address</td>
      <td><textarea name="txt_address" cols="28" id="txt_address"></textarea></td>
      </tr>
    <tr>
      <td>Mobile Number </td>
      <td><input name="txt_mobile1" type="text" id="txt_mobile1" size="35" /></td>
    </tr>
    <tr>
      <td>Alternative Contact Number </td>
      <td><input name="txt_mobile2" type="text" id="txt_mobile2" size="35" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label>
        <input type="submit" name="Submit" value="Submit" />
        <input name="reset" type="reset" id="reset" value="Reset" />
      </label></td>
    </tr>
  </table>
  <label></label>
</form>
</body>
</html>
