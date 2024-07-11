<?php

$cssFolder = "assets/css";
$jsFolder = "assets/js";

// Informações do Head
$websiteTitle          = "";
$websiteName           = "";
$websiteDescription    = "";
$websiteKeywords       = "";
$websiteAuthor         = "";
$websiteUrl            = "";
$geoRegion = "BR-SP";
$geoPosition = "";
$classification = "";
$icbm = "";
$indexPage = true;
$showCredits = true;
$creditsAuthor = "Digitall Evolution";
$creditsUrl = "https://digitallevolution.com.br/";
$creditsClientName = "";

// CSS e Javascript usados no website.
// Colocar CSS e JS crítico e importante para o carregamento da página
// nas arrays critical.
// Oque não for importante como sliders e fontawesome, colocar no 
// nonImportant para o carregamento ser mais rápido.
$websiteStylesheets = [
	new AssetsImports($cssFolder . "/main.css", DefaultAssetsImports::CRITICAL),
	new AssetsImports($cssFolder .  "/components.css", DefaultAssetsImports::CRITICAL),
	new AssetsImports("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css", DefaultAssetsImports::NONCRITICAL)
];

$websiteScripts = [
	new AssetsImports($jsFolder . "/main.js", DefaultAssetsImports::CRITICAL),
	new AssetsImports("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js", DefaultAssetsImports::NONCRITICAL)
];

// Fontes do website para preload
$websiteFonts = [
	new Font("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap", FontCDNImporter::GOOGLE),
];

$imagePreload = [
	"https://www.hubspot.com/hs-fs/hubfs/Shell_logo.svg.png?width=450&height=417&name=Shell_logo.svg.png"
];


// Configurações de Email
/*
$host           = "";                       // Host SMTP
$hostUsername  = "";                       // Email do Host
$hostPassword  = "";                       // Senha do Host

if(str_contains($uri, "/email")) {
$mailForm      = $_GET["email"];
$nameForm      = $_GET["name"];
$phoneNumber   = $_GET["phone-number"];
$message        = $_GET["message"];
}
$subject        = "";                       // Assunto do Email
$date           = date("d/m/Y H:i:s");      // Data de Envio
$ip             = $_SERVER['REMOTE_ADDR'];  // IP do Usuário
$receiver       = "";                       // Pessoa que Recebe o Email
*/
