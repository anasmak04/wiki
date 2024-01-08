<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wikis</title>
    <link rel="stylesheet" href="/wiki/public/css/wiki.css">
</head>

<body>
    <div class="container">
        <?php

        use App\model\CategoryImp;
        use App\model\UserImp;



        foreach ($wikis as $wiki) : ?>
            <div class="card">
                <p>ID Wiki: <?= $wiki->id ?></p>
                <img src="<?= $wiki->image ?>" alt="Image">
                <p>Title: <?= $wiki->title ?></p>
                <p>Content: <?= $wiki->content ?></p>
                <p>Time: <?= $wiki->created_at ?></p>
                <p>id user: <?= $wiki->author_id ?></p>
                <?php
                $model = new UserImp();
                $model2 = new CategoryImp();
                $user = $model->findById($wiki->author_id);
                $category = $model2->findById($wiki->category_id);
                ?>
                <p>user : <?= $user->name; ?></p>
                <p>category : <?= $category->name; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>