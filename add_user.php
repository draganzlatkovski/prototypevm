<?php
if(isset($_POST['submit']))
{
session_start();
$errmsg_arr = array();
$errflag = false;

	if($_POST['username']==null)
	{
		$errmsg_arr[] = '<font color="red">Please enetr username</font>';
		$errflag = true;
	}
	else
	{
		$getUser = $_POST["username"];
		$username = mysql_real_escape_string($getUser);
		
		if($_POST['password']==null)
		{
			$errmsg_arr[] = '<font color="red">Please eneter password</font>';
			$errflag = true;
		}
		else
		{
			if($_POST['password']!=$_POST['cpassword'])
			{
				$errmsg_arr[] = '<font color="red">Password does not match!</font>';
				$errflag = true;
			}
			else
			{
				$getPass = $_POST["password"];
				$password=mysql_real_escape_string($getPass);
				
				$nameSurname=mysql_real_escape_string($_POST['name_surname']);
				$city=mysql_real_escape_string($_POST['city']);
				$country=mysql_real_escape_string($_POST['country']);
				$status=1;
				$date=date("Y-m-d H:i:s");
				
				include('config.php');
				$getUser="SELECT username FROM users WHERE username='$username'";				
				$result = mysql_query($getUser);
				$number_of_rows = mysql_num_rows($result);
				
				
				if($number_of_rows==1)
				{
					$errmsg_arr[] = '<font color="red">The user-name is already taken!</font>';
					$errflag = true;
				}
				else
				{
					$md5Pass=md5($password);
					//$vnes="INSERT INTO users ('username', 'password', 'nameSurname', 'city', 'country', 'status', 'date') VALUES ('$username', '$md5Pass', '$city', '$country', '$status', '$date')";
					$vnes="INSERT INTO users (username, password, nameSurname, city, country, status, date) VALUES ('$username', '$md5Pass', '$nameSurname', '$city', '$country', '$status', '$date')";
					$resulti = @mysql_query($vnes);
					if($resulti==true)
					{
						$errmsg_arr[] = '<font color="green">The user was added to database!</font>';
						$errflag = true;
					}
					else
					{
						$errmsg_arr[] = '<font color="red">Something wrong with adding a user!</font>';
						$errflag = true;
						
					}
				}
				
				
			}
			
		}
	}	
	if($errflag)
	{
		$_SESSION['ERRMSGV1_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: addUsers.php");
		exit();
	}
}
else
{
	header("location: addUsers.php");
	exit();
}
?>
