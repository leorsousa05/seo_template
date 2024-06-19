const burgerBtn = document.querySelector("#burger_menu");
const navMenu = document.querySelector("#nav_menu");

burgerBtn.addEventListener("click", function() {
	this.classList.toggle("active");
	navMenu.classList.toggle("active");
});
