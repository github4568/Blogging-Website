<?php
// like_post.php
session_start();
$con = mysqli_connect("localhost", "root", "", "blog_posts");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$post_id = $_POST['post_id'];

// Update likes count in the database
$sql = "UPDATE posts SET likes = likes + 1 WHERE id = '$post_id'";
mysqli_query($con, $sql);
$sql = "SELECT likes FROM posts WHERE id = '$post_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$likes = $row['likes'];
// Close connection
mysqli_close($con);
echo $likes;
?>
