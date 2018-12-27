// JavaScript Document
function showselect(str)
{
if (str=="")
  {
  document.getElementById("distdiv").innerHTML="";
  return;
  } 
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
    document.getElementById("distdiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax/ajax_district.php?q="+str,true);
xmlhttp.send();
}
function changeClass()
{
	document.getElementById("content").className="iframeAfter";
	document.getElementById("c").style.display="block";
}
function getDeatils()
{

	
var sid=document.getElementById("txt_sl").value;
var eid=document.getElementById("txt_el").value;
var dt=document.getElementById("txt_date").value;

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
		document.getElementById("resdiv").style.display="block";
    document.getElementById("resdiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","searchresult.php?sid="+sid+"&eid="+eid+"&dat="+dt,true);
xmlhttp.send();

}




function CheckLogin()
{

	
var username=document.getElementById("uname").value;
var pwd=document.getElementById("uname2").value;

alert(username);
alert(pwd);
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
		  var res=xmlhttp.responseText;
		 // alert(res);
		  
		  if(res=="invalid")
		  {
		
		// document.getElementById("lgDisplay").style.visibility="hidden";
		 //document.getElementById("logout").style.display="block";
		 // document.getElementById("ajxRes").innerHTML=" Invalid Username Or Password";
		   document.getElementById("loginWin").innerHTML=" Invalid Username Or Password";;
		  }
		  else
		  {
			 document.getElementById("lgDisplay").style.visibility="hidden";
		     document.getElementById("logout").style.display="block";
		     document.getElementById("ajxRes").innerHTML=xmlhttp.responseText;;
		     document.getElementById("loginWin").style.display="none"; 
		  }
    }
  }
xmlhttp.open("GET","loginAction.php?unm="+username+"&pwd="+pwd,true);
xmlhttp.send();
document.location.href="index.php?val=5";


}


function getLayout()
{
var allotid=document.getElementById("hid_allotid").value;
var allotdate=document.getElementById("hid_allotdate").value;
var layoutname=document.getElementById("hid_layoutname").value;
alert(allotid);
alert(allotdate);
alert(layoutname);


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
    document.getElementById("divlayout").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","layouts/"+layoutname+".php?allotid="+allotid+"&allotdate="+allotdate+"&layout="+layout,true);
xmlhttp.send();
}


