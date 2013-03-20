<?php /*<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ico</title>
</head>

<body>*/
?>

<?php

/*

THIS IS FOR ,LINUX
require "db.inc";

//$thisdirectory = getcwd(); 
//@ mkdir($thisdirectory ."/".$u_folder , 0777);  
//$lokacija="./".$u_folder;

$lokacija=$u_folder;
$settings['maxsize'] = 9000;                                 
$settings['types'] = array("csv","txt"); 
$settings['dir'] =$lokacija.'/'; 
$settings['base_dir'] = "/var/www/html/prototype/";
$settings['rename'] = false;
$upload_folder = $u_folder;
$filename="ime";

$err_report=0;

*/
require "db.inc";

$thisdirectory = getcwd(); 
@ mkdir($thisdirectory ."/".$u_folder , 0777);  
$lokacija="./".$u_folder;
$settings['maxsize'] = 9000;                                 
$settings['types'] = array("csv","txt"); 
$settings['dir'] =$lokacija.'/'; 
$settings['rename'] = false;
$upload_folder = "\\".$u_folder;
$filename="ime";


$err_report=0;

function returnStatus($status){
	return "<html><body><script type='text/javascript'>function init(){if(top.uploadComplete) top.uploadComplete('".$status."');}window.onload=init;
</script></body></html>";

}

if($_POST['typedb']=="notsel")
{
	header("Location: 1.php?show_report=1");
	$err_report=1;
	$status='Error0';
	echo returnStatus($status);
}

if (!isset($_POST['uploadRL'])) { 
	header("Location: 1.php?show_report=2");
	$err_report=1;
	$status='Error1';
	echo returnStatus($status);
}  else {  
                                       
		$file['name'] = $_FILES['ufile']['name'];
	$file['size'] = $_FILES['ufile']['size']; 
	$file['ext'] = strtolower(substr($file['name'], strpos($file['name'], '.') + 1));
	$file['tmp_name'] = $_FILES['ufile']['tmp_name'];
	
$filename=$file['name'];


	if ($file['size'] >= $settings['maxsize']*1024) {
		echo "Fajlot e pregolem.<br />";
		echo "Maksimalnata dozvolena golemina e: ".$settings['maxsize']." KB.";
		$status='File size is too big';
		echo returnStatus($status);
	} else {



		$ok = 0;

		for($i=0;$i<count($settings['types']);$i++) { 
			if ($settings['types'][$i] == $file['ext']) {
				$ok++;
			}
		}
		//$ok = 1;
		if ($ok == 0) {
 			//echo "Ekstenzijata (.".$file['ext'].") ne e dozvolena.";
 		$status='File extension is not valid ';
				echo returnStatus($status);
		} else { 



 			if ($settings['rename']) {  
				$file['newname'] = rand(0000000000,9999999999);
				$file['path'] = $settings['dir'].$file['newname'].".".$file['ext'];
 			} else {
 				$file['path'] = $settings['dir'].$file['name'];
 			}


 			if(copy($file['tmp_name'], $file['path'])) {
				$status='Success';
 			echo returnStatus($status);
				
 			} else {
 				$status='Error5';
				echo returnStatus($status);
 			}
 		}
 	}
if($err_report!=1)
{




$type_db = $_POST['typedb'];




//	$db = pg_connect('host='.$hostName.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);

	$db = pg_connect('host='.$hostName.' port='.$port.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);

	$delete_previous_data="DELETE FROM ".$type_db;
	$query_delete_resault = pg_query($db, $delete_previous_data);

	$ivica= $thisdirectory.$upload_folder."\\";
	$cela_lokacija = str_replace("\\", "\\\\", $ivica);//mn bitno
	$cela_lokacija .= $filename;

	$copy_query = "copy ".$type_db." from '".$cela_lokacija."' using delimiters ';'";
	
	$result_copy = pg_query($db,$copy_query); 
	if (!$result_copy) {
		header("Location: 1.php?show_report=3");	
	} 
	else
		header("Location: 1.php?show_report=0");
	}
/*	$type_db = $_POST['typedb'];

//	$db = pg_connect('host='.$hostName.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);

	$db = pg_connect('host='.$hostName.' port='.$port.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);

	$delete_previous_data="DELETE FROM ".$type_db;
	$query_delete_resault = pg_query($db, $delete_previous_data);

	//$ivica= $thisdirectory.$upload_folder."/";
	//$cela_lokacija = str_replace("\\", "\\\\", $ivica);//mn bitno
	//$cela_lokacija="/tmp";	
	$cela_lokacija = $settings['base_dir'].$settings['dir'].$filename;
//copy($cela_lokacija, "/tmp/".$filename);

	//$copy_query = "COPY ".$type_db." FROM '"."/tmp/".$filename."' WITH DELIMITER ';'";


	$redovi = explode("\n", file_get_contents($cela_lokacija));	

	$result_copy = pg_copy_from($db , $type_db , $redovi , ";");


	//$result_copy = pg_query($db,$copy_query); 
	if (!$result_copy) {
		echo pg_last_error();
		//header("Location: 1.php?show_report=3");	
	} 
	else {
unlink("/tmp/".$filename);
		//header("Location: 1.php?show_report=0");
	}

	*/
}


?>
</body>
</html>
