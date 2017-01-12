<?php 
 require_once 'inc/session.php';
 require_once 'inc/crud.php';
 require_once 'inc/blade.php';
 $errors = [];

if ( IsLoggedInSession()==false) {
	// stuur direct door naar main pagina
    $_SESSION['errors'][] = "U heeft nog niet ingelogd!";
	header('location: login_admin.php');
	exit;
}

elseif ( IsLoggedInSession()==true && $_SESSION['IsAdmin'] == false)
{
	$_SESSION['errors'][] = "U bent wel ingelogd, maar u bent geen beheerder!";
	header('location: main.php');
	exit;
}

elseif ( IsLoggedInSession()==true && $_SESSION['IsAdmin'] == true)
{
 // output everything
echo $blade->view()->make('backend/members/create_user')->withErrors($errors)->render();
}