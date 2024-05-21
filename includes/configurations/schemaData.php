<?php

$url = "";
$description = "";
$logoLocation = "";
$phoneNumber = "";
$websiteName = "";
$address = "";

?>


<script type="application/ld+json">
	{
		"@context": "http://schema.org",
		"@type": "Organization",
		"url": "<?= $url ?>",
		"logo": "<?= $logoLocation ?>",
		"description": "<?= $description ?>",
		"contactPoint": [{
			"@type": "ContactPoint",
			"telephone": "+55<?= $phoneNumber ?>",
			"contactType": "customer service"
		}],

		"location": {
			"@type": "Place",
			"name": "<?= $websiteName ?>",
			"address": "<?= $address ?>"
		}

	}
</script>
