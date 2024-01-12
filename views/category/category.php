<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/wiki/public/css/styles.css">

</head>
<style>
    .con{margin-top: 80px;}
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


<div class="con">
<p>insert new category</p>

<form action="savecategory" method="POST">
    <input type="hidden" name="id">
    <input type="text" name="name" id="name" placeholder="name">
    <button type="submit" name="submitCategory">Save</button>
</form>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>