<?php
require_once('src/utils/websiteData.php');
require_once('src/utils/seoDataFunctions.php');

$nonDinamicPages = array_map(function ($page) {
	return WEBSITE_FOLDER . $page;
}, NON_DINAMIC_PAGES);
$isDinamicPage = !in_array($uri, $nonDinamicPages);

$seoTextProvider = new SeoTextProvider($uri);
$seoRouteData = $seoTextProvider->getCurrentRouteSeoContent();
$seoDataJson = $seoTextProvider->getSeoJsonArray();

if ($isDinamicPage && is_null($seoTextProvider->getCurrentRouteSeoContent())) {
	echo "<script type=\"text/javascript\">
		window.location = \"" . WEBSITE_FOLDER . "404\"
			   </script>";
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
		<title><?= $seoRouteData["title"] ?></title>
	<?php } else { ?>
		<meta name="description" content="<?= $websiteDescription ?>">
		<meta property="og:description" content="<?= $websiteDescription ?>">
		<meta property="og:title" content="<?= $websiteTitle ?>" />
		<title><?= $websiteTitle ?></title>
	<?php } ?>

	<?php if (isset($geoRegion)) { ?>
		<meta name="geo.region" content="<?= $geoRegion ?>" />
	<?php } ?>
	<?php if (isset($geoPosition)) { ?>
		<meta name="geo.position" content="<?= $geoPosition ?>" />
	<?php } ?>
	<?php if (isset($classification)) { ?>
		<meta name="ICBM" content="<?= $classification ?>" />
	<?php } ?>
	<?php if (isset($classification)) { ?>
		<meta name="classification" content="<?= $classification ?>" />
	<?php } ?>
	<?php if (isset($websiteKeywords)) { ?>
		<meta name="keywords" content="<?= $websiteKeywords ?>">
	<?php } ?>
	<?php if (isset($websiteAuthor)) { ?>
		<meta name="author" content="<?= $websiteAuthor ?>">
	<?php } ?>
	<?php if ($indexPage) { ?>
		<meta name="robots" content="index,follow">
	<?php } ?>
	<?php if (!$indexPage) { ?>
		<meta name="robots" content="noindex, nofollow">
	<?php } ?>
	<?php if ($websiteAuthor) { ?>
		<meta property="publisher" content="<?= $websiteAuthor ?>" />
		<meta property="og:author" content="<?= $websiteAuthor ?>" />
	<?php } ?>
	<?php if ($websiteUrl) { ?>
		<meta property="og:url" content="<?= $websiteUrl ?><?= $uri ?>" />
		<link rel="canonical" href="<?= $websiteUrl ?><?= $uri ?>" />
	<?php } ?>
	<?php if ($websiteName) { ?>
		<meta property="og:site_name" content="<?= $websiteName ?>" />
	<?php } ?>
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="pt_BR" />
	<meta property="og:region" content="Brasil" />
	<link rel="icon" type="image/x-icon" href="<?= IMAGE_FOLDER ?>/logo.webp">

	<?php foreach ($websiteStylesheets as $key => $stylesheet) {
		switch ($stylesheet->getType()) {
			case DefaultAssetsImports::CRITICAL:
				echo "<link rel=\"stylesheet\" href=\"" . $stylesheet->getUrl() . "\">";
				break;
			case DefaultAssetsImports::NONCRITICAL:
				echo "
        <link fetchPriority='high' rel=\"stylesheet\" href=\"" . $stylesheet->getUrl() . "\" media=\"print\" onload=\"this.media='all'\">
        <noscript>
            <link rel=\"stylesheet\" href=\"" . $stylesheet->getUrl() . "\">
        </noscript>";
		}
	?>
	<?php } ?>

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

		<link fetchPriority='high' href="<?= $font->getUrl() ?>" rel="stylesheet" media="print" onload="this.media='all'">
		<noscript>
			<link href="<?= $font->getUrl() ?>" rel="stylesheet">
		</noscript>
	<?php } ?>



	<?php foreach ($imagePreload as $key => $image) {
		echo "<link rel=\"preload\" href=\"$image\" as=\"image\">";
	}
	?>


	<?php if ($gtm) : ?>
		<script>
			function loadGTM() {
				window.dataLayer = window.dataLayer || [];
				window.dataLayer.push({
					'gtm.start': new Date().getTime(),
					event: 'gtm.js'
				});
				var gtmScript = document.createElement('script');
				gtmScript.async = true;
				gtmScript.src = 'https://www.googletagmanager.com/gtm.js?id=GTM-<?= $gtm ?>';
				document.getElementsByTagName('head')[0].appendChild(gtmScript);
			}

			function checkUserActivity() {
				document.removeEventListener('mousemove', checkUserActivity);
				document.removeEventListener('keydown', checkUserActivity);
				document.removeEventListener('scroll', checkUserActivity);
				loadGTM();
			}

			document.addEventListener('mousemove', checkUserActivity, {
				once: true
			});
			document.addEventListener('keydown', checkUserActivity, {
				once: true
			});
			document.addEventListener('scroll', checkUserActivity, {
				once: true
			});
		</script>
	<?php endif ?>
</head>
