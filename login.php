<?php 
 require_once 'inc/session.php';
 require_once 'inc/crud.php';
 require_once 'inc/blade.php';

if ( IsLoggedInSession()==true ) {
	// stuur direct door naar main pagina
    $_SESSION['errors'][] = "U bent al ingelogd!";
	header('location: main.php');
	exit;
}
else
{
	// get errors from session
	if ( isset ($_SESSION['errors'])) {
		$errors = $_SESSION['errors'];
		$_SESSION['errors'] = array();	
	}

 // output everything
echo $blade->view()->make('login')->withErrors($errors)->render();
}