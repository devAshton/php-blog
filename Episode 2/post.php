<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Site - Post</title>
</head>
<body>
    <?php
        $connection = mysqli_connect('localhost', 'root', '', 'blog');
        if (!$connection) {
            die("Database connection failed");
        }

        $id = $_GET['id'];
        
        $sql = "SELECT * FROM posts WHERE ID = $id";
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
</body>
</html>
