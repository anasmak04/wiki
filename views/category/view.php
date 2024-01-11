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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        th {
            background-color: #04AA6D;
            color: #fff;
        }

        tr:hover {
            background-color: #f4f4f4;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        .actions button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: #fff;
        }

        .delete-btn {
            background-color: #ff5252;
        }

        .edit-btn {
            background-color: #2196f3;
        }
    </style>
</head>

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

    <!-- Category List -->
    <div class="container" style="margin-top: 70px;">
        <h1>Category List</h1>

        <!-- Add New Category Button -->
        <div class="text-right" style="margin-bottom: 10px;">
            <a href="http://localhost/wiki/category" class="btn btn-success">Add New Category</a>
        </div>

        <!-- Category List Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?= $category->id ?></td>
                        <td><?= $category->name ?></td>
                        <td class="actions">
                            <form action="deletecategory" method="POST">
                                <input type="hidden" name="id" value="<?= $category->id; ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <form action="edit" method="GET">
                                <input type="hidden" name="id" value="<?= $category->id; ?>">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap and other scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>