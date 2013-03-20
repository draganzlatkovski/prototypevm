<?php
$id=$_GET['id'];
 $gid=$_GET['gid'];
$category= $_GET['category'];
$name_user= $_GET['name_user'];
$soil_type= $_GET['soil_type'];
$vegetation=$_GET['vegetation'];



require "db.php";

$con =  pg_connect('host='.$hostName.' port='.$port.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);
if (!$con)
  {
  die('Could not connect: ' );
  }



//$sql="SELECT * FROM Rivers ;   WHERE id = '".$q."'";

// Performing SQL query
//$query = 'SELECT * FROM "Rivers" WHERE gid=1';  

  
//$query = "SELECT * FROM  Rivers  WHERE gid='$q'" ; 

//$id=11;
$query1=" UPDATE land_agriculture SET id ='$id', name_user ='$name_user',category='$category',soil_type ='$soil_type',vegetation ='$vegetation'  WHERE gid='$gid'";
$result = pg_query($query1) or die('Query failed: ' . pg_last_error());




pg_close($con);
?> 
