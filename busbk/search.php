<script type="text/javascript">
function validationtxt()
{
 var a=document.getElementById("txt_sl").value;
 var b=document.getElementById("txt_el").value;
 var c=document.getElementById("txt_date").value;

 if(a=="")
 {
   document.getElementById("sloc").innerHTML="Enter a start location";
   return false;
 
 }
 else
 {
	 document.getElementById("sloc").innerHTML="";
 
 }

 if(!isNaN(a))
 {
	 
   document.getElementById("sloc").innerHTML="is not a character";
   return false;
 }
 else
 document.getElementById("sloc").innerHTML=" ";
 
  if(b=="")
 {
	 
   document.getElementById("eloc").innerHTML="Enter an ending location";
   return false;
 }
 else
 document.getElementById("eloc").innerHTML=" ";
 if(!isNaN(a))
 {
	 
   document.getElementById("eloc").innerHTML="is not a character";
   return false;
 }
 else
 document.getElementById("eloc").innerHTML=" ";

  if(c=="")
 {
	 
   document.getElementById("date").innerHTML="You have to enter a date";
   return false;
 }
 else
 document.getElementById("date").innerHTML=" ";
if(a!=null && b!=null && c!=null)
{
	getDeatils();
} }
 

</script>
<style type="text/css">
#serchPage {
	background-image: url(images/ser%20copy.png);
	background-repeat: no-repeat;
	background-position: right center;
	width: 700px;
}
p{
	background-color:#F00;
}
</style>
<body>
<form action="" method="post">
          <div id="serchPage">
            <table width="70%" border="0" cellspacing="3">
              <tr>
                <td height="100%" align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="100%" align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="87" height="100%" align="right">Start Location</td>
                <td width="167"><input name="txt_sl" type="text" class="tbstyle1" id="txt_sl" ></td>
                <td width="218"><p id="sloc"></p></td>
              </tr>
              <tr>
                <td height="100%" align="right">End Location</td>
                <td><label for="txt_el"></label>
                <input name="txt_el" type="text" class="tbstyle1" id="txt_el" ></td><td width="218"><p id="eloc"></p></td>
              </tr>
              <tr>
                <td height="100%" align="right">Date</td>
                <td>
                  <input type="Text"  id="txt_date" size="25" maxlength="25" class="tbstyle1" ><a href="javascript:NewCal('txt_date','ddMMyyyy',false,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
                  <span class="descriptions"></span>
                </td><td width="218"><p id="date"></p></td>
              </tr>
              <tr>
                <td height="100%" align="right">&nbsp;</td>
                <td><input type="button" name="button" id="button" value="Search" onClick="return validationtxt();"></td>
              </tr>
              <tr>
                <td height="100%" align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"></td>
              </tr>
            </table>
</div>
</form>
</body>
      