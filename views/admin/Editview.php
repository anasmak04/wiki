<?php
if (!isset($_SESSION['userId'])) {
    header("Location: login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Insert Page</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/wiki/public/css/styles.css">
</head>
<style>
    .con {
        margin-top: 90px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }
</style>

<body>


    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header text-center">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="/wiki/public/assets/logo.svg" alt="" class="navbar-brand">
                </div>
            </div>
            <div class="collapse navbar-collapse text-center" id="myNavbar">
                <ul class="nav navbar-nav navbar-center">
                    <li class="active"><a href="">Dashboard</a></li>
                    <li><a href="categories">Category</a></li>
                    <li><a href="Adminwiki">Wiki</a></li>
                    <li><a href="show">Tags</a></li>
                    <li><a href="users">Users</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php if ($wiki) : ?>
        <div class="con">
            <form action="adminupdatewiki" method="POST">
                <input type="hidden" name="id" value="<?= $wiki->id; ?>">
                <input type="number" name="status" value="<?= $wiki->status; ?>">
                <button type="submit">save</button>
            </form>
        </div>
    <?php endif; ?>

    <script src="/wiki/public/js/tiny.js"></script>
</body>

</html>