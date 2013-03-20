// JavaScript Document

/*
HERE ARE DEFINED ALL CONECTIONS TO UPLOAD ATTRIBUTES OF THE SYSTEM
*/

var xmlhttp;


function mailme2river(frm)
{

	id= document.frm.id.value;
  gid= document.frm.gid.value;
	 name = document.frm.name.value;

	  category=document.frm.category.value;
	  goesin=document.frm.goesin.value;
	
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
   document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","uploadatributes_rivers.php?id="+id+"&gid="+gid+"&name="+name+"&category="+category+"&goesin="+goesin,true);  //how the sting is made !!!

//xmlhttp.open("GET","getuser.php?fname="+ime+"?riverid="+riverid+"?category="+category+"?goesin="goesin,true);
xmlhttp.send();
}




	
	function mailme2canal(frm)
{

	id= document.frm.id.value;
  	gid= document.frm.gid.value;
	lenght = document.frm.lenght.value;
	category=document.frm.category.value;
	goesin=document.frm.goesin.value;
	
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","uploadatributes_canals.php?id="+id+"&gid="+gid+"&lenght="+lenght+"&category="+category+"&goesin="+goesin,true);  //how the sting is made !!!


xmlhttp.send();
}


function mailme2reservoir(frm)
{

	id= document.frm.id.value;
  	gid= document.frm.gid.value;
	name = document.frm.name.value;
	category=document.frm.category.value;
	max_volume=document.frm.max_volume.value;
	min_volume=document.frm.min_volume.value;
	
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","uploadatributes_reservoir.php?id="+id+"&gid="+gid+"&name="+name+"&category="+category+"&max_volume="+max_volume+"&min_volume="+min_volume,true);  //how the sting is made !!!


xmlhttp.send();
}
	
	function mailme2users(frm)
{

	id= document.frm.id.value;
  	gid= document.frm.gid.value;
	category=document.frm.category.value;
	weight=document.frm.weight.value;
	
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","uploadatributes_users.php?id="+id+"&gid="+gid+"&weight="+weight+"&category="+category,true);  //how the sting is made !!!


xmlhttp.send();
}




function mailme2inflows(frm)
{

	id= document.frm.id.value;
  	gid= document.frm.gid.value;
	name= document.frm.name.value;
	category=document.frm.category.value;

	
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","uploadatributes_inflows.php?id="+id+"&category="+category+"&gid="+gid+"&name="+name,true);  //how the sting is made !!!

//xmlhttp.open("GET","uploadatributes_inflows.php?id="+id+"&gid="+gid+"&weight="+weight+"&category="+category,true);

xmlhttp.send();
}





function mailme2land_agriculture(frm)
{

	id= document.frm.id.value;
  	gid= document.frm.gid.value;
	category=document.frm.category.value;
	name_user=document.frm.name_user.value;
	soil_type=document.frm.soil_type.value;
	vegetation=document.frm.vegetation.value;
	

	
	
	
	
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","uploadatributes_land_agriculture.php?id="+id+"&gid="+gid+"&category="+category+"&name_user="+name_user+"&soil_type="+soil_type+"&vegetation="+vegetation,true);  //how the sting is made !!!


xmlhttp.send();
}

	
	