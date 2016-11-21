<?php
function CheckUserIsValid ($db, $email, $wachtwoord) {
	// return 0 if email is empty
	if (empty($email)) {
		return ['result' => 0, 'id' => null, 'email' => null, 'gebruikersnaam' => null];
	}

	// return 0 if wachtwoord is empty
	if (empty($wachtwoord)) {
		return ['result' => 0, 'id' => null, 'email' => null, 'gebruikersnaam' => null];
	}

	$enc_wachtwoord = sha1($wachtwoord);
	//echo '<p>Wachtwoord encrypted with SHA: ' . $enc_wachtwoord . '<br>';

	$statement = $db->prepare('SELECT id, gebruikersnaam FROM members where email=$email AND wachtwoord=$wachtwoord AND active=1 ;');
	$statement->execute(array($email, $enc_wachtwoord));
	$count = $statement->rowCount();
	$row = $statement->fetch(PDO::FETCH_ASSOC);
	$id = $row['id'];
	$gebruikersnaam = $row['gebruikersnaam'];

	// user/pass combination found; return 1.
	if ($count == 1) {
		return ['result' => 1, 'id' => $id, 'email' => $email, 'gebruikersnaam' => $gebruikersnaam];

		$message = "je count is 1";
echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
		return ['result' => 0, 'id' => null, 'email' => null, 'gebruikersnaam' => null];

		$message = "je count is 0";
echo "<script type='text/javascript'>alert('$message');</script>";
	}

}

function IsLoggedIn() {

	// check if cookie contains username (then, if session has no username, fill session as well)
	if ( isset($_COOKIE['id']) && !isset($_SESSION['id']) ) {
		LoginSession($_COOKIE['id'], $_COOKIE['email'], $_COOKIE['gebruikersnaam']);
		return true;
	}

		// check if session contains username
	if ( isset($_SESSION['id']) ) {
		return true;
	}

	return false;
}

function LoginSession($id, $email, $gebruikersnaam) {
	$_SESSION['id'] = $id;
	$_SESSION['email'] = $email;
	$_SESSION['gebruikersnaam'] = $gebruikersnaam;
}

function RememberCookie($id, $email, $gebruikersnaam) {
			// bewaar userId in cookie dat 30 dagen geldig blijft
			setcookie("id", $id, time() + (86400 * 30), "/"); // 86400 = 1 day

			// bewaar userEmail in cookie dat 30 dagen geldig blijft
			setcookie("email", $email, time() + (86400 * 30), "/"); // 86400 = 1 day

			// bewaar gebruikersnaam in cookie dat 30 dagen geldig blijft
			setcookie("gebruikersnaam", $gebruikersnaam, time() + (86400 * 30), "/"); // 86400 = 1 day
}

function IsLoggedInSession() {
	if (isset($_SESSION['id'])==false || empty($_SESSION['id']) ) {
		return 0;
	}
	else
	{
		return 1;
	}
}

function LogOut() {
	$_SESSION['errors'][] = "Logged out.";

	unset($_SESSION['id'], $_SESSION['email'], $_SESSION['gebruikersnaam']);

	// verwijder het cookie door expiration 
	setcookie("id", null, time() -3600, "/"); // 86400 = 1 day
	setcookie("email", null, time() -3600, "/"); // 86400 = 1 day
	setcookie("gebruikersnaam", null, time() -3600, "/"); // 86400 = 1 day
}

