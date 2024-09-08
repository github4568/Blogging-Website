<?php
// like_post.php
session_start();
$con = mysqli_connect("localhost", "root", "", "blog_posts");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$post_id = $_POST['post_id'];

// Update likes count in the database
$sql = "UPDATE posts SET dislikes = dislikes + 1 WHERE id = '$post_id'";
mysqli_query($con, $sql);
$sql = "SELECT dislikes FROM posts WHERE id = '$post_id'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$dislikes = $row['dislikes'];
// Close connection
mysqli_close($con);
echo $dislikes;
?>
