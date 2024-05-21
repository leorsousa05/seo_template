<?php
$cssFolder = "";

// Informações do Head
$websiteTitle          = "";
$websiteName           = "";
$websiteDescription    = "";
$websiteKeywords       = "";
$websiteAuthor         = "";
$websiteUrl            = "";

// Configurações de Email

$host           = "";                       // Host SMTP
$hostUsername  = "";                       // Email do Host
$hostPassword  = "";                       // Senha do Host

$mailForm      = $_GET["email"];
$nameForm      = $_GET["name"];
$phoneNumber   = $_GET["phone-number"];
$message        = $_GET["message"];
$subject        = "";                       // Assunto do Email
$date           = date("d/m/Y H:i:s");      // Data de Envio
$ip             = $_SERVER['REMOTE_ADDR'];  // IP do Usuário
$receiver       = "";                       // Pessoa que Recebe o Email

// CSS usados no website
// Obs.: se quiser usar CSS especifico em alguma página
// Pode fazer aqui mesmo a função PHP
$websiteStylesheets = [
	$cssFolder . "/main.css",
	$cssFolder . "/components.css",
];
