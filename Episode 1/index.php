<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <!--  -->
    <title>Blog Site</title>
</head>
<body>
    <div class="brand">
        <h1 class="brand-text">Blog Site</h1>
    </div>
    <?php
    $connection = mysqli_connect('localhost', 'root', '', 'blog');
    if (!$connection) {
        die("Database connection failed");
    }

    $sql = "SELECT * FROM posts";
    $results = mysqli_query($connection, $sql);
    if (mysqli_num_rows($results) > 0) {
        while($row = mysqli_fetch_assoc($results)) {
            echo '<div>
            <div class="post-div">
                <div class="post">
                    <h3 class="post-title">'.$row['Title'].'</h3>
                    <div class="post-body-div">
                        <p class="post-body">'.$row['Description'].'. '.$row['Date'].'</p>
                    </div>
                    <a title="Read more about this post!" class="post-link" href="">Read More</a>
                </div>
        </div>';
        }
    } else {
        echo "0 Results";
    }
    ?>
    </div>
    <style>
        body {
            background-color: #161616;
        }
        .brand-text {
            margin-left: 1%;
            color: white;
            font-family: 'Open Sans', sans-serif;
        }
        .post-div {
            margin-top: 50px;
            margin-left: 1%;
            margin-right: 1%;
        }
        .post {
            background-color: #1a1a1a;
            border-radius: 10px;
            padding: 2em;
            margin-bottom: 10px;
        }
        .post-title {
            color: white;
            font-family: 'Open Sans', sans-serif;
            font-size: 20px;
        }
        .post-body-div {
            margin-top: 10px;
        }
        .post-body {
            color: white;
            font-family: 'Open Sans', sans-serif;
            font-size: 15px;
        }
        .post-body a {
            color: wite;
            font-family: 'Open Sans', sans-serif;
            font-size: 15px;
            text-decoration: underline;
        }
    </style>
</body>
</html>
