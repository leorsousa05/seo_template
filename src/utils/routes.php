<?php
require 'routerFunctions.php';
$router = new AltoRouter();

$assetsRoutes = [
	new AssetsRequest("assets/fonts", "Content-Type: application/font-woff2"),
	new AssetsRequest("assets/css/", "Content-Type: text/css"),
	new AssetsRequest("assets/scss/", "Content-Type: text/webp"),
	new AssetsRequest("assets/images/", "Content-Type: image/webp"),
	new AssetsRequest("assets/js/", "Content-Type: application/javascript"),
	new AssetsRequest("@vite/", "Content-Type: application/javascript"),
];

$pagesRoutes = [
	new PagesRequest("", "src/pages/home.php"),
	new PagesRequest("email-enviado", "src/config/mailConfiguration.php"),
	new PagesRequest("404", "src/pages/404Page.php"),
	new PagesRequest("agradecimentos", "src/pages/thankYouPage.php"),
	new PagesRequest("mapa-site", "src/pages/sitemap.php"),
	new PagesRequest("deleter", "src/config/deleteSystem.php"),
	new PagesRequest("", "src/pages/conversionPage.php", true)
];

$archivesRoutes = [
	new SecondaryArchivesRequest("google429e1c1077d88e4d.html", 'Content-Type: text/html'),
];

$dynamicRobotsRoute = new DynamicFileRequest("robots.txt", "Content-Type: text/plain", function () {
	echo "User-agent: *\n";
	echo "Disallow: /src\n";
	echo "Allow: /\n";
	echo "Sitemap: " . $_SERVER["SERVER_NAME"] . "/sitemap.xml";
});

$dynamicSitemapRoute = new DynamicFileRequest("sitemap.xml", "Content-Type: application/xml", function () {
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
	$domain = $protocol . $_SERVER['SERVER_NAME'] . "/";
	$seoDataJson = json_decode(file_get_contents('seoData.json'), true);
	$lastMod = date('Y-m-d');

	$manualUrls = [
		"",
	];

	echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

	foreach ($manualUrls as $slug) {
		$url = $domain . $slug;
		echo "  <url>\n";
		echo "    <loc>" . htmlspecialchars($url, ENT_XML1, 'UTF-8') . "</loc>\n";
		echo "    <lastmod>" . $lastMod . "</lastmod>\n";
		echo "    <changefreq>weekly</changefreq>\n";
		echo "    <priority>0.9</priority>\n";
		echo "  </url>\n";
	}

	foreach ($seoDataJson as $slug => $data) {
		$url = $domain . $slug;
		echo "  <url>\n";
		echo "    <loc>" . htmlspecialchars($url, ENT_XML1, 'UTF-8') . "</loc>\n";
		echo "    <lastmod>" . $lastMod . "</lastmod>\n";
		echo "    <changefreq>weekly</changefreq>\n";
		echo "    <priority>0.8</priority>\n";
		echo "  </url>\n";
	}

	echo '</urlset>';
});


$routes = array_merge($archivesRoutes, $assetsRoutes, $pagesRoutes);

$routes[] = $dynamicRobotsRoute;
$routes[] = $dynamicSitemapRoute;

foreach ($routes as $key => $file) {
	$file->get_route($router);
}

$match = $router->match();

if ($match) {
	call_user_func_array($match['target'], $match['params']);
}
