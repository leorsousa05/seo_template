<?php
require_once("src/config/imports.php");

// Enquanto estiver desenvolvendo, coloque no APP_ENV que seja igual a `true`
// Quando estiver em produção, coloque `false`
$isDev = true;

$uri = $_SERVER["REQUEST_URI"];
$websiteTitle          = "";
$websiteName           = "";
$websiteDescription    = "";
$websiteKeywords       = "";
$websiteAuthor         = "";
$websiteUrl            = $_SERVER["SERVER_NAME"];
$gtm = "";
$geoRegion = "BR-SP";
$geoPosition = "";
$classification = "";
$icbm = "";
$indexPage = false;
$showCredits = true;
$creditsAuthor = "Digitall Evolution";
$creditsUrl = "https://digitallevolution.com.br/";
$creditsClientName = "";
$redirectHomePage = false;
$homePageRedirectTo = "";

// Website StyleSheets, scripts, font e image preload.
$websiteStylesheets = [];
$websiteScripts = [];
$websiteFonts = [
	new Font("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap", FontCDNImporter::GOOGLE),
];
$imagePreload = [];

if ($isDev) {
	$websiteScripts[] = new AssetsImports("http://localhost:5173/@vite/client", DefaultAssetsImports::CRITICAL);
	$websiteScripts[] = new AssetsImports("http://localhost:5173/assets/js/main.js", DefaultAssetsImports::CRITICAL);
} else {
	$manifestPath = 'dist/.vite/manifest.json';
	$manifest = json_decode(file_get_contents($manifestPath), true);
	$mainJs = $manifest['assets/js/main.js']['file'];
	$mainCss = $manifest['assets/scss/main.scss']['file'];
	$websiteScripts[] = new AssetsImports("/dist/" . $mainJs, DefaultAssetsImports::CRITICAL);
	$websiteStylesheets[] = new AssetsImports("/dist/" . $mainCss, DefaultAssetsImports::CRITICAL);
}
