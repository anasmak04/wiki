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
    <title>Beautiful Table</title>
    <link rel="stylesheet" href="/wiki/public/css/styles1.css">
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
            margin-right: 5px;
        }

        .delete-btn {
            background-color: #ff5252;
            border-color: #ff5252;
        }

        .edit-btn {
            background-color: #2196f3;
            border-color: #2196f3;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="/wiki/public/assets/logo.svg" alt="Logo" height="30">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="categories">Category</a></li>
                    <li><a href="Adminwiki">Wiki</a></li>
                    <li><a href="show">Tags</a></li>
                    <li><a href="users">Users</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="wikis-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Author</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wikis as $item) : ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->title; ?></td>
                        <td><?php echo $item->content; ?></td>
                        <td><img src="<?php echo $item->image; ?>" alt="Wiki Image" style="max-width: 100px;"></td>
                        <td><?php echo $item->status; ?></td>
                        <td><?php echo $item->created_at; ?></td>
                        <td><?php echo $item->Author; ?></td>
                        <td><?php echo $item->categoryName; ?></td>
                        <td class="actions">
                            <form action="editId" method="GET" class="m-0">
                                <input type="hidden" name="id" value="<?= $item->id ?>">
                                <button type="submit" class="btn btn-primary edit-btn">
                                    <i class="glyphicon glyphicon-pencil"></i> Edit
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>