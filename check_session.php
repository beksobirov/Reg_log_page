<?php
	session_start();
	
	//-------check time logout------------
	$idle = 600;//600sekund/60=10minut;
	if(isset($_SESSION['timeout_logout_tl'])){	
		$session_life = time() - $_SESSION['timeout_logout_tl'];
		if($session_life > $idle){ 
			header('location: ./action_exit.php'); 
		}
	}
	$_SESSION['timeout_logout_tl']=time();
	//---------end--------------------

	// check the sessions
	if(!isset($_SESSION['participant'])){
		header('location: ./action_exit.php');
    };
?>