import "../scss/main.scss";
import $ from "jquery";

const burgerBtn = document.querySelector("#burger_menu");
const typebotBtn = document.querySelectorAll(".typebtn");
const navMenu = document.querySelector("#nav_menu");
const form = $("form");

burgerBtn.addEventListener("click", function() {
	this.classList.toggle("active");
	navMenu.classList.toggle("active");
});

console.log(form);


typebotBtn.forEach(node => node.addEventListener("click", function() {
	Typebot.open();
}))
