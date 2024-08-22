<!DOCTYPE html>
<html lang="pt-br">
<?php include 'src/components/head.php'; ?>
<?php
if ($redirectHomePage) {
	header("Location: " . $homePageRedirectTo);
}
?>

<body>
	<?php include 'src/components/header.php' ?>
	<main>
		<?php include 'src/components/hero.php' ?>
		<?php include 'src/components/contact.php' ?>
		<?php include 'src/components/services.php' ?>
	</main>
	<?php include 'src/components/footer.php' ?>
	<?php include 'src/utils/scripts.php' ?>
	<?php include 'src/utils/schemaData.php' ?>
</body>

</html>
