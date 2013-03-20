<?php
 
  session_start();

  if (!(isset($_SESSION["valid_user"])))
	  {
	   header('Location:  index.php');
	  }
  else {
  	echo "Welcome authorised user <b>".$_SESSION["valid_user"]."</b>! <br />";
	echo "You have reached the end of your journey! ... Ciao :)";
    unset($_SESSION['valid_user']);
  }
  session_destroy();
?> 