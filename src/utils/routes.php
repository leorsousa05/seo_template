<?php
require 'routerFunctions.php';
$router = new AltoRouter();


$assetsRoutes = [
	// Adicionar aqui Rotas da mesma forma como está abaixo
	// Colocar o path do arquivo apenas, não colocar o nome do arquivo.
	// exemplo: /assets/ e não /assets/main.js
	new AssetsRequest("/assets/fonts", "Content-Type: application/font-woff2"),
	new AssetsRequest("/assets/css/", "Content-Type: text/css"),
	new AssetsRequest("/assets/images/", "Content-Type: image/webp"),
	new AssetsRequest("/assets/js/", "Content-Type: text/javascript"),
];

$pagesRoutes = [
	// Colocar aqui rotas de páginas.
	// Primeiro o Path e depois passar o page_path
	// Caso seja rotas dinamicas como páginas de SEO
	// colocar no parametro da função is_dinamic: true
	// coloque sempre páginas dinamicas no final da array
	new PagesRequest("/", "src/pages/home.php"),
	new PagesRequest("/email-enviado", "src/config/mailConfiguration.php"),
	new PagesRequest("/404", "src/pages/404Page.php"),
	new PagesRequest("/agradecimentos", "src/pages/thankYouPage.php"),
	new PagesRequest("/mapa-site", "src/pages/sitemap.php"),
	new PagesRequest("/", "src/pages/conversionPage.php", true)
];

$archivesRoutes = [
	// Aqui você coloca rotas de arquivos que não
	// se encaixe nem no assets e nem no modules
	// normalmente arquivos em que a gente especifica o nome
	// e não faz a requisição pelo website
	new SecondaryArchivesRequest("/google429e1c1077d88e4d.html", 'Content-Type: text/html'),
	new SecondaryArchivesRequest("/sitemap.xml", 'Content-Type: application/xml'),
	new SecondaryArchivesRequest('/robots.txt', 'Content-Type: text/plain')
];

$routes = array_merge($archivesRoutes, $assetsRoutes, $pagesRoutes);

foreach ($routes as $key => $file) {
	$file->get_route($router);
}

$match = $router->match();

if ($match) {
	call_user_func_array($match['target'], $match['params']);
}
