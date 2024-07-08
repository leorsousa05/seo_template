<?php foreach ($criticalWebsiteScripts as $key => $scripts) { ?>
	<script src="<?= $scripts ?>" async></script>
<?php } ?>

<?php foreach ($nonImportantWebsiteScripts as $key => $scripts) { ?>
	<script src="<?= $scripts ?>" defer></script>
<?php } ?>
