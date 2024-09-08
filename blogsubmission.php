<?php
if(isset($_POST['title'])){
// $server = "localhost";
// $username = "root";
// $password = "";

// $con = mysqli_connect($server, $username, $password);
$con = mysqli_connect("localhost", "root", "", "blog_posts");


if(!$con){
    die("connection to this database failed due to".
    mysqli_connect_error());
}

$title = $_POST['title'];
$author = $_POST['author'];
$image = $_POST['image'];
$content = $_POST['content'];
$sql = "INSERT INTO `blog_posts`.`posts` (`title`, `author`, `image`, `content`, `date`) VALUES (?,?,?,?, current_timestamp());";
// echo $sql;
$stmt = $con->prepare($sql);
$stmt->bind_param("ssss", $_POST['title'], $_POST['author'], $_POST['image'], $_POST['content']);

    // Execute the statement
    if($stmt->execute()) {
        // Redirect to display page upon successful insertion
        header("Location: http://localhost/mysql/display.php");
        exit(); // Ensure script execution stops after redirection
    } else {
        // Handle errors
        echo "ERROR: Unable to execute statement";
    }

    // Close the statement and database connection
    $stmt->close();
    $con->close();
}
?>
<!-- if($con->query($sql) == true){
    header("Location: http://localhost/mysql/display.php");
}
else {
 echo "ERROR: $sql <br> $con->error";
}
$con->close();
}

?> -->
