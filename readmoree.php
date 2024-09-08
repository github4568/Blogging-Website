<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    

  </head>
  <body>


  <?php
$con = mysqli_connect("localhost", "root", "", "blog_posts");


if(!$con){
    die("connection to this database failed due to".
    mysqli_connect_error());
}


// Retrieve data based on the id parameter from the URL
$id = $_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($con, $sql);

// Check if query executed successfully
if ($result === false) {
    die("Error executing the query: " . mysqli_error($con));
}

// Fetch the data
$row = mysqli_fetch_assoc($result);
// Retrieve comments associated with the blog post
$sql_comments = "SELECT * FROM comments WHERE post_id = '$id' ORDER BY dt DESC";
    $result_comments = mysqli_query($con, $sql_comments);

    // Check if query executed successfully
    if ($result_comments === false) {
        die("Error executing the query: " . mysqli_error($con));
    }

    
    

// Close connection
mysqli_close($con);

// Display the data
echo '<h1 style="font-size: 90px;display:block-inline;text-align:center; text-transform:uppercase; background-color: rgb(20, 255, 239); font-family: Georgia, Times New Roman, Times, serif;">' . $row['title'] . '</h1>';
            echo '<img src="' . $row['image'] . '" style="height: 300px; width: 600px; display:block-inline;margin-left:340px;margin-bottom:30px;margin-top: 30px;"alt="Blog Image">';
            echo '<p style="font-size: 17px;margin-top:30px; margin-left: 30px;margin-right: 30px;">' . $row['content'] . '</p>';
            echo '<h4 style="font-size: 20px;display:flex;align-items: flex-end; font-family: Cambria, Cochin, Georgia, Times, Times New Roman, serif;margin-left: 30px;margin-top:30px;">-Author: ' . $row['author'] . '</h4>';
?>
<hr>


<div>
  <h3 style="margin-left: 30px;margin-top: 30px;margin-bottom: 30px;">Comments</h3>
<form action="comment.php" method="post">
    <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">

    <div class="input-group mb-3">
  <span class="input-group-text" id="user_id" name="user_id" style="margin-left: 30px;"><?php 

echo   $_SESSION['username']     ; 
?></span>
  <input type="text" class="form-control" aria-label="Sizing example input" name="comments" id="comments" aria-describedby="inputGroup-sizing-default" placeholder="Add a Comment" style="margin-right: 30px;" >
</div>
    
</form>
</div>
<hr>
<div >
<?php while ($comment = mysqli_fetch_assoc($result_comments)) : ?>
    <div style="display: flex; align-items: center; margin-bottom: 10px; background-color:;">
        <?php if ($comment['user_id'] === $_SESSION['username']) : ?>
            <form action="delete_comment.php" method="post">
                <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                <button type="submit" class="btn btn-danger btn-sm" style="margin-right: 5px;margin-left:10px;"><i class="fas fa-trash-alt"></i></button><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
            </form>
        <?php endif; ?>
        <p style=" margin-left: 10px;margin-top:12px;"><span style="font-size:20px;background-color:;border: 1px solid black ;"><?php echo $comment['user_id']; ?></span> : <?php echo $comment['comments']; ?></p>
    </div><hr>
<?php endwhile; ?>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>





