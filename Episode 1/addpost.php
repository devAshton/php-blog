<?php 
$title = $_GET['title'];
$description = $_GET['description'];
$date = $_GET['date'];
$id = $_GET['id'];
$author = $_GET['author'];

$connection = mysqli_connect('localhost', 'root', '', 'blog');
if (!$connection) {
    die("Database connection failed");
}

$sql = "INSERT INTO posts (Title, Description, Date, ID, Author) VALUES ('$title', '$description', '$date', '$id', '$author')";
if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
?>
