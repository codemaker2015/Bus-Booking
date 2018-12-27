<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="json_req.php">
  <table width="51%" border="0">
    <tr>
      <td width="43%"> username</td>
      <td width="57%"><label for="uname"></label>
      <input type="text" name="uname" id="uname" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="email"></label></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="text" name="password" id="password" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" value="Male" id="gender_0" />
        <label>Male</label>
<input type="radio" name="gender" value="Female" id="gender_1" />
<label>Female</label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label for="password">
        <input name="tag" type="hidden" id="tag" value="login" />
      </label>
        <p><br />
          <br />
      </p></td>
    </tr>
    <tr>
      <td height="83">&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Submit" /></td>
    </tr>
  </table>
</form>


</body>
</html>