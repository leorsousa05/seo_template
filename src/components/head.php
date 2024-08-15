<?php
require_once('src/utils/websiteData.php');
require_once('src/utils/seoDataFunctions.php');

$isDinamicPage = !in_array($uri, NON_DINAMIC_PAGES);

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

	<?php foreach ($imagePreload as $key => $image) {
		echo "<link rel=\"preload\" href=\"$image\" as=\"image\">";
	}
	?>

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

	<?php foreach ($websiteStylesheets as $key => $stylesheet) {
		switch ($stylesheet->getType()) {
			case DefaultAssetsImports::CRITICAL:
				echo "<link rel=\"stylesheet\" href=\"" . $stylesheet->getUrl() . "\">";
				break;
			case DefaultAssetsImports::NONCRITICAL:
				echo "
        <link rel=\"stylesheet\" href=\"" . $stylesheet->getUrl() . "\" media=\"print\" onload=\"this.media='all'\">
        <noscript>
            <link rel=\"stylesheet\" href=\"" . $stylesheet->getUrl() . "\">
        </noscript>";
		}
	?>
	<?php } ?>

	<?php if ($gtm) : ?>
		<script>
			(function(w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({
					'gtm.start': new Date().getTime(),
					event: 'gtm.js'
				});
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != 'dataLayer' ? '&l=' + l : '';
				j.async = true;
				j.src =
					'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, 'script', 'dataLayer', 'GTM-<?= $gtm ?>');
		</script>
	<?php endif ?>
</head>
