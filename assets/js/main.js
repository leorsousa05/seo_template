import "../scss/main.scss";

const burgerBtn = document.querySelector("#burger_menu");
const typebotBtn = document.querySelectorAll(".typebtn");
const navMenu = document.querySelector("#nav_menu");

burgerBtn.addEventListener("click", function() {
	this.classList.toggle("active");
	navMenu.classList.toggle("active");
});

typebotBtn.forEach(node => node.addEventListener("click", function() {
	Typebot.open();
}))
