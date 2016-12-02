<?php

// use Philo\Blade\Blade;

function SendActivationEmail($Email, $Voornaam) {
    require_once 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

//    require 'vendor/autoload.php';
//    $views = __DIR__ . '/../views';		// blade.php now sits in /inc folder, so prefix views folder with /../
//    $cache = __DIR__ . '/../cache';		// so $views and $cache still point to valid filesystem folder
//
//    $blade = new Blade($views, $cache);
	$mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->Host = "mail.smtp2go.com";
    $mail->Port = "80"; // 8025, 587 and 25 can also be used. Use Port 465 for SSL.
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = "romy-bijkerk@hotmail.com";
    $mail->Password = "r5NUBQMop7ti";

    $mail->From     = "romy-bijkerk@hotmail.com";
    $mail->FromName = "Romy Bijkerk";
	//Set who the message is to be sent to
	$mail->addAddress($Email, $Voornaam);
	$mail->AddReplyTo($Email, $Voornaam);
	//Set the subject line
	$mail->Subject = 'Account verification';

//  Read an HTML message body from an external file, convert referenced images to embedded,
//  convert HTML into a basic plain-text alternative body

//	$msg = $blade->view()->make('sendmail')->render();

	$mail->msgHTML(file_get_contents('views/validationmail.html');
	//Replace the plain text body with one created manually
	$mail->AltBody = 'Your e-mail client does not support HTML emails.';
	
	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    echo "Message sent!";
	}

	return true;
}