<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Visualization of optimal reservoir operation</title>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../excanvas.min.js"></script><![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/modules/exporting.js"></script>
<!-- Additional files for the Highslide popup effect -->
<script type="text/javascript" src="http://www.highcharts.com/highslide/highslide-full.min.js"></script>
<script type="text/javascript" src="http://www.highcharts.com/highslide/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="http://www.highcharts.com/highslide/highslide.css" />
<!--
    <script language="javascript" type="text/javascript" src="flot/jquery.js"></script>
    <script language="javascript" type="text/javascript" src="flot/jquery.flot.js"></script>
    <script language="javascript" type="text/javascript" src="flot/jquery.flot.selection.js"></script>-->
    <script>function NoCache(url)   {   window.open(url+"?nocache="+Math.random());    }
    var chart;
$(function () {
    
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'placeholder'
            },
            title: {
                text: 'Visualization of optimal reservoir operation',
                x: -20 //center
            },
            xAxis: {
				
				title: {
                    text: 'TIME'
                }
            },
            yAxis: {
                title: {
                    text: 'VOLUME M3'
                },

            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
        });
    });
    
});
		</script>
    <style>
	html {
		width:100%;
		height:100%;
		background-image: linear-gradient(bottom, rgb(235,235,235) 23%, rgb(214,214,214) 62%);
		background-image: -o-linear-gradient(bottom, rgb(235,235,235) 23%, rgb(214,214,214) 62%);
		background-image: -moz-linear-gradient(bottom, rgb(235,235,235) 23%, rgb(214,214,214) 62%);
		background-image: -webkit-linear-gradient(bottom, rgb(235,235,235) 23%, rgb(214,214,214) 62%);
		background-image: -ms-linear-gradient(bottom, rgb(235,235,235) 23%, rgb(214,214,214) 62%);
		
		background-image: -webkit-gradient(
			linear,
			left bottom,
			left top,
			color-stop(0.23, rgb(235,235,235)),
			color-stop(0.62, rgb(214,214,214))
		);
		background-size:100% 100%;
	}
	input { padding:5px 10px; }

</style>
 </head>
<?php 

require "db.php";
/*
$hostName = 'localhost';
   $port='5432';
   $databaseName = 'HMak';
   $username_db = 'postgres';
   $password_db = 'marjan007';
   $u_folder = 'uploads_csv';
   function showerror()
   {
      die("Error " . mysql_errno() . " : " . mysql_error());
   }

*/

$db = pg_connect('host='.$hostName.' port='.$port.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);


$sql=pg_query("select * from inflow"); 

$response = array();
$posts = array();
while($row=pg_fetch_array($sql)) 
{ 
$title=$row['id']; 
$url=$row['inflow']; 

$posts[] = array( $title, $url);

} 



$response["data"] = $posts;



$fp = fopen('uploads_csv/inflow.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);




$sql=pg_query("select * from demand"); 

$response = array();
$posts = array();
while($row=pg_fetch_array($sql)) 
{ 
$title=$row['id']; 
$url=$row['demand']; 

$posts[] = array( $title, $url);

} 



$response['data'] = $posts;

$fp = fopen('uploads_csv/demand.json', 'w');
fwrite($fp, json_encode($response));


fclose($fp);





$sql=pg_query("select * from reservoir_level_dp order by id asc"); 

$response = array();
$posts = array();
while($row=pg_fetch_array($sql)) 
{ 
$title=$row['id']; 
$url=$row['storage']; 

$posts[] = array( $title, $url);

} 


$response['data'] = $posts;

$fp = fopen('uploads_csv/reservoir_level_dp.json', 'w');
//if (!$fp) die("FFF");
fwrite($fp, json_encode($response));


fclose($fp);



$sql=pg_query("select * from reservoir_level_rl order by id asc"); 

$response = array();
$posts = array();
while($row=pg_fetch_array($sql)) 
{ 
$title=$row['id']; 
$url=$row['storage']; 

$posts[] = array( $title, $url);

} 

$response['data'] = $posts;

$fp = fopen('uploads_csv/reservoir_level_rl.json', 'w');
fwrite($fp, json_encode($response));


fclose($fp);


?>


<body>
<div style="position:relative; width:1200px; margin:0 auto">

<div id="placeholder" style="width:1200px;height:550px;"></div>

    <br>
<fieldset>
<legend>Click the button to visualize</legend>
<table width="100%" style="vertical-align:middle; text-align:center">
  <tr>
    <td><input name="a" class="fetchSeries" type="button" value="Inflow" lnk="uploads_csv/inflow.json"> </td>
    <td><input name="b" class="fetchSeries" type="button" value="Demand" lnk="uploads_csv/demand.json"></td>
    <td><input name="c" class="fetchSeries" type="button" value="Reservoir volume Dynamic Programming" lnk="uploads_csv/reservoir_level_dp.json"></td>
    <td><input name="d" class="fetchSeries" type="button" value="Reservoir volume Reinforcement Learning" lnk="uploads_csv/reservoir_level_rl.json"></td>
  </tr>
  <tr>
    <td><a onclick="NoCache('uploads_csv/inflow.json')" href="#">Inflow data</a></td>
    <td><a onclick="NoCache('uploads_csv/demand.json')" href="#">Demand data</a></td>
    <td><a onclick="NoCache('uploads_csv/reservoir_level_dp.json')" href="#">Reservoir level data</a></td>
    <td><a onclick="NoCache('uploads_csv/reservoir_level_rl.json')" href="#">Reservoir level data</a></td>
  </tr>
</table>
</fieldset>
    <br>
</div>
<script type="text/javascript">
$(function () {
    
    $("input.fetchSeries").click(function () {
        var button = $(this);
        
        var dataurl = button.attr('lnk')+"?nocache="+Math.random(); ;
		if (chart.get(button.attr('name')) == null) {
			var series = {data: [], id:button.attr('name'), name: button.attr('value')};
			chart.addSeries(series);
		}
        function onDataReceived(data) {

			$.each(data, function(lineNo, line) {
				var series = chart.get(button.attr('name'));
				series.setData([]);
				var tmpVals = [];
				$.each(line, function(id, val) {
					if (val[1] != '') {
						tmpVals.push(parseFloat(val[1]));
								
						}
					
				});
				series.setData(tmpVals);
			});
         }
        
        $.ajax({
            url: dataurl,
            method: 'GET',
            dataType: 'json',
            success: onDataReceived
        });
    });
});
</script>

</body>
</html>
