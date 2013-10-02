<?php
session_start();
$errmsg_arr = array();
$errflag = false;
include('config.php');
if(isset($_GET['status']))
{


$status=$_GET['status'];
$id=$_GET['id'];
	if(mysql_query("UPDATE users SET status='$status' WHERE id='$id'"))
	{
	$errmsg_arr[] = '<font color="green">Status is changed</font>';
	$errflag = true;
	}
	else
	{
	$errmsg_arr[] = '<font color="red">Something wrong with change status of the user</font>';
	$errflag = true;
	}	
}
else
{
	if(isset($_GET['deleteid']))
	{
		
		$id = (int)$_GET['deleteid'];
		if(mysql_query("DELETE FROM users WHERE id='".$id."'"))
		{
		$errmsg_arr[] = '<font color="green">User Account is deleted</font>';
		$errflag = true;
		}
		else
		{
		$errmsg_arr[] = '<font color="red">Something wrong with delete the user id: </font>'.$id.'';
		$errflag = true;
		}
	}
	else
	{
	header("location: addUsers.php");
	exit();
	}
}
if($errflag)
	{
		$_SESSION['ERRMSGV1_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: addUsers.php");
		exit();
	}
?>
