<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container">
            <img src="/wiki/public/assets/logo.svg" class="navbar-brand" href="#!"></img>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>

                    <?php
                    if ($_SESSION["role"] !== 2 && $_SESSION["role"] !== 1) { ?>
                        <a href="#" class="btn">Join</a>
                    <?php } ?>



                    <?php
                    if ($_SESSION["role"] == 2 || $_SESSION["role"] == 1) { ?>
                        <div class="avatar-dropdown">
                            <img style="width:50px;" src="<?php echo $_SESSION["image"]; ?>" alt="" class="avatar">
                            <ul class="dropdown-menu">
                                <li> <a href="http://localhost/wiki/profile"> view profile</a>
                                </li>


                                <li> <a href="http://localhost/wiki/logout" class="">Logout</a>
                                </li>
                            </ul>
                        </div> <?php
                            }
                                ?>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>