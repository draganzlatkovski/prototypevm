<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style/style-(backup).css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cloud prototype application for support of water resources modeling and optimization</title>
</head>

<body>

<div class="headtitle">
    <center>
    <h1 id="title">Web application for water resources </h1>
    </center>
    </div>
    

        
  
<div class="content_index" >

   <justify><h2>
   
   <form name="frmJob" method="post" action="index1.php">
            <table>
                <tr>
                    <td width="150">
                        Username      
                    </td>
                    <td >
                        <input name ="username" type="text" id="txt1"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password    
                    </td>
                    <td>
                        <input name="password" type="password" id="txt2"/>
                    </td>
                </tr>
                
                <tr>
                    <td>&nbsp;
                         
                    </td>
                    <td>
                        <input name ="Submit" type="submit" value="Submit"/>
                    </td>
                </tr>
				<tr>
                    <td>&nbsp;
                         
                    </td>
                    <td>&nbsp;
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href='index1.php'>Application</a>
                    </td>
                    <td>
                        <a href='logout.php'>Logout</a>
                    </td>
                </tr>
            </table>
        </form>
        
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<p>If you want to access the system please send email to  <a href="mailto:blagoj.delipetrev@gmail.com">blagoj.delipetrev@gmail.com</a>  and login and password will be provided</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>Here are explained the capabilities of the prototype web application. Map application is build using OpenLayers  JavaScript library. On the right side are tools for entering, deleting,  selecting and saving new geospatial objects. On the left site are tools for  zooming and moving across the map. Bellow the map on the right corner is  dropdown list to select the working layer. There are six layers: rivers,  canals, reservoir, agriculture land, users and inflow. Every object is defined  by its geospatial information and attributes data that is in the tab attribute  info shown bellow the map. This creates a framework to support water resources modeling.  Additionally with every object it is possible to include time series data.</p>
    <p>Reservoir objects have additional functionality in the  system to run simulation and optimization of reservoir operation. When  reservoir object is selected in the tab timeseries data it is possible to  upload five .csv files containing time series values. The example is taken from  &quot;Loucks, D. P. and van Beek E. (2005). Water resources systems planning  and management: an introduction to methods, models and applications. UNESCO,  90-113.&quot; Bellow is a link to sample data. After successful upload of the  files there is possibility to run Dynamic algorithm optimization in the tab  Optimization. There is visualization of the inflow, demand and calculated  optimal reservoir level using dynamic programming.</p>
<h2 >&nbsp;</h2>
<p >
<h3 >There are video tutorials bellow explaning most important concepts  and tutorial how to use the system
</p></h3>
    <p >&nbsp;</p>
<h3 ><a href="video/0/0.html"> <strong>Introduction to the web application and web service for managing, presenting and storing geospatial data </strong></a></h3>
<p></p>
      <h3 >&nbsp; </h3>
<h3 > <strong><a href="video/2/2.html">Web service for support modeling of water resources </a></strong></h3>
 <p></p>
<p> </p>
      <h3 >&nbsp; </h3>
<h3 > <strong><a href="video/3/3.html">Web service for water resources optimization </a></strong></h3>
<p >&nbsp;</p>
<p >&nbsp;</p>
<h3 >
<p ><a href="video/data.rar">Sample data of the web service for water resources optimization can be dowloaded here </a></p></h3>
<p >&nbsp;</p>

</body>
</html>
