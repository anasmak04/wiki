<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beautiful Table</title>
    <link rel="stylesheet" href="/wiki/public/css/styles1.css">
</head>

<body>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $user->name; ?></td>
                        <td><?= $user->username; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->role_id; ?></td>
                        <td>
                            <form action="deleteUser" method="POST">
                                <input type="hidden" name="id" value="<?= $user->id ?>">
                                <button type="submit">delete</button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>

        </table>
    </div>

</body>

</html>