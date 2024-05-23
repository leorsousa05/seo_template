<section class="sitemap_links">

	<ul class="links-list">
		<?php foreach ($seoDataJson as $data) { ?>
			<li><a href="/<?= $data["link"] ?>"><?= $data["title"] ?></a></li>
		<?php } ?>
	</ul>

</section>
