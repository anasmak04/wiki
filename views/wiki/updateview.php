<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Insert Page</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="/wiki/public/css/wiki.css">
</head>

<body>

<?php if ($wiki) : ?>
    <form action="wupdate" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $wiki->id; ?>">
        <fieldset>
            <legend>Wiki Information</legend>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter blog title" value="<?= $wiki->title; ?>" required><br><br>

            <label for="content">Content:</label><br>
            <textarea id="content" name="content" placeholder="Write your blog content here"><?= $wiki->content ?></textarea><br><br>

            <label for="category_id">Category ID:</label>
            <input type="number" id="category_id" name="category_id" placeholder="Enter category id" value="<?= $wiki->category_id; ?>" required><br><br>

        

            <label for="new_image">New Image (optional):</label>
            <input type="file" id="new_image" name="image" value="<?= $wiki->image; ?>"><br>

         <input type="text" id="title" name="tag_names" placeholder="Enter blog title" value="<?= $wiki->tag_names; ?>" required><br><br>


            <button type="submit">Submit</button>
        </fieldset>
    </form>
<?php endif; ?>


    <script src="/wiki/public/js/tiny.js"></script>
</body>

</html>