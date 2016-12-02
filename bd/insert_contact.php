<?php
// 
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);

	include 'bd/connection.php';
	include 'email/sendmail.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$comment = $_POST['comment'];
	$date = date_create(date('Y-m-d H:i:s'));

	$sql = "INSERT INTO contact (sender_name, sender_email, message, date) ";
	$sql .= "VALUES('$name', '$email', '$comment', '" .date_format($date, 'Y-m-d H:i:s') ."');";

	$res = db_query($sql);

	$body = "<html>\n";
	$body .= "<body>\n";
	$body .= "<h3>Você recebeu uma nova mensagem: </h3>\n";
	$body .= "<p>$msg</p>\n";
	$body .= "<p><h4> Enviada por $name ($email) em " .date_format($date, 'd/m/Y - H:i:s') ."</h4></p>\n";
	$body .= "<p><h5>Atenciosamente, <br>Administrador</h5></p>\n";
	$body .= "</body>\n";
	$body .= "</html>\n";

	sendEmail($email, $body);

	//TODO criar página de erro e redirecionar para lá, caso algo de errado.

	header('Location: index.php');
?>
