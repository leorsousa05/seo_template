<!DOCTYPE html>
<html lang="pt-br">
<?php include 'src/components/head.php'; ?>
<meta http-equiv="refresh" content="3; URL=<?= WEBSITE_FOLDER ?>">

<body class="bg-gray-50 flex items-center justify-center h-screen">

	<div class="text-center space-y-6">
		<h1 class="text-6xl font-extrabold text-gray-800">Erro 404</h1>
		<p class="text-gray-600 text-lg">A página que você está procurando não foi encontrada.</p>
		<p class="text-gray-500">Você será redirecionado em alguns segundos...</p>
		<a href="<?= WEBSITE_FOLDER ?>"
			class="inline-block mt-4 px-6 py-2 bg-gray-800 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-700 transition">
			Ir para a página inicial
		</a>
	</div>

	<?php include 'src/utils/scripts.php' ?>
</body>

</html>
