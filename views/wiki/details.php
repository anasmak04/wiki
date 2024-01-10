<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/wiki/public/css/details.css">
    <link rel="stylesheet" href="/wiki/public/css/home.css">
    <link rel="stylesheet" href="/wiki/public/css/style3.css">

    <title>Document</title>
</head>

<body>


    <header class="header section" data-header>
        <div class="container container2">

            <a href="#" class="logo">
                <img src="/wiki/public/assets/logo.svg" width="129" height="40" alt="Blogy logo">
            </a>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">

                    <li class="navbar-item">
                        <a href="#" class="navbar-link hover:underline" data-nav-link>Home</a>
                    </li>

                    <li class="navbar-item">
                        <a href="#" class="navbar-link hover:underline" data-nav-link>Recent Post</a>
                    </li>


                </ul>
            </nav>

            <div class="wrapper">


                <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
                    <span class="span one"></span>
                    <span class="span two"></span>
                    <span class="span three"></span>
                </button>



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
            </div>

        </div>
    </header>


    <div class="container container-contact bootstrap snippets bootdeys bootdey">
        <?php if ($wiki) : ?>
            <div class="row decor-default">
                <div class="col-md-12">
                    <div class="contact">
                        <div class="controls">
                            <span class="icon icon-folder" data-toggle="tooltip" data-placement="top" title="" data-original-title="Archive"></span>
                            <span class="icon icon-delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></span>
                            <span class="icon icon-close" data-toggle="tooltip" data-placement="top" title="" data-original-title="Close"></span>
                            <img src="<?= $wiki->image ?>" alt="cover" class="cover">


                        </div>



                        <div class="row">
                            <div class="col-md-4 col-md-5 col-xs-12">
                                <div class="row">
                                    <div class="col-xs-3">
                                        Email:
                                    </div>
                                    <div class="col-xs-9">
                                        <?= $wiki->user_email; ?>
                                    </div>
                                    <div class="col-xs-3">
                                        name:
                                    </div>
                                    <div class="col-xs-9">
                                        <?= $wiki->user_name; ?>
                                    </div>
                                    <div class="col-xs-3">
                                        Address:
                                    </div>
                                    <div class="col-xs-9">
                                        Sacramento, CA
                                    </div>
                                    <div class="col-xs-3">
                                        Birthday:
                                    </div>
                                    <div class="col-xs-9">
                                        1975/8/17
                                    </div>
                                    <div class="col-xs-3">
                                        URL:
                                    </div>
                                    <div class="col-xs-9">
                                        http://yourdomain.com
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-xs-12">
                                <p class="contact-description"><?= $wiki->content ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>