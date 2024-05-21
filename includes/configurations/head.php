<?php
require 'websiteData.php';
require 'seoDataFunctions.php';

$uri = $_SERVER["REQUEST_URI"];

$isDinamicPage = $uri !== "/" && $uri !== "/404" && $uri !== "/mapa-site";
$seoTextProvider = new SeoTextProvider($uri);

$seoRouteData = $seoTextProvider->getCurrentRouteSeoContent();

if ($isDinamicPage) {
	if (!isset($seoTextProvider->getCurrentRouteSeoContent())) {
		echo '<script type="text/javascript">
            window.location = "/404"
               </script>';
	}
}

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if ($isDinamicPage) { ?>
		<meta name="description" content="<?= $seoRouteData["description"] ?>">
		<meta property="og:description" content="<?= $seoRouteData["description"] ?>">
		<meta property="og:title" content="<?= $seoRouteData["first_title"] ?>" />
		<title><?= $seoRouteData["first_title"] ?></title>
	<?php } else { ?>
		<meta name="description" content="<?= $websiteDescription ?>">
		<meta property="og:description" content="<?= $websiteDescription ?>">
		<meta property="og:title" content="<?= $websiteTitle ?>" />
		<title><?= $website_title ?></title>
	<?php } ?>
	<meta name="description" content="<?= $websiteDescription ?>">
	<meta name="keywords" content="<?= $websiteKeywords ?>">
	<meta name="author" content="<?= $websiteAuthor ?>">
	<meta name="robots" content="index,follow">
	<meta property="publisher" content="<?= $websiteAuthor ?>" />
	<meta property="og:url" content="<?= $websiteUrl ?><?= $uri ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:region" content="Brasil" />
	<meta property="og:author" content="<?= $websiteAuthor ?>" />
	<meta property="og:site_name" content="<?= $websiteName ?>" />
	<link rel="canonical" href="<?= $websiteUrl ?><?= $uri ?>" />
	<base href="/">
	<title><?= $websiteTitle ?></title>
	<?php foreach ($websiteStylesheets as $key => $stylesheets) { ?>
		<link rel="stylesheet" href="<?= $stylesheets ?>">
	<?php } ?>

</head>
