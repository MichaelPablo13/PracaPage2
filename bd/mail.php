<?php
	// Using Awesome https://github.com/PHPMailer/PHPMailer
	echo "Mail to Recipient";
	require 'PHPMailer-master/PHPMailerAutoload.php';

	// As 3 linhas abaixo são para o navegador mostrar o erro. 
	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	error_reporting(E_ALL);

    $contact_name = $_GET["name"];
    $email = $_GET["email"];
    $message = $_GET["comment"];


	
	$mail = new PHPMailer;
	
	//echo "$mail";
	$mail->isSMTP(); // Set mailer to use SMTP
	$mail->Host = 'smtp.mailgun.org'; // Specify main and backup SMTP servers
	$mail->SMTPAuth = true; // Enable SMTP authentication
	$mail->Username = 'postmaster@sandbox823fe8c1c86244208c44f838e1304159.mailgun.org'; // SMTP username
	$mail->Password = 'd4be3fe5839b4abaa6321e60d0baf269'; // SMTP password
	$mail->SMTPSecure = 'tls'; // Enable encryption, only 'tls' is accepted

	$mail->From = 'postmaster@sandbox823fe8c1c86244208c44f838e1304159.mailgun.org';
	$mail->FromName = 'Mailer';
	$mail->addAddress('albordignon@gmail.com'); // Add a recipient

	$mail->WordWrap = 50; // Set word wrap to 50 characters

	$mail->Subject = 'Contato: ' . $contact_name;
	$mail->Body = $contact_name, $email, $message;

	if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
		echo 'Message has been sent';
	}
?>