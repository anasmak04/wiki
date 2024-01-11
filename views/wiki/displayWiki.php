<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="/wiki/public/css/stylee.css" rel="stylesheet" />
    <link href="/wiki/public/css/style3.css" rel="stylesheet" />
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

                    <?php if (!isset($_SESSION["role"]) || $_SESSION["role"] === 'guest') { ?>
                        <a href="http://localhost/wiki/register" class="btn btn-primary">Join</a>

                    <?php } ?>

                    <?php if (isset($_SESSION["role"]) && ($_SESSION["role"] == 2 || $_SESSION["role"] == 1)) { ?>
                        <div class="avatar-dropdown">
                            <img style="width:50px;" src="<?php echo isset($_SESSION["image"]) ? $_SESSION["image"] : ''; ?>" alt="" class="avatar">
                            <ul class="dropdown-menu">
                                <li><a href="http://localhost/wiki/profile">View Profile</a></li>
                                <li><a href="http://localhost/wiki/logout">Logout</a></li>
                            </ul>
                        </div>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>



    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">EXPLORE THE BLOGSCAPE</h1>
                <?php if (isset($_SESSION['userId'])) { ?>
                    <p class="lead mb-0"><a href="http://localhost/wiki/index" class="btn btn-primary">Add New Wiki</a></p>
                <?php } ?>

            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">

        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <div class="card mb-4 existing-card">

                </div>

                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" style="width:100%;height:300px;object-fit:cover;" src="<?= $wikis[0]->image ?>" alt="..." /></a>
                    <div class="card-body">
                        <div class="badge bg-primary"><?= $wikis[0]->tag_names ?></div> <br>
                        <div class="badge bg-secondary"> <?= $wikis[0]->category_name ?></div>
                        <h2 class="card-title"><?= $wikis[0]->title ?></h2>
                        <p class="card-text"><?= $wikis[0]->content ?></p>

                        <?php
                        if (isset($_SESSION["userId"]) && $_SESSION["userId"] == $wikis[0]->author_id) :
                        ?> <!-- Delete Button -->
                            <form action="wdelete" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $wikis[0]->id ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                            <!-- Edit Button -->
                            <form action="update" method="GET" class="d-inline">
                                <input type="hidden" name="id" value="<?= $wikis[0]->id ?>">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>


                        <?php endif; ?>

                        <!-- Details Button -->
                        <form action="detail" method="GET" class="d-inline">
                            <input type="hidden" name="id" value="<?= $wikis[0]->id ?>">
                            <button type="submit" class="btn btn-info">Details</button>
                        </form>
                    </div>

                </div>

                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    <?php

                    foreach ($wikis as $wiki) :
                    ?>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="<?= $wiki->image ?>" alt="..." style="width:100%;height:300px;object-fit:cover;" /></a>
                                <div class="card-body">
                                    <div class="badge bg-primary"><?= $wiki->tag_names ?></div> <br>
                                    <div class="badge bg-secondary"> <?= $wikis[0]->category_name ?></div>
                                    <h2 class="card-title h4"><?= $wiki->title ?></h2>
                                    <p class="card-text"><?= $wiki->content ?>.</p>
                                    <?php
                                    if (isset($_SESSION["userId"]) && $_SESSION["userId"] == $wiki->author_id) :
                                    ?> <!-- Delete Button -->
                                        <form action="wdelete" method="POST" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $wiki->id ?>">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

                                        <!-- Edit Button -->
                                        <form action="update" method="GET" class="d-inline">
                                            <input type="hidden" name="id" value="<?= $wiki->id ?>">
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </form>

                                    <?php endif; ?>
                                    <form action="detail" method="GET" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $wiki->id ?>">
                                        <button type="submit" class="btn btn-info">Details</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="search" id="searchInput" name="search" placeholder="Search" class="form-control" />
                        </div>
                    </div>
                </div>

                <div id="searchResults">

                </div>


                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <?php foreach ($wikis as $wiki) : ?>
                            <span class="badge bg-primary"><?php echo $wiki->category_name; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>


                <!-- Side widget-->
                <!-- Tags widget -->
                <div class="card mb-4">
                    <div class="card-header">Tags</div>
                    <div class="card-body">
                        <?php foreach ($wikis as $wiki) : ?>
                            <span class="badge bg-secondary"><?php echo $wiki->tag_names; ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- Footer-->



    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h5 class="text-white mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white">Home</a></li>
                        <li><a href="#" class="text-white">Blog</a></li>
                        <li><a href="#" class="text-white">About Us</a></li>
                        <li><a href="#" class="text-white">Contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-4">
                    <h5 class="text-white mb-3">Follow Us</h5>
                    <!-- Social text links -->
                    <p class="text-white"><a href="#" class="text-white"><i class="fab fa-facebook"></i> Facebook</a></p>
                    <p class="text-white"><a href="#" class="text-white"><i class="fab fa-twitter"></i> Twitter</a></p>
                    <p class="text-white"><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></p>

                </div>
                <div class="col-lg-4">
                    <h5 class="text-white mb-3">Contact Information</h5>
                    <p class="text-muted">123 Street, Cityville, Country</p>
                    <p class="text-muted">Email: info@example.com</p>
                </div>
            </div>
            <hr class="my-4">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        </div>
    </footer>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/wiki/public/js/script.js" defer></script>
    <script src="/wiki/public/js/search.js" defer></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>