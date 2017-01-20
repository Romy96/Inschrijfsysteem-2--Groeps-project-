<?php 
 require_once 'inc/session.php';
 require_once 'inc/crud.php';
 require_once 'inc/blade.php';

 if ( IsLoggedInSession()==false ) {
	$_SESSION['errors'][] = "U heeft nog niet ingelogd!";
	header('location: login_admin.php');
	exit;
}

elseif ( IsLoggedInSession()==true && IsAdmin() == false)
{
	$_SESSION['errors'][] = "U bent wel ingelogd, maar u bent geen beheerder!";
	header('location: main.php');
	exit;
}

elseif ( IsLoggedInSession()==true && IsAdmin() == true )
{
	require 'inc/connection.php';

	//$id = mysqli_real_escape_string($db, $_GET['events_id']);

	$sth = $db->prepare("SELECT * FROM members ORDER BY id ASC");
	$sth->execute();

	/* Fetch all of the remaining rows in the result set */
	$users = $sth->fetchAll(PDO::FETCH_ASSOC);

 // output everything
echo $blade->view()->make('backend/members/members_list')->with('users', $users)->render();
}
