//// validations des formulaires register est login

const form = document.querySelector("form");
console.log("hello");
const namee = document.getElementById("name").value;
const username = document.getElementById("username").value;
const email = document.getElementById("email").value;
const nameError = document.getElementById("#nameError");
const usernameError = document.getElementById("#usernameError");
const emailError = document.getElementById("#emailError");

nameRegex = "/^[a-zA-Z ]+$/";
emailRegex = "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,}$";

form.addEventListener("submit", (e) => {
  e.preventDefault();
  nameError.style.display = !namee.matches(nameRegex) ? "block" : "none";
  usernameError.style.display = !username.matches(nameRegex) ? "block" : "none";
  emailError.style.display = !email.matches(emailRegex) ? "block" : "none";
});

("use strict");

/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
};

/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const navToggler = document.querySelector("[data-nav-toggler]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  this.classList.toggle("active");
};

addEventOnElem(navToggler, "click", toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  navToggler.classList.remove("active");
};

addEventOnElem(navbarLinks, "click", closeNavbar);

/**
 * search bar toggle
 */

const searchBar = document.querySelector("[data-search-bar]");
const searchTogglers = document.querySelectorAll("[data-search-toggler]");
const overlay = document.querySelector("[data-overlay]");

const toggleSearchBar = function () {
  searchBar.classList.toggle("active");
  overlay.classList.toggle("active");
  document.body.classList.toggle("active");
};

addEventOnElem(searchTogglers, "click", toggleSearchBar);
