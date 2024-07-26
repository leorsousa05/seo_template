<?php
$seoDataJson = json_decode(file_get_contents('seoData.json'), true);
?>

<section class="sitemap">
	<div class="sitemap__container">
		<ul class="sitemap__container__links">
			<?php foreach (array_keys($seoDataJson) as $data) { ?>
				<li class="sitemap__container__links__link"><a href="<?= WEBSITE_FOLDER ?><?= $data ?>"><?= $seoDataJson[$data]['title'] ?></a></li>
			<?php } ?>
		</ul>
	</div>
</section>
