<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .wikis-table {
        margin: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: left;
    }

    table th {
        background-color: #f2f2f2;
    }

    table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tbody tr:hover {
        background-color: #f2f2f2;
    }
</style>

<body>
    <div class="wikis-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Author ID</th>
                    <th>Category ID</th>
                    <th>Author</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($wikis as $item) : ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->title; ?></td>
                        <td><?php echo $item->content; ?></td>
                        <td><img src="<?php echo $item->image; ?>" alt="Wiki Image" style="max-width: 100px;"></td>
                        <td><?php echo $item->status; ?></td>
                        <td><?php echo $item->created_at; ?></td>
                        <td><?php echo $item->author_id; ?></td>
                        <td><?php echo $item->category_id; ?></td>
                        <td><?php echo $item->Author; ?></td>
                        <td><?php echo $item->categoryName; ?></td>
                        <td>delete</td>
                        <td>

                            <form action="editId" method="GET">
                                <input type="hidden" name="id" value="<?= $item->id ?>">
                                <button type="submit">edit</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>