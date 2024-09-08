<?php
// Start session to manage user authentication
session_start();

// Check if the user is logged in
if(isset($_SESSION['username'])) {
    // Check if the post ID is provided
    if(isset($_POST['post_id'])) {
        // Connect to the database
        $con = mysqli_connect("localhost", "root", "", "blog_posts");

        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Sanitize input and prevent SQL injection
        $post_id = mysqli_real_escape_string($con, $_POST['post_id']);
        $username = $_SESSION['username'];

        // Query to delete the post only if it belongs to the logged-in user
        $sql = "DELETE FROM posts WHERE id = '$post_id' AND author = '$username'";

        if (mysqli_query($con, $sql)) {
            header("Location: ".$_SERVER['PHP_SELF']);
        } else {
            echo "Error deleting post: " . mysqli_error($con);
        }

        // Close connection
        mysqli_close($con);
    } else {
        header("Location:  http://localhost/mysql/display.php");
    }
} else {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}
?>
