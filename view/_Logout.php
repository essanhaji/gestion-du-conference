<?php
	session_start();

	if( isset($_SESSION['Participant']) )
	{
	  unset($_SESSION['Participant']);
	  session_destroy();
	  header('location:_Login.php');

	}

	 elseif(isset($_SESSION['Admin']))
	 {
	  	unset($_SESSION['Admin']);
	  	session_destroy();
	  	header('location:_Login.php');
	 }

?>