<?php
// Start the session
session_start();

// Connect to MySQL
$con = mysqli_connect("localhost", "root", "", "blog_posts");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$post_id = $_POST['post_id'];

// Use the username stored in the session variable as the commenter's name
$user_id = $_SESSION['username'];
$comments = $_POST['comments'];

// Insert comment into the database
$sql = "INSERT INTO comments (post_id, user_id, comments,dt) VALUES ('$post_id', '$user_id', '$comments',current_timestamp())";
if (mysqli_query($con, $sql)) {
    header("Location: readmoree.php?id=$post_id");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


// Close connection
mysqli_close($con);
?>
