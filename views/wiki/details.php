

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/wiki/public/css/details.css">
    <link rel="stylesheet" href="/wiki/public/css/style3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


    <title>Wiki Detail</title>
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


    <div class="container container-contact bootstrap snippets bootdeys bootdey">
        <?php if ($wiki) : ?>
            <div class="row decor-default">
                <div class="col-md-12">
                    <div class="contact">
                        <div class="controls">
                            <span class="icon icon-folder" data-toggle="tooltip" data-placement="top" title="Archive"></span>
                            <span class="icon icon-delete" data-toggle="tooltip" data-placement="top" title="Delete"></span>
                            <span class="icon icon-close" data-toggle="tooltip" data-placement="top" title="Close"></span>
                            <img src="<?= $wiki->image ?>" alt="cover" class="cover">
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-5 col-xs-12">
                                <!-- User details -->
                                <div class="row">
                                    <div class="col-xs-3">
                                        Email:
                                    </div>
                                    <div class="col-xs-9">
                                        <?= $wiki->user_email; ?>
                                    </div>
                                    <!-- Add other user details as needed -->
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-xs-12">
                                <!-- Wiki content -->
                                <p class="contact-description"><?= $wiki->content ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>