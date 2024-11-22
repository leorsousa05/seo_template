<?php
$seoDataJson = json_decode(file_get_contents('seoData.json'), true);
?>

<section>
	<div>
		<ul>
			<?php foreach (array_keys($seoDataJson) as $data) { ?>
				<li><a href="<?= WEBSITE_FOLDER ?><?= $data ?>"><?= $seoDataJson[$data]['title'] ?></a></li>
			<?php } ?>
		</ul>
	</div>
</section>
