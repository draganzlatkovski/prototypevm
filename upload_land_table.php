<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ico</title>
</head>

<body>
<?php
require "db.php";

$thisdirectory = getcwd(); 
@ mkdir($thisdirectory ."/".$u_folder , 0777);  
$lokacija="./".$u_folder;
$settings['maxsize'] = 9000;                                 
$settings['types'] = array("csv","txt"); 
$settings['dir'] =$lokacija.'/'; 
$settings['rename'] = false;
$upload_folder = "\\".$u_folder;
$filename="ime";
$ime_tabela = $_POST['imeto_za_tabela'];
	echo $ime_tabela;
$err_report=0;

if($_POST['typedb']=="notsel")
{
	header("Location: 1.php?show_report=1");
	$err_report=1;
}
if (!isset($_POST['upload'])) { 
	header("Location: 1.php?show_report=2");
	$err_report=1;
}  else {                                           
		$file['name'] = $_FILES['ufile2']['name'];
	$file['size'] = $_FILES['ufile2']['size']; 
	$file['ext'] = strtolower(substr($file['name'], strpos($file['name'], '.') + 1));
	$file['tmp_name'] = $_FILES['ufile2']['tmp_name'];
	
$filename=$file['name'];


	if ($file['size'] >= $settings['maxsize']*1024) {
		echo "Fajlot e pregolem.<br />";
		echo "Maksimalnata dozvolena golemina e: ".$settings['maxsize']." KB.";
	} else {



		$ok = 0;

		for($i=0;$i<count($settings['types']);$i++) { 
			if ($settings['types'][$i] == $file['ext']) {
				$ok++;
			}
		}
		$ok = 1;
		if ($ok == 0) {
 			echo "Ekstenzijata (.".$file['ext'].") ne e dozvolena.";
 		} else { 



 			if ($settings['rename']) {  
				$file['newname'] = rand(0000000000,9999999999);
				$file['path'] = $settings['dir'].$file['newname'].".".$file['ext'];
 			} else {
 				$file['path'] = $settings['dir'].$file['name'];
 			}
 			if(copy($file['tmp_name'], $file['path'])) {
 				echo "Fajlot e kacen.<br />";
 			} else {
 				echo "Greska. Obidete se povtorno.";
 			}
 		}
 	}
if($err_report!=1)
{

	
//	$db = pg_connect('host='.$hostName.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);

	$db = pg_connect('host='.$hostName.' port='.$port.' dbname='.$databaseName.' user='.$username_db.' password='.$password_db);

	//$delete_previous_data="DELETE FROM ".$type_db;
	//$query_delete_resault = pg_query($db, $delete_previous_data);

$ime_tabela=substr($ime_tabela,0,-1);
$ime_tabela='land'.$ime_tabela;
echo 'blaaaaaaaaaaaaaaaa     '.$ime_tabela;


$create_table_river=' CREATE TABLE '.$ime_tabela.' (
  
  id integer NOT NULL,
  river double precision,
  weight double precision

);' ;


$query_crete_table=pg_query($db,$create_table_river);


	$ivica= $thisdirectory.$upload_folder."\\";
	$cela_lokacija = str_replace("\\", "\\\\", $ivica);//mn bitno
	$cela_lokacija .= $filename;

	$copy_query = "copy ".$ime_tabela." from '".$cela_lokacija."' using delimiters ';'";
	$result_copy = pg_query($db,$copy_query); 
	if (!$result_copy) {
		header("Location: 1.php?show_report=3");
	} 
	else
		header("Location: 1.php?show_report=0");
	}
}
?>
</body>
</html>
