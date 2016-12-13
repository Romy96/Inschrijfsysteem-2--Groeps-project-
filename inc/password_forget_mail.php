<?php

	use Philo\Blade\Blade;

function SendPasswordEmail($Gebruikersnaam, $Email) {
    require_once 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
    require_once 'inc/password.php';

	require 'vendor/autoload.php';
	$views = __DIR__ . '/../views';		// blade.php now sits in /inc folder, so prefix views folder with /../
	$cache = __DIR__ . '/../cache';		// so $views and $cache still point to valid filesystem folder
//
	$blade = new Blade($views, $cache);

	$mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = "mail.smtp2go.com";
    $mail->Port = "80"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = $username_smtp2go;
    $mail->Password = $password_smtp2go;

    $mail->From     = $username_smtp2go;
    $mail->FromName = "Romy Bijkerk";
	//Set who the message is to be sent to
	$mail->addAddress($Email, $Gebruikersnaam);
	$mail->AddReplyTo($Email, $Gebruikersnaam);
	//Set the subject line
	$mail->Subject = 'New password';

//  Read an HTML message body from an external file, convert referenced images to embedded,
//  convert HTML into a basic plain-text alternative body

	$msg = $blade->view()->make('New_password')->with(array('Email' => $Email, 'Gebruikersnaam' => $Gebruikersnaam))->render();

	$mail->msgHTML($msg);
	//Replace the plain text body with one created manually
	$mail->AltBody = 'Your e-mail client does not support HTML emails.';
	
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";
	}

	return true;
}