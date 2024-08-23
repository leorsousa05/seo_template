<?php

require 'src/utils/websiteData.php';

use PHPMailer\PHPMailer\PHPMailer;

$host           = "smtp.gmail.com";                       
$hostUsername  = "digitallevolutionenvio@gmail.com";                       
$hostPassword  = "nvgt zzya dqie qhce";                       

if (str_contains($uri, WEBSITE_FOLDER . "email-enviado")) {
	$mailForm      = $_GET["email"];
	$nameForm      = $_GET["name"];
	$phoneNumber   = $_GET["phone-number"];
	$message        = $_GET["message"];
}
$subject        = "";                       
$date           = date("d/m/Y H:i:s");      
$ip             = $_SERVER['REMOTE_ADDR'];  
$receiver       = "";                       


$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host       = $host;                     
$mail->SMTPAuth   = true;                                   
$mail->Username   = $hostUsername;                     
$mail->Password   = $hostPassword;                               
$mail->SMTPSecure = 'tls';            
$mail->Port       = 587;                                    

$mail->From       = $hostUsername;
$mail->FromName   = $nameForm;
$mail->Sender     = $hostUsername;


$mail->isHTML(true);                                  
$mail->AddAddress($receiver);
$mail->AddReplyTo("teste@gmail.com", $nameForm);
$mail->Subject = utf8_decode($subject);
$mail->Body .=  utf8_decode("<strong>Nome: </strong>") . utf8_decode($nameForm) .
	"<br />" . utf8_decode("<strong>Celular: </strong>") . utf8_decode($phoneNumber) .
	"<br />" . utf8_decode("<strong>Mensagem: </strong>") . utf8_decode($message) .
	"<font color='#666666' size='1'><br /><br />Email enviado em: $date - IP: $ip <br /> (Enviado via SMTP)</font><br />";

$mail->MsgHTML($mail->Body);

$mail->send();
echo '<meta http-equiv='refresh' content=\'0; URL=/agradecimentos\'>';
