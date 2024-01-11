<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/wiki/public/css/style.css">
</head>

<body>

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="login" method="POST" class="form">
                    <div class="input-field">
                        <input type="email" placeholder="Enter your email" name="email" required id="email">
                    </div>
                    <span class="" id="emailError">email is not valid</span>
                    <div class="input-field">
                        <input type="password" placeholder="Enter your password" name="password" required id="password">
                    </div>
                    <button type="submit" name="submitLogin" class="btn">login</button>
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
                    <a style="padding: 10px; text-decoration:none;" href="http://localhost/wiki/register" class="btn transparent" id="sign-up-btn">
                        register
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- <script>
        const form = document.querySelector("form");
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const emailValue = document.getElementById("email").value.trim();
            const emailError = document.getElementById("emailError");
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            emailError.style.display = !emailValue.match(emailRegex) ? "block" : "none";
        });
    </script> -->


    <script src="/wiki/public/js/script.js"></script>

</body>

</html>