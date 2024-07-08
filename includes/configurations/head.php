<?php
require("includes/configurations/utils/fontImport.php");
require 'websiteData.php';
require 'seoDataFunctions.php';

$uri = $_SERVER["REQUEST_URI"];
$nonDinamicPages = ["/", "/404", "/mapa-site"];
$isDinamicPage = !in_array($uri, $nonDinamicPages);

$seoTextProvider = new SeoTextProvider($uri);
$seoRouteData = $seoTextProvider->getCurrentRouteSeoContent();
$seoDataJson = $seoTextProvider->getSeoJsonArray();

if ($isDinamicPage && is_null($seoTextProvider->getCurrentRouteSeoContent())) {
	echo '<script type="text/javascript">
		window.location = "/404"
			   </script>';
}

if ($showCredits) {
	echo "
  <!--
  Site desenvolvido por $creditsAuthor
  $creditsUrl
  Cliente: $creditsClientName
 -->";
}

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php if ($isDinamicPage) { ?>
		<meta name="description" content="<?= $seoRouteData["description"] ?>">
		<meta property="og:description" content="<?= $seoRouteData["description"] ?>">
		<meta property="og:title" content="<?= $seoRouteData["title"] ?>" />
		<title><?= $seoRouteData["first_title"] ?></title>
	<?php } else { ?>
		<meta name="description" content="<?= $websiteDescription ?>">
		<meta property="og:description" content="<?= $websiteDescription ?>">
		<meta property="og:title" content="<?= $websiteTitle ?>" />
		<title><?= $websiteTitle ?></title>
	<?php } ?>

	<meta name="geo.region" content="<?= $geoRegion ?>" />
	<meta name="geo.position" content="<?= $geoPosition ?>" />
	<meta name="ICBM" content="<?= $classification ?>" />
	<meta name="classification" content="<?= $classification ?>" />
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

	<?php foreach ($websiteFonts as $key => $font) { ?>
		<?php switch ($font->getType()) {
			case FontCDNImporter::GOOGLE:
				echo "<link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">";
				echo "<link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>";
				break;
			case FontCDNImporter::CDNFONTS:
				echo "<link rel=\"preconnect\" href=\"https://fonts.cdnfonts.com\" crossorigin>";
				break;
		}
		?>

		<link href="<?= $font->getUrl() ?>" rel="stylesheet" media="print" onload="this.media='all'">
		<noscript>
			<link href="<?= $font->getUrl() ?>" rel="stylesheet">
		</noscript>
	<?php } ?>

	<?php foreach ($nonImportantwebsiteStylesheets as $key => $stylesheets) { ?>
		<link rel="stylesheet" href="<?= $stylesheets ?>" media="print" onload="this.media='all'">
		<noscript>
			<link rel="stylesheet" href="<?= $stylesheets ?>">
		</noscript>
	<?php } ?>

	<?php foreach ($criticalWebsiteStylesheets as $key => $stylesheets) { ?>
		<link rel="stylesheet" href="<?= $stylesheets ?>">
	<?php } ?>

</head>
