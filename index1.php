<?php
session_start();
	$u=$_POST['username'];
	$p=$_POST['password'];

	

	if ($u=="adminb" && $p=="Not123"){
  		$_SESSION['valid_user']=$u;
	 
	 header('Location:  app.php');
exit();
	  // echo "<a href='app.php'>Page 2</a>";
	} else {
		echo "Wrong username or password.<br/>";
		echo "<a href='index.php'>Go back </a> and enter valid username and/or password!";
	}
	echo "<br />";
    ?>
