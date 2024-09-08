<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recent Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  </head>
  
<?php
$con = mysqli_connect("localhost", "root", "", "blog_posts");


if(!$con){
    die("connection to this database failed due to".
    mysqli_connect_error());
}

// Assuming you have already established a database connection


// Include your database connection file if necessary
// include 'db_connection.php';

// Check if the search query is submitted
if(isset($_POST['search_query'])) {
    // Get the search query from the form
    $searchQuery = $_POST['search_query'];

    // Perform a SQL query to search for posts containing the search query in title or content
    $sql = "SELECT * FROM posts WHERE title LIKE '%$searchQuery%' OR content LIKE '%$searchQuery%'";
    
    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if any rows were returned
    
    if(mysqli_num_rows($result) > 0) {
        echo "<h1 style='margin-left:60px;margin-top:30px;font-family: Verdana, Geneva, Tahoma, sans-serif;margin-bottom:30px;'> Search Results:</h1>";
       echo "<div class='album py bg-body-tertiary' >";
       
    echo"<div class='row py-lg'>";
      echo"<div class=' col-md-11 mx-auto'>";
      
        echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ' class='mt-8' id='blog'>";
        while($row = mysqli_fetch_assoc($result)) {
            
            echo "<div class='col'>";
                echo "<div class='card shadow-sm'>";
                    echo "<img src='" . $row['image'] ."' class='bd-placeholder-img card-img-top' width='300px' height='300px' >";
                    echo "<div class='card-body'>";
                        echo "<p class='card-text' style='font-family: Verdana, Geneva, Tahoma, sans-serif;' >" .$row['title'] ."</p>";
                        echo "<p class='card-text' style='font-family: Verdana, Geneva, Tahoma, sans-serif;' >Author: " .$row['author'] ."</p>";
                        echo "<div class='d-flex justify-content-between align-items-center'>";
                            echo "<div class='btn-group'>";
                            echo "<a href='readmoree.php?id=" .$row['id']."' class='btn btn-sm btn-outline-secondary'><button type='button' class='btn btn-sm btn-outline-secondary'>Read More</button></a>";
                            
                            if(isset($_SESSION['username']) && $_SESSION['username'] == $row['author']) {
                              echo "<form action='delete.php' method='POST'>";
                              echo "<input type='hidden' name='post_id' value='" . $row['id'] . "'>";
                              echo "<button type='button' class='btn btn-sm btn-outline-danger' style='margin-left: 150px;'  data-bs-toggle='modal' data-bs-target='#confirmModal".$row['id']."'>Delete</button>";
                              echo "</form>";   
                          }
                        
                          
                          echo   "</div>";
                      echo   "</div>";        
                    echo  "</div>";
               echo  "</div>";
           echo  "</div>";
            // echo "<h2 style=' margin-left: 30px;'>" . $row['title'] . "</h2>";
            // echo '<img src="' . $row['image'] . '" style="height: 300px; width: 600px; display:block-inline;margin-left:340px;margin-bottom:30px;margin-top: 30px;"alt="Blog Image">';
            // echo "<p style='margin-top:30px; margin-left: 30px;margin-right: 30px;'>" . $row['content'] . "</p>";
            
                        }

                        echo "</div>";

    } 
    
    else {
        echo "No results found.";
    }
}


mysqli_close($con);
?>
