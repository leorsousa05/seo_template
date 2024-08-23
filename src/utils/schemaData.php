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

?>


<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Organization",
		"mainEntityOfPage": "<?= $websiteUrl ?>",
		"name": "<?= $websiteName ?>",
		"url": "<?= $websiteUrl ?>",
		"logo": "<?= $websiteUrl . IMAGE_FOLDER .  "logo.webp" ?>",
		"description": "<?= $websiteDescription ?>",
		"aggregateRating": {
			"@type": "AggregateRating",
			"ratingValue": "<?= $stars ?>",
			"reviewCount": "<?= $comments ?>"
		},
		"contactPoint": {
			"@type": "ContactPoint",
			"telephone": "<?= $phoneNumber ?>",
			"contactType": "Customer service"
		},
		"sameAs": [
			"https://www.facebook.com/DigitallEvolutionMarketing/",
			"https://www.linkedin.com/company/digitall-evolution/",
			"https://www.youtube.com/channel/UCINuoDTdzAZJczr4MocH8SA",
			"https://www.instagram.com/digitallevolutionmarketing/"
		],
		"address": {
			"@type": "PostalAddress",
			"streetAddress": "<?= $address ?>",
			"addressLocality": "<?= $city . "/" . $state ?>",
			"addressRegion": "$city",
			"postalCode": "CEP: <?= $cep ?>",
			"addressCountry": "<?= $country ?>"
		}
	}, {
		"thumbnailUrl": "<?= $websiteUrl . IMAGE_FOLDER . "logo-data.webp" ?>",
		"description": "<?= $websiteDescription ?>",
		"inLanguage": "<?= $language ?>",
		"potentialAction": [{
			"@type": "ReadAction",
			"target": [
				"<?= $websiteUrl ?>"
			]
		}]
	}, {
		"@type": "ImageObject",
		"inLanguage": "<?= $language ?>",
		"@id": "<?= $websiteUrl ?>",
		"url": "<?= $websiteUrl . IMAGE_FOLDER . "logo-data.webp" ?>",
		"contentUrl": "<?= $websiteUrl . IMAGE_FOLDER . "logo-data.webp" ?>",
		"width": 768,
		"height": 768,
		"caption": "Logo <?= $websiteName ?>"
	}
</script>
