<?php
$id=$_GET['id'];
 $gid=$_GET['gid'];
$name= $_GET['name'];

$category=$_GET['category'];
$max_volume=$_GET['max_volume'];
$min_volume=$_GET['min_volume'];

require "db.php";

$con =  pg_connect('host='.$hostName.' port='.$port.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);
if (!$con)
  {
  die('Could not connect: ' );
  }


$query1=" UPDATE reservoir SET id ='$id', name ='$name',category='$category',max_volume='$max_volume',min_volume='$min_volume'  WHERE gid='$gid'";
$result = pg_query($query1) or die('Query failed: ' . pg_last_error());




pg_close($con);
?> 
