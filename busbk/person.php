<script type="text/javascript">
function valid()
{
 var a=document.forms[0].txt_name.value;
 var b=document.forms[0].txt_username.value;
 var c=document.forms[0].txt_password.value;
 var d=document.forms[0].txt_rpassword.value;
 var e=document.forms[0].txt_age.value;
 var f=document.forms[0].txt_mobile1.value;
 var g=document.forms[0].txt_mobile2.value;
 var h=document.forms[0].txt_address.value;
 var male=document.forms[0].gender[0].checked;
 var female=document.forms[0].gender[1].checked;

 if(a=="")
 {
   document.getElementById("name").innerHTML="Enter your name";
   return false;
 
 }
 else
 {
	 document.getElementById("name").innerHTML="";
 
 }

 if(!isNaN(a))
 {
	 
   document.getElementById("name").innerHTML="is not a character";
   return false;
 }
 else
 document.getElementById("name").innerHTML=" ";
 
  if(b=="")
 {
	 
   document.getElementById("username").innerHTML="Enter ur name";
   return false;
 }
 else
 document.getElementById("username").innerHTML=" ";

  if(c=="")
 {
	 
   document.getElementById("password").innerHTML="Enter ur password";
   return false;
 }
 else
 document.getElementById("password").innerHTML=" ";
  if(d=="")
 {
	 
   document.getElementById("rpassword").innerHTML="Re-enter password";
   return false;
 }
 else
 document.getElementById("rpassword").innerHTML=" ";
 if((male==false) &&(female==false))
{
document.getElementById("gen").innerHTML="Please choose your Gender: Male or Female ";
return false;
}
else
 document.getElementById("gen").innerHTML=" ";

 
 
  if(e=="")
 {
	 
   document.getElementById("age").innerHTML="Enter your age";
   return false;
 }

 else
 document.getElementById("age").innerHTML=" ";
 
		
 
   if(f=="")
 {
	 
   document.getElementById("mobile1").innerHTML="Enter your mobile number";
   return false;
 }
 else
 document.getElementById("mobile1").innerHTML=" ";
 
  if(g=="")
 {
   document.getElementById("mobile2").innerHTML="Enter your Alternative Contact Number ";
   return false;
 }
 else
 document.getElementById("mobile2").innerHTML=" ";
 
 if(h=="")
 {
   document.getElementById("address").innerHTML="Enter your Address ";
   return false;
 }
 else
 document.getElementById("address").innerHTML=" ";
 


 if(c != d)
 {
   document.getElementById("rpassword").innerHTML="Password Mismatch";
   return false;
 }
  else
   document.getElementById("rpassword").innerHTML="";
   if(f.length != 10)   
   {
  document.getElementById("mobile1").innerHTML="Invalid phone number";
  return false;
   }
 else
   document.getElementById("mobile1").innerHTML="";
  if(isNaN(f))
   {
  document.getElementById("mobile1").innerHTML="It is not a digit";
  return false;
   }
 else
   document.getElementById("mobile1").innerHTML="";

      if(g.length != 10)
   {
  document.getElementById("mobile2").innerHTML="Incorrect phn no";
  return false;
   }
 else
   document.getElementById("mobile2").innerHTML="";
 if(isNaN(e))
 {
	 
 document.getElementById("age").innerHTML="Invalid age";
 return false;
	}
 else
 document.getElementById("age").innerHTML=" ";

 }
</script>
<style type="text/css">
p
{
  color:#F00
}
#div1 #div3 table tr td div {
	font-family: Verdana, Geneva, sans-serif;
	font-size: large;
	font-style: normal;
	color: #03F;
	background-color: #666;
}
</style>
</script>
</head>

<body>
<form name="form1" action="insertionAction.php" method="post" onSubmit="return valid();">

<div id="div1">
<div id="div2">
Registeration
</div>
<div id="div3">

<table width="619" height="507" border="1">
  <tr>
    <td colspan="3">
  </td>
    </tr>
  <tr>
    <td width="199">Name</td>
    <td width="239"> <input name="txt_name" type="text" id="txt_name" size="35"/></td>
    <td width="144"><p id="name"></p></td>
  </tr>
  <tr>
    <td>UserName</td>
    <td> <input name="txt_username" type="text" id="txt_username" size="35"/></td>
    <td><p id="username"></p></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input name="txt_password" type="password" id="txt_password" size="35" /></td>
    <td><p id="password"></p></td>
  </tr>
    <tr>
    <td>Re-enter Password</td>
    <td><input name="txt_rpassword" type="password" id="txt_rpassword" size="35" /></td>
<td><p id="rpassword"></p></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>
          <label>
          <input type="radio" name="gender" id="gender" value="Male" />
          Male</label>
          
          <label>
          <input type="radio" name="gender" id="gender" value="Female" />
          Female</label>
          <br />
      </td>
      <td><p id="gen"></p></td>
  </tr>
   <tr>
      <td>Age</td>
      <td><input name="txt_age" type="text" id="txt_age" size="15" /></td>
      <td><p id="age"></p></td>
    </tr>

      <td>Address</td>
      <td><textarea name="txt_address" cols="28" id="txt_address"></textarea></td>
      <td><p id="address"></p></td>
      </tr>
    <tr>
      <td>Mobile Number </td>
      <td><input name="txt_mobile1" type="text" id="txt_mobile1" size="35" /></td>
      <td><p id="mobile1"></p></td>
    </tr>
    <tr>
      <td>Alternative Contact Number </td>
      <td><input name="txt_mobile2" type="text" id="txt_mobile2" size="35" /></td>
      <td><p id="mobile2"></p></td>
    </tr>

  <tr>
    <td>&nbsp;</td>
    <td><label>
        <input type="submit" name="Submit" value="Submit" />
        <input name="reset" type="reset" id="reset" value="Reset" />
      </label></td>
  </tr>
</table>
</div>
</div>
</form>
