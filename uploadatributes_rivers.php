
<?php
$id=$_GET['id'];
 $gid=$_GET['gid'];
$name= $_GET['name'];

$category=$_GET['category'];
$goesin=$_GET['goesin'];

//echo $_GET['fname'];
//echo 'Ova e prezemeno!!!!!!!!!1 riverid  '+$riverid+ "kategorija   " +$category+" goesin  "+$goesin+"id   "+$id;
//echo 'GID' +$gid;

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
$query1=" UPDATE rivers SET id ='$id', name ='$name',category='$category',goesin='$goesin'  WHERE gid='$gid'";
$result = pg_query($query1) or die('Query failed: ' . pg_last_error());




pg_close($con);
?> 
