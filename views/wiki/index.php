<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Insert Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/wiki/public/css/wiki.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="bg-light">

    <header class="bg-dark text-white text-center py-2">
        <h1 class="mb-0">Insert new wiki</h1>
    </header>

    <main class="container mt-4">
        <form action="wikisave" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id">

            <fieldset>
                <legend class="mb-4">Wiki Information</legend>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter blog title" required>
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Write your blog content here"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <div class="form-group">
                    <label for="category_id">Category:</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="multiple-tags">Tags:</label>
                    <select class="js-example-basic-multiple" name="tags[]" multiple="multiple">
                        <?php foreach ($tags as $tag) { ?>
                            <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                        <?php } ?>
                    </select>
                </div>
            </fieldset>

            <button type="submit" class="btn btn-primary" name="submitWiki">Submit</button>
        </form>
    </main>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script src="/wiki/public/js/tiny.js"></script>
</body>

</html>