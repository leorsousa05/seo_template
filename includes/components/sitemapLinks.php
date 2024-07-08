<?php
$seoDataJson = json_decode(file_get_contents('seoData.json'), true);
?>

<section class="sitemap-links">
	<div class="sitemap-links__container">
		<ul class="sitemap-links__container__links">
			<?php foreach (array_keys($seoDataJson) as $data) { ?>
				<li><a href="/<?= $data ?>"><?= $seoDataJson[$data]['title'] ?></a></li>
			<?php } ?>
		</ul>
	</div>
</section>
