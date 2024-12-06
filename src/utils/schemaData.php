<?php
$logoLocation = IMAGE_FOLDER . "logo.webp";
$phoneNumber = "";
$address = "";
$city = "";
$state = "";
$cep  = "";
$country = "BR";
$language = "pt-BR";
$stars = '4.' . rand(1, 9);
$comments = rand(35, 52);

$schema = [
	"@context" => "https://schema.org",
	"@type" => "Organization",
	"name" => $websiteName ?: "Your Company Name", // Default to placeholder if empty
	"url" => "https://" . $websiteUrl,
	"description" => $websiteDescription ?: "Your company description",
	"keywords" => $websiteKeywords ?: "Your keywords",
	"author" => $websiteAuthor ?: "Your Company Author",
	"logo" => $logoLocation,
	"address" => [
		"@type" => "PostalAddress",
		"streetAddress" => $address,
		"addressLocality" => $city,
		"addressRegion" => $state,
		"postalCode" => $cep,
		"addressCountry" => $country
	],
	"geo" => [
		"@type" => "GeoCoordinates",
		"latitude" => explode(",", $geoPosition)[0] ?? null,
		"longitude" => explode(",", $geoPosition)[1] ?? null
	],
	"telephone" => $phoneNumber,
	"aggregateRating" => [
		"@type" => "AggregateRating",
		"ratingValue" => $stars,
		"reviewCount" => $comments
	],
	"sameAs" => [
		"https://facebook.com/yourcompany", // Add social media links
		"https://twitter.com/yourcompany",
		"https://linkedin.com/company/yourcompany"
	],
	"areaServed" => $geoRegion,
	"isicV4" => $classification ?: "Your ISIC classification"
];

echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . '</script>';
