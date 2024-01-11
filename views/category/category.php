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
    <title>Document</title>
    <link rel="stylesheet" href="/wiki/public/css/styles.css">
</head>

<body>
    <p>insert new category</p>

    <form action="savecategory" method="POST">
        <input type="hidden" name="id">
        <input type="text" name="name" id="name" placeholder="name">
        <button type="submit" name="submitCategory">Save</button>
    </form>

</body>

</html>