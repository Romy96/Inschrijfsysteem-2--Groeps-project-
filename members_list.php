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
else 
{
	require 'inc/connection.php';

	//$id = mysqli_real_escape_string($db, $_GET['events_id']);

	$sth = $db->prepare("SELECT * FROM members ORDER BY id ASC");
	$sth->execute();

	/* Fetch all of the remaining rows in the result set */
	$users = $sth->fetchAll(PDO::FETCH_ASSOC);

 // output everything
echo $blade->view()->make('backend/members/members_list')->with('users', $users)->withErrors($errors)->render();
}