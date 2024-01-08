<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wikis</title>
    <link rel="stylesheet" href="/wiki/public/css/wiki.css">
</head>

<body>
    <div class="container">
        <?php

        // use App\model\CategoryImp;
        // use App\model\UserImp;


        foreach ($wikis as $wiki) : ?>
            <div class="card">
                <p>ID Wiki: <?= $wiki->id ?></p>
                <img src="<?= $wiki->image ?>" alt="Image">
                <p>Title: <?= $wiki->title ?></p>
                <p>Content: <?= $wiki->content ?></p>
                <p>Time: <?= $wiki->created_at ?></p>
                <p>id user: <?= $wiki->author_id ?></p>
                <p>name user: <?= $wiki->Author ?></p>
                <p>name category: <?= $wiki->categoryName ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html> -->

<!-- <?php
        //$model = new UserImp();
        //$model2 = new CategoryImp();
        //$user = $model->findById($wiki->author_id);
        //category = $model2->findById($wiki->category_id);
        ?>
                <p>user : <?= $user->name; ?></p>
                <p>category : <?= $category->name; ?></p> -->

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">

</head>

<body>



    <header class="header section" data-header>
        <div class="container">

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

                    <li class="navbar-item">
                        <a href="#" class="navbar-link hover:underline" data-nav-link>Membership</a>
                    </li>

                </ul>
            </nav>

            <div class="wrapper">


                <button class="nav-toggle-btn" aria-label="toggle menu" data-nav-toggler>
                    <span class="span one"></span>
                    <span class="span two"></span>
                    <span class="span three"></span>
                </button>

                <a href="#" class="btn">Join</a>

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
                        Hey, we’re Blogy See our thoughts, stories and ideas.
                    </h1>

                    <div class="wrapper">

                        <form action="" class="newsletter-form">
                            <input type="email" name="email_address" placeholder="Your email address" class="email-field">

                            <button type="submit" class="btn">Subscribe</button>
                        </form>

                        <p class="newsletter-text">
                            Get the email newsletter and unlock access to members-only content and updates
                        </p>

                    </div>

                </div>
            </section>



     



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
                    </h3>

                    <p class="card-text">
                        <?php echo $wiki->content; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


            <!-- 
        - #RECENT POST
      -->
            <!-- 
            <section class="section recent" aria-label="recent post">
                <div class="container">

                    <div class="title-wrapper">

                        <h2 class="h2 section-title">
                            See what we’ve <strong class="strong">written lately</strong>
                        </h2>

                        <div class="top-author">
                            <ul class="avatar-list">

                                <li class="avatar-item">
                                    <a href="#" class="avatar large img-holder" style="--width: 100; --height: 100;">
                                        <img src="/wiki/public/assets/author-1.jpg" width="100" height="100" alt="top author" class="img-cover">
                                    </a>
                                </li>

                                <li class="avatar-item">
                                    <a href="#" class="avatar large img-holder" style="--width: 100; --height: 100;">
                                        <img src="/wiki/public/assets/author-2.jpg" width="100" height="100" alt="top author" class="img-cover">
                                    </a>
                                </li>

                                <li class="avatar-item">
                                    <a href="#" class="avatar large img-holder" style="--width: 100; --height: 100;">
                                        <img src="/wiki/public/assets/author-3.jpg" width="100" height="100" alt="top author" class="img-cover">
                                    </a>
                                </li>

                                <li class="avatar-item">
                                    <a href="#" class="avatar large img-holder" style="--width: 100; --height: 100;">
                                        <img src="/wiki/public/assets/author-4.jpg" width="100" height="100" alt="top author" class="img-cover">
                                    </a>
                                </li>

                                <li class="avatar-item">
                                    <a href="#" class="avatar large img-holder" style="--width: 100; --height: 100;">
                                        <img src="/wiki/public/assets/author-5.jpg" width="100" height="100" alt="top author" class="img-cover">
                                    </a>
                                </li>

                            </ul>

                            <span class="span">Meet our top authors</span>
                        </div>

                    </div>

                    <ul class="grid-list">

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
                                    <img src="/wiki/public/assets/recent-1.jpg" width="550" height="660" loading="lazy" alt="Creating is a privilege but it’s also a gift" class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-3.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src=/wiki/public/assets/author-5.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <ul class="card-meta-list">

                                        <li>
                                            <a href="#" class="card-tag">Lifestyle</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">People</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Review</a>
                                        </li>

                                    </ul>

                                    <h3 class="h4">
                                        <a href="#" class="card-title hover:underline">
                                            Creating is a privilege but it’s also a gift
                                        </a>
                                    </h3>

                                    <p class="card-text">
                                        Nullam vel lectus vel velit pellentesque dignissim nec id magna. Cras molestie ornare quam at
                                        semper. Proin a ipsum ex.
                                        Curabitur eu venenatis justo. Nullam felis augue, imperdiet at sodales a, sollicitudin nec risus.
                                    </p>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
                                    <img src="/wiki/public/assets/recent-2.jpg" width="550" height="660" loading="lazy" alt="Being unique is better than being perfect" class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-5.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
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
                                            <a href="#" class="card-tag">Product</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Idea</a>
                                        </li>

                                    </ul>

                                    <h3 class="h4">
                                        <a href="#" class="card-title hover:underline">
                                            Being unique is better than being perfect
                                        </a>
                                    </h3>

                                    <p class="card-text">
                                        Nam in pretium dui. Phasellus dapibus, mi at molestie cursus, neque eros aliquet nisi, non
                                        efficitur nisi est nec mi.
                                        Nullam semper, ligula a luctus ornare, leo turpis fermentum lectus, quis volutpat urna orci a
                                        lectus. Duis et odio
                                        lobortis, auctor justo ut, egestas magna.
                                    </p>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
                                    <img src="/wiki/public/assets/recent-3.jpg" width="550" height="660" loading="lazy" alt="Now we’re getting somewhere" class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-2.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-5.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-1.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <ul class="card-meta-list">

                                        <li>
                                            <a href="#" class="card-tag">Idea</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Product</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Review</a>
                                        </li>

                                    </ul>

                                    <h3 class="h4">
                                        <a href="#" class="card-title hover:underline">
                                            Now we’re getting somewhere
                                        </a>
                                    </h3>

                                    <p class="card-text">
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec
                                        volutpat rhoncus quam,
                                        a feugiat elit gravida eget. Curabitur id pharetra ligula. Integer porttitor suscipit ante ac
                                        faucibus. Sed a enim non
                                        enim viverra pulvinar vel diam ut lorem congue feugiat.
                                    </p>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
                                    <img src="/wiki/public/assets/recent-4.jpg" width="550" height="660" loading="lazy" alt="The trick to getting more done is to have the freedom to roam around" class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-3.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <ul class="card-meta-list">

                                        <li>
                                            <a href="#" class="card-tag">Lifestyle</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Design</a>
                                        </li>

                                    </ul>

                                    <h3 class="h4">
                                        <a href="#" class="card-title hover:underline">
                                            The trick to getting more done is to have the freedom to roam around
                                        </a>
                                    </h3>

                                    <p class="card-text">
                                        Integer nec mi cursus, blandit est et, auctor mauris. Aenean ex metus, faucibus in mattis at,
                                        tincidunt eu dolor. Cras
                                        hendrerit massa nec augue placerat rutrum. Sed facilisis massa enim, ac tempus diam elementum sit
                                        amet.
                                    </p>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
                                    <img src="/wiki/public/assets/recent-5.jpg" width="550" height="660" loading="lazy" alt="Every day, in every city and town across the country" class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-1.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-6.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <ul class="card-meta-list">

                                        <li>
                                            <a href="#" class="card-tag">People</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Story</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Lifestyle</a>
                                        </li>

                                    </ul>

                                    <h3 class="h4">
                                        <a href="#" class="card-title hover:underline">
                                            Every day, in every city and town across the country
                                        </a>
                                    </h3>

                                    <p class="card-text">
                                        Morbi a facilisis lectus. Ut eu dapibus risus, a interdum justo. Vestibulum volutpat velit ac
                                        tellus mollis, sit amet
                                        sodales metus elementum. Aliquam eu mi massa. Proin suscipit enim a pulvinar viverra.
                                    </p>

                                </div>

                            </div>
                        </li>

                        <li>
                            <div class="blog-card">

                                <figure class="card-banner img-holder" style="--width: 550; --height: 660;">
                                    <img src="/wiki/public/assets/recent-6.jpg" width="550" height="660" loading="lazy" alt="Your voice, your mind, your story, your vision" class="img-cover">

                                    <ul class="avatar-list absolute">

                                        <li class="avatar-item">
                                            <a href="#" class="avatar img-holder" style="--width: 100; --height: 100;">
                                                <img src="/wiki/public/assets/author-6.jpg" width="100" height="100" loading="lazy" alt="Author" class="img-cover">
                                            </a>
                                        </li>

                                    </ul>
                                </figure>

                                <div class="card-content">

                                    <ul class="card-meta-list">

                                        <li>
                                            <a href="#" class="card-tag">People</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Review</a>
                                        </li>

                                        <li>
                                            <a href="#" class="card-tag">Story</a>
                                        </li>

                                    </ul>

                                    <h3 class="h4">
                                        <a href="#" class="card-title hover:underline">
                                            Your voice, your mind, your story, your vision
                                        </a>
                                    </h3>

                                    <p class="card-text">
                                        Nullam auctor nisi non tortor porta, id dapibus lectus rhoncus. Vivamus lobortis posuere enim
                                        finibus sodales. Phasellus
                                        quis tellus scelerisque, sagittis tortor et, maximus metus.
                                    </p>

                                </div>

                            </div>
                        </li>

                    </ul>
                </div>
            </section> -->









            <!-- 
        - #NEWSLETTER
      -->

            <section class="section newsletter">

                <h2 class="h2 section-title">
                    Subscribe to <strong class="strong">new posts</strong>
                </h2>

                <form action="" class="newsletter-form">
                    <input type="email" name="email_address" placeholder="Your email address" required class="email-field">

                    <button type="submit" class="btn">Subscribe</button>
                </form>

            </section>

        </article>
    </main>





    <!-- 
    - #FOOTER
  -->

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

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html> -->