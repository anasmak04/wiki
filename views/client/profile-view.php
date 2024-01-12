<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <!-- Add Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Add custom styles here if needed */
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border: 2px solid #007bff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }

        .card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card-text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        * {
            margin: 0;
            padding: 0
        }

        body {
            background-color: #000
        }

        .card {
            width: 350px;
            background-color: #efefef;
            border: none;
            cursor: pointer;
            transition: all 0.5s;
        }

        .image img {
            transition: all 0.5s
        }

        .card:hover .image img {
            transform: scale(1.5)
        }

        .btn {
            height: 140px;
            width: 140px;
            border-radius: 50%
        }

        .name {
            font-size: 22px;
            font-weight: bold
        }

        .idd {
            font-size: 14px;
            font-weight: 600
        }

        .idd1 {
            font-size: 12px
        }

        .number {
            font-size: 22px;
            font-weight: bold
        }

        .follow {
            font-size: 12px;
            font-weight: 500;
            color: #444444
        }

        .btn1 {
            height: 40px;
            width: 150px;
            border: none;
            background-color: #000;
            color: #aeaeae;
            font-size: 15px
        }

        .text span {
            font-size: 13px;
            color: #545454;
            font-weight: 500
        }

        .icons i {
            font-size: 19px
        }

        hr .new1 {
            border: 1px solid
        }

        .join {
            font-size: 14px;
            color: #a0a0a0;
            font-weight: bold
        }

        .date {
            background-color: #ccc
        }
    </style>
</head>

<body>

    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <?php if ($user) :  ?>
                <div class="image d-flex flex-column justify-content-center align-items-center">
                        <img src="<?= $user->image ?>" height="100" width="100" style="border-radius: 50%;" />
                
                    <span class="name mt-3"><?= $user->name ?></span>
                    <span class="idd"><?= $user->email ?></span>
                    <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                        <span class="idd1">Oxc4c16a645_b21a</span>
                        <span><i class="fa fa-copy"></i></span>
                    </div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                        <span class="number">1069 <span class="follow">Followers</span></span>
                    </div>
                    <div class="d-flex mt-2">
                        <button class="btn1 btn-dark">
                            <a style="color: white;" href="http://localhost/wiki/profile">Edit view</a>
                        </button>
                    </div>
                 
                    <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                        <a href="" target="_blank" class="social-icon">
                            <i class="fab fa-linkedin"></i>
                            <span> <?= $user->linkedin; ?> </span>
                        </a>

                        <a href="" target="_blank" class="social-icon">
                            <i class="fab fa-github"></i>
                            <span>   <? $user->github; ?></span>
                        </a>
                    </div>

                    <div class="px-2 rounded mt-4 date">
                        <span class="join">Joined May, 2021</span>
                    </div>
                </div>
        </div>
    <?php endif; ?>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>