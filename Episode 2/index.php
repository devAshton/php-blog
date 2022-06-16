<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Main dark theme css import -->
    <link rel="stylesheet" href="theme/dark.css">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/50857aa883.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet">
    <!--  -->
    <title>Blog Site</title>
</head>
<body>
    <div class="brand">
        <h1 class="brand-text">Blog Site</h1>
        <div>
            <i class="theme-btn fa-solid fa-toggle-off"></i>
        </div>
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
                <a href="/post?id='.$row['ID'].'"><img class="blog-image" src="/images/post1.jpg"></a>
                    <h3 class="post-title">'.$row['Title'].'</h3>
                    <div class="post-body-div">
                        <p class="post-body">'.$row['Description'].'. '.$row['Date'].'</p>
                    </div>
                    <a title="Read more about this post!" class="post-link" href="/post?id='.$row['ID'].'">Read More</a>
                </div>
        </div>';
        }
    } else {
        echo "0 Results";
    }
    ?>
    </div>
    <script>
        var theme = document.querySelector('.theme-btn');
        theme.addEventListener('click', function() {
            if (theme.classList.contains('fa-toggle-off')) {
                theme.classList.remove('fa-toggle-off');
                theme.classList.add('fa-toggle-on');
                document.querySelector('body').classList.add('dark');
                document.querySelector('link[rel="stylesheet"]').setAttribute('href', 'theme/light.css');
            } else {
                theme.classList.remove('fa-toggle-on');
                theme.classList.add('fa-toggle-off');
                document.querySelector('body').classList.remove('dark');
                document.querySelector('link[rel="stylesheet"]').setAttribute('href', 'theme/dark.css');
            }
        });
    </script>
</body>
</html>
