//// validations des formulaires register est login

const form = document.querySelector("form");

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
    emailError.style.display = !email.matches(emailRegex) ? "block"  : "none";
});
