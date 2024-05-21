<?php
$seoDataJson = $seoTextProvider->getSeoJsonArray()
?>

<section class="sitemap_links">

	<ul class="links-list">
		<?php foreach ($seoDataJson as $key => $data) { ?>
			<li><a href="/<?= $data["link"] ?>"><?= $data["first_title"] ?></a></li>
		<?php } ?>
	</ul>

</section>
