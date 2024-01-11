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
</head>

<body>
    <?php if ($wiki) : ?>
        <form action="adminupdatewiki" method="POST">
            <input type="hidden" name="id" value="<?= $wiki->id; ?>">
            <input type="number" name="status" id="" value="<?= $wiki->status; ?>">
            <button type="submit">save</button>
        </form>
    <?php endif; ?>

    <script src="/wiki/public/js/tiny.js"></script>
</body>

</html>