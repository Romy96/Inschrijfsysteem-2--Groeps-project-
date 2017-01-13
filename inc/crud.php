<?php
function CheckUserIsValid ($db, $email, $wachtwoord) {

	if (empty($db)) {
		$_SESSION['errors'][] = 'De database verbinding is niet actief';
		return false;
	}

	// return 0 if email is empty
	if (empty($email)) {
		$_SESSION['errors'][] = 'Uw emailadres is niet ingevuld';
		return false;
	}

	// return 0 if password is empty
	if (empty($wachtwoord)) {
		$_SESSION['errors'][] = 'Uw wachtwoord is niet ingevuld';
		return false;
	}

	$hash = md5($wachtwoord);

	$statement = $db->prepare('SELECT id, gebruikersnaam, isAdmin, email FROM members where email=? AND wachtwoord=? AND active=1 ;');
	$statement->execute(array($email, $hash));
	$count = $statement->rowCount();
	$row = $statement->fetch(PDO::FETCH_ASSOC);

	// user/pass combination found; return 1.
	if ($count == 1) {
			$_SESSION['userId'] = $row['id'];
			$_SESSION['userEmail'] = $row['email'];
			$_SESSION['displayName'] = $row['gebruikersnaam'];
			$_SESSION['isAdmin'] = $row['isAdmin'] ;
	}
	else
	{
		$_SESSION['errors'][] = "Combinatie van gebruikersnaam en wachtwoord niet gevonden";
	}
}



function IsLoggedIn() {

	// check if cookie contains gebruikersnaam (then, if session has no gebruikersnaam, fill session as well)
	if ( isset($_COOKIE['userId']) && !isset($_SESSION['userId']) ) {
		LoginSession($_COOKIE['userId'], $_COOKIE['userEmail'], $_COOKIE['Gebruikersnaam']);
		return true;
	}

		// check if session contains gebruikersnaam
	if ( isset($_SESSION['userId']) ) {
		return true;
	}

	return false;
}


function RememberCookie() {
			// bewaar userId in cookie dat 30 dagen geldig blijft
			setcookie("userId", $_SESSION['userId'], time() + (86400 * 30), "/"); // 86400 = 1 day

			// bewaar userEmail in cookie dat 30 dagen geldig blijft
			setcookie("userEmail", $_SESSION['userEmail'], time() + (86400 * 30), "/"); // 86400 = 1 day

			// bewaar displayName in cookie dat 30 dagen geldig blijft
			setcookie("displayName", $_SESSION['displayName'], time() + (86400 * 30), "/"); // 86400 = 1 day

			// bewaar displayName in cookie dat 30 dagen geldig blijft
			setcookie("isAdmin", $_SESSION['isAdmin'], time() + (86400 * 30), "/"); // 86400 = 1 day
}

function IsLoggedInSession() {
	if (isset($_SESSION['userId'])==false || empty($_SESSION['userId']) ) {
		return 0;
	}
	else
	{
		return 1;
	}
}

function IsAdmin() {
	return (!empty($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1);
}

function LogOut() {
	$_SESSION['errors'][] = "Logged out.";

	unset($_SESSION['userId'], $_SESSION['userEmail'], $_SESSION['displayName'], $_SESSION['isAdmin']);
	$_SESSION = [];
	session_destroy();


	session_start();
	// verwijder het cookie door expiration 
	setcookie("userId", null, time() -3600, "/"); // 86400 = 1 day
	setcookie("userEmail", null, time() -3600, "/"); // 86400 = 1 day
	setcookie("displayName", null, time() -3600, "/"); // 86400 = 1 day
}

