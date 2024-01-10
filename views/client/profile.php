<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="/wiki/public/css/profile.css">
</head>

<body>
    <h1>User Profile</h1>


    <?php
    if ($user) {
    ?>
        <form method="post" action="profile">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user->name; ?>"><br><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user->username; ?>"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user->email; ?>"><br><br>


            <label for="linkedin">linkedin:</label>
            <input type="text" id="linkedin" name="linkedin" value="<?php echo $user->linkedin; ?>"><br><br>



            <label for="Github">Github:</label>
            <input type="text" id="github" name="github" value="<?php echo $user->github; ?>"><br><br>

            <button type="submit" name="submitUpdate">save</button>
        </form>
    <?php
    } else {
        echo "User not found.";
    }
    ?>

</body>

</html>