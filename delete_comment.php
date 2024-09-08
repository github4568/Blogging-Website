<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit(); // Stop further execution
}

// Check if the comment ID is provided
if (!isset($_POST['comment_id'])) {
    // Redirect to an error page or display an error message
    header("Location: error.php");
    exit(); // Stop further execution
}

// Get the comment ID from the POST data
$comment_id = $_POST['comment_id'];

// Connect to the database
$con = mysqli_connect("localhost", "root", "", "blog_posts");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare a DELETE query to delete the comment
$sql = "DELETE FROM comments WHERE id = ?";
$stmt = mysqli_prepare($con, $sql);

// Bind the comment ID parameter
mysqli_stmt_bind_param($stmt, "i", $comment_id);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    // Comment deleted successfully, redirect to the previous page
    header("Location: {$_SERVER['HTTP_REFERER']}");
} else {
    // Error occurred while deleting the comment
    echo "Error: " . mysqli_error($con);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($con);
?>
