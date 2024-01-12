<?php

use App\model\CategoryImp;
use App\model\TagImp;

$cat = new CategoryImp();
$tag = new TagImp();
$categories = $cat->findAll();
$tags = $tag->findAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Insert Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="/wiki/public/css/wiki.css">
</head>

<body class="container mt-4">

    <?php if ($wiki) : ?>
        <form action="wupdate" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $wiki->id; ?>">

            <fieldset>
                <legend>Wiki Information</legend>

                <!-- Title Input -->
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" value="<?= $wiki->title; ?>" required>
                </div>

                <!-- Content Textarea -->
                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Write your blog content here"><?= $wiki->content ?></textarea>
                </div>

                <!-- Category Selection -->
                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id ?>" <?= ($category->id == $wiki->category_id) ? 'selected' : '' ?>>
                                <?= $category->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Image Input -->
                <div class="form-group">
                    <label for="new_image">New Image (optional):</label>
                    <input type="file" class="form-control-file" id="new_image" name="image" value="<?= $wiki->image; ?>">
                </div>



                <select id="multiple-tags" name="tags[]" multiple>
                    <?php foreach ($tags as $tag) { ?>
                        <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                    <?php } ?>
                </select>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
    <?php endif; ?>

    <!-- TinyMCE Initialization -->
    <script src="/wiki/public/js/tiny.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>