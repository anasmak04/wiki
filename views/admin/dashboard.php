<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin-top: 50px;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .well-box {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            padding: 15px;
            margin-bottom: 15px;
        }

        .card-box {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        canvas {
            width: 100% !important;
            height: auto !important;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header text-center">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="d-flex justify-content-center align-items-center">
                <img src="/wiki/public/assets/logo.svg" alt="" class="navbar-brand">
            </div>
        </div>
        <div class="collapse navbar-collapse text-center" id="myNavbar">
            <ul class="nav navbar-nav navbar-center">
                <li class="active"><a href="">Dashboard</a></li>
                <li><a href="categories">Category</a></li>
                <li><a href="Adminwiki">Wiki</a></li>
                <li><a href="show">Tags</a></li>
                <li><a href="users">Users</a></li>
            </ul>
        </div>
    </div>
</nav>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 content">
                <div class="row well-box">
                    <h4 class="text-center">Dashboard</h4>
                    <p class="text-center">Welcome to the Dashboard!</p>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card-box">
                            <h4>Users</h4>
                            <p><?= $userCount->total_users; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card-box">
                            <h4>Categories</h4>
                            <p><?= $categoryCount->total_categories; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card-box">
                            <h4>Wikis</h4>
                            <p><?= $wikiCount->total_wikis; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card-box">
                            <h4>Tags</h4>
                            <p><?= $tagCount->total_tags; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="well-box">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="well-box">
                            <p>Text</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="well-box">
                            <p>Text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    foreach ($data as $result) {
        $date[] = $result["monthname"];
        $wiki[] = $result["wikicount"];
    }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?= json_encode($date); ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'History of Wikis per Month',
                data: <?= json_encode($wiki); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

        var myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>

</html>