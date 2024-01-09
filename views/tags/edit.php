<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="updatetag" method="POST">
        <?php if ($tag) : ?>
            <input type="hidden" name="id" value="<?= $tag->id ?>">
            <input type="text" name="name" value="<?= $tag->name ?>">
            <button type="submit" name="editsubmit">save</button>
        <?php endif; ?>
    </form>
</body>

</html>