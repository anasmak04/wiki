<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    /* Basic styling for the table */
    .data-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .data-table th,
    .data-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .data-table th {
        background-color: #f2f2f2;
    }

    /* Styling for action buttons */
    .data-table button {
        padding: 6px 12px;
        margin-right: 5px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    .data-table button:hover {
        background-color: #0056b3;
    }
</style>

<body>




    <table class="data-table">
        <?php foreach ($categories as $category) : ?>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $category->id; ?></td>
                    <td><?= $category->name; ?></td>
                    <td>
                        <form action="deletecategory" method="POST">
                            <input type="hidden" name="id" value="<?= $category->id; ?>">
                            <button type="submit">delete</button>
                        </form>

                        <form action="edit" method="GET">
                            <input type="hidden" name="id" value="<?= $category->id; ?>">
                            <button type="submit">edit</button>
                        </form>

                    </td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>






</body>

</html>