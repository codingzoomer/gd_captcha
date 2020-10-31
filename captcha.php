<?php
	session_start();
	//starting session

	if($_GET['code'] == $_SESSION['code']){
		$_SESSION['verified'] = true;
		header("Location:index.php");
		//if the code is valid,redirecting
		//to index.php with new session variable
	}else{
		unset($_SESSION['code']);
		header("Location:index.php");
	}

?>
