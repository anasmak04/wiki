<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogy - Hey, we’re Blogy. See our thoughts, stories and ideas.</title>
    <meta name="title" content="Blogy - Hey, we’re Blogy. See our thoughts, stories and ideas.">
    <meta name="description" content="This is a blog html template made by codewithsadee">
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="/wiki/public/css/home.css">
    <link rel="stylesheet" href="/wiki/public/css/style3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
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


    <div class="search-bar" data-search-bar>

        <div class="input-wrapper">
            <input type="search" name="search" placeholder="Search" class="input-field">

            <button class="search-close-btn" aria-label="close search bar" data-search-toggler>
                <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
            </button>

        </div>

        <p class="search-bar-text">Please enter at least 3 characters</p>

    </div>

    <div class="overlay" data-overlay data-search-toggler></div>


    <main>
        <article>

            <section class="section hero" aria-label="home">
                <div class="container">

                    <h1 class="h1 hero-title">

                        👋Welcome back <?= $_SESSION["username"]; ?> !
                    </h1>
                </div>
            </section>


            <a href="index" class="add-wiki-link">Add New Wiki</a>

            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search for a wiki..." />
                <div id="searchResults"></div>
            </div>


            <section class="section featured" aria-label="featured post">
                <div class="container container1">
                    <?php foreach ($wikis as $wiki) : ?>
                        <p class="section-subtitle">
                            Get started with our <strong class="strong">best stories</strong>
                        </p>

                        <div class="blog-card">
                            <figure class="card-banner img-holder" style="--width: 500; --height: 600;">
                                <img src="<?php echo $wiki->image; ?>" width="500" height="600" loading="lazy" alt="New technology is not good or evil in and of itself" class="img-cover">
                                <ul class="avatar-list absolute">
                                    <li class="avatar-item">
                                        <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                            <img src="./assets/images/author-1.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                        </a>
                                    </li>
                                    <li class="avatar-item">
                                        <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                            <img src="./assets/images/author-2.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                        </a>
                                    </li>
                                </ul>
                            </figure>

                            <div class="card-content">
                                <ul class="card-meta-list">
                                    <li>
                                        <a href="#" class="card-tag">Design</a>
                                    </li>
                                    <li>
                                        <a href="#" class="card-tag">Idea</a>
                                    </li>
                                    <li>
                                        <a href="#" class="card-tag">Review</a>
                                    </li>
                                </ul>

                                <h3 class="h4">
                                    <a href="#" class="card-title hover:underline">
                                        <?php echo $wiki->title; ?>
                                    </a>

                                    <a href="#" class="card-title hover:underline">
                                        <?php echo $wiki->id; ?>
                                    </a>
                                </h3>

                                <p class="card-text">
                                    <?php echo $wiki->content; ?>
                                </p>


                                <?php

                                if ($_SESSION["role"] == 1) {
                                ?>
                                    <form action="archiver" method="POST">
                                        <input type="hidden" name="id" value="<?= $wiki->id ?>">
                                        <button type="submit">Archiver</button>
                                    </form>
                                <?php
                                }
                                ?>


                                <?php
                                if ($_SESSION["userId"] == $wiki->author_id) {
                                ?>

                                    <form action="wdelete" method="POST">
                                        <input type="hidden" name="id" value="<?= $wiki->id ?>">
                                        <button type="submit">delete</button>
                                    </form>

                                    <form action="update" method="GET">
                                        <input type="hidden" name="id" value="<?= $wiki->id ?>">
                                        <button>edit</button>
                                    </form>


                                <?php
                                }
                                ?>




                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>


            <section class="section newsletter">

                <h5 class="h2 section-title">
                    Subscribe to new posts
                </h5>

                <form action="" class="newsletter-form">
                    <input type="email" name="email_address" placeholder="Your email address" required class="email-field">

                    <button type="submit" class="btn">Subscribe</button>
                </form>

            </section>

        </article>
    </main>

    <footer class="footer">
        <div class="container">

            <div class="footer-top section">

                <div class="footer-brand">

                    <a href="#" class="logo">
                        <img src="/wiki/public/assets/logo.svg" width="129" height="40" alt="Blogy logo">
                    </a>

                    <p class="footer-text">
                        A minimal, functional theme for running a paid-membership publication on Ghost.
                    </p>

                </div>

                <ul class="footer-list">

                    <li>
                        <p class="h5">Social</p>
                    </li>

                    <li class="footer-list-item">
                        <ion-icon name="logo-facebook"></ion-icon>

                        <a href="#" class="footer-link hover:underline">Facebook</a>
                    </li>

                    <li class="footer-list-item">
                        <ion-icon name="logo-twitter"></ion-icon>

                        <a href="#" class="footer-link hover:underline">Twitter</a>
                    </li>

                    <li class="footer-list-item">
                        <ion-icon name="logo-pinterest"></ion-icon>

                        <a href="#" class="footer-link hover:underline">Pinterest</a>
                    </li>

                    <li class="footer-list-item">
                        <ion-icon name="logo-vimeo"></ion-icon>

                        <a href="#" class="footer-link hover:underline">Vimeo</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="h5">About</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Style Guide</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Features</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Contact</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">404</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Privacy Policy</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="h5">Features</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Upcoming Events</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Blog & News</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Features</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">FAQ Question</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Testimonial</a>
                    </li>

                </ul>

                <ul class="footer-list">

                    <li>
                        <p class="h5">Membership</p>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Account</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Membership</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Subscribe</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Tags</a>
                    </li>

                    <li>
                        <a href="#" class="footer-link hover:underline">Authors</a>
                    </li>

                </ul>

            </div>

            <div class="section footer-bottom">

                <p class="copyright">
                    &copy; Blogy 2022. Published by <a href="#" class="copyright-link hover:underline">codewithsadee</a>.
                </p>

            </div>

        </div>
    </footer>


    <script src="/wiki/public/js/script.js" defer></script>
    <script src="/wiki/public/js/search.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>