<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<form id='uploadform' enctype='multipart/form-data' action='uploadSDP.php' method='post'>        <br/>    <select name='typedb' id='wroselect'>            <option value='notsel'>Select type</option>            <option value='storage_sdp'> Storage Discretization</option>            <option value='inflow_sdp'>Inflow</option>            <option value='demandtown_sdp'>Demand town</option>   <option value='demandagriculture_sdp'>Demand agriculture</option>  <option value='demandecology_sdp'>Demand ecology</option>       <option value='flood_sdp'>Flood</option>            <option value='recreation_sdp'>Recreation</option>            </select>                       <input name='ufile' type='file' size='28' id='ufile1' /> <input type='submit' value='uploadSDP' name='uploadSDP' /><span id='status' style='display:none'>...</span><iframe id='target_iframe' name='target_iframe' src='' style='width:0;height:0;border:0px'></iframe></form>
</body>
</html>
