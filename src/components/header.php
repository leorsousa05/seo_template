<header class="bg-white shadow-lg w-full top-0 left-0 z-50">
	<div class="container mx-auto flex items-center justify-between px-6 py-4">

		<!-- Logo -->
		<a href="#" class="flex items-center">
			<img src="https://public.bnbstatic.com/20190405/eb2349c3-b2f8-4a93-a286-8f86a62ea9d8.png" width="100" height="100" alt="example logo">
		</a>

		<!-- Navigation Menu (Desktop) -->
		<ul class="hidden md:flex space-x-6 text-gray-800" id="nav_menu">
			<li><a href="#" class="hover:text-blue-600 transition">Home</a></li>
			<li><a href="#services" class="hover:text-blue-600 transition">Serviços</a></li>
			<li><a href="#about" class="hover:text-blue-600 transition">Sobre Nós</a></li>
			<li><a href="#contact" class="hover:text-blue-600 transition">Contato</a></li>
		</ul>

		<!-- Burger Menu for Mobile -->
		<div class="md:hidden cursor-pointer z-50" id="burger_menu" onclick="toggleMenu()">
			<div id="line1" class="w-6 h-0.5 bg-gray-800 mb-1 transition-all duration-300 transform origin-center"></div>
			<div id="line2" class="w-6 h-0.5 bg-gray-800 mb-1 transition-all duration-300 transform origin-center"></div>
			<div id="line3" class="w-6 h-0.5 bg-gray-800 transition-all duration-300 transform origin-center"></div>
		</div>
	</div>

	<!-- Fullscreen Mobile Navigation Menu (Hidden by default) -->
	<div class="fixed inset-0 bg-gray-900 bg-opacity-90 flex-col items-center justify-center text-gray-100 text-xl space-y-8 transform scale-0 transition-transform duration-300 ease-in-out hidden" id="mobile_menu">
		<a href="#" class="hover:text-blue-400 transition">Home</a>
		<a href="#services" class="hover:text-blue-400 transition">Serviços</a>
		<a href="#about" class="hover:text-blue-400 transition">Sobre Nós</a>
		<a href="#contact" class="hover:text-blue-400 transition">Contato</a>
	</div>
</header>

<script>
	function toggleMenu() {
		const mobileMenu = document.getElementById('mobile_menu');
		const line1 = document.getElementById('line1');
		const line2 = document.getElementById('line2');
		const line3 = document.getElementById('line3');

		// Toggle visibility class
		mobileMenu.classList.toggle('scale-0');
		mobileMenu.classList.toggle('hidden');
		mobileMenu.classList.toggle('flex');

		if (!mobileMenu.classList.contains('hidden')) {
			line1.classList.add('rotate-45', 'translate-y-1.5', 'bg-white');
			line2.classList.add('opacity-0');
			line3.classList.add('-rotate-45', '-translate-y-1.5', 'bg-white');
		} else {
			line1.classList.remove('rotate-45', 'translate-y-1.5', 'bg-white');
			line2.classList.remove('opacity-0');
			line3.classList.remove('-rotate-45', '-translate-y-1.5', 'bg-white');
		}
	}
</script>
