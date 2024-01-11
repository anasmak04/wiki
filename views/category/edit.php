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
</head>

<body>
    <form action="editapp" method="POST">
        <?php if ($category) : ?>
            <input type="hidden" name="id" value="<?= $category->id ?>">
            <input type="text" name="name" value="<?= $category->name ?>">
            <button type="submit" name="editsubmit">save</button>
        <?php endif; ?>
    </form>
</body>

</html>