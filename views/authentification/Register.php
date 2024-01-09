<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/wiki/public/css/style.css">
</head>

<style></style>

<body>

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="register" method="POST" class="form" enctype="multipart/form-data">
                   
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" name="name" required id="name">
                    </div>
                    <span class="" id="nameError">name is not valid</span>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your username" name="username" required id="username">
                    </div>
                    <span class="" id="usernameError">username is not valid</span>
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" name="email" required id="email">
                    </div>
                    <span class="" id="emailError">email is not valid</span>
                    <div class="input-field">
                        <input type="password" placeholder="Enter your password" name="password" required id="password">
                    </div>

                     <div class="input-field">
                        <input type="file" placeholder="Enter your image" name="image" required id="name">
                    </div>
                    <button type="submit" name="submitRegister" class="btn">register</button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Welcome to the agency store</h3>
                    <p>
                        SPECIALIZES IN THE CREATION OF WEBSITES & APPLICATIONS, DIGITAL MARKETING, CONSULTING, EVENTS, PRODUCTION OF ADVERTISING VIDEOS, GRAPHIC DESIGN, 3D ANIMATION.


                    </p>
                    <a style="padding: 10px; text-decoration:none;" href="http://localhost/wiki/login" class="btn transparent" id="sign-up-btn">
                        Login
                    </a>
                </div>
            </div>

        </div>
    </div>



    <!-- <script>
        const form = document.querySelector("form");
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const nameValue = document.getElementById("name").value.trim();
            const usernameValue = document.getElementById("username").value.trim();
            const emailValue = document.getElementById("email").value.trim();
            const nameError = document.getElementById("nameError");
            const usernameError = document.getElementById("usernameError");
            const emailError = document.getElementById("emailError");
            const nameRegex = /^[a-zA-Z ]+$/;
            const usernameRegex = /^[a-zA-Z0-9]+$/;
            nameError.style.display = !nameValue.match(nameRegex) ? "block" : "none";
            emailError.style.display = !emailValue.match(emailRegex) ? "block" : "none";
        });
    </script> -->

</body>

</html>