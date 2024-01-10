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





    <header>
        <!-- <p>welcome : <?= $_SESSION["username"] ?></p> -->
        <h1>wiki Insert Page</h1>
    </header>
    <main>
        <form action="wikisave" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id">

            <fieldset>
                <legend>wiki Information</legend>

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" placeholder="Enter blog title" required><br><br>

                <label for="content">Content:</label><br>
                <textarea id="content" name="content" placeholder="Write your blog content here"></textarea><br><br>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image"><br><br>

                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id">
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?= $category->id ?>"><?= $category->name ?></option>
                    <?php } ?>
                </select><br><br>

                <label for="category_id">Tags:</label>

                <select id="" name="tag">
                    <?php foreach ($tags as $tag) { ?>
                        <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                    <?php } ?>
                </select><br><br>

                <!-- <select id="multiple-tags" name="tags[]" multiple>
                    <?php foreach ($tags as $tag) { ?>
                        <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                    <?php } ?>
                </select> -->
            </fieldset>

            <button type="submit" name="submitWiki">Submit</button>
        </form>
    </main>

    <script src="/wiki/public/js/tiny.js"></script>
</body>

</html>