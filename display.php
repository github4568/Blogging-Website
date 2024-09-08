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
  <body>
  <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">India</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="http://localhost/mysql/BootStrap.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/mysql/display.php">Recent Posts</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Submissions
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="http://localhost/mysql/login.php">Login</a></li>
                <li><a class="dropdown-item" href="#">Interesting Facts</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Know More</a></li>
                <li><a class="dropdown-item" href="http://localhost/mysql/help.php">Help</a></li>
              </ul>

            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/mysql/contact.html">Contact Us</a>
            </li>
           
          </ul>
          <form class="d-flex"  action="search.php" method="POST">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_query">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>    
    
    

  <!-- $result = $sql("SELECT * FROM blog_posts") or die ($mysqli->error);
  while ($data = $result->fetch_assoc()){}

  echo "<h2>{$data['title']}</h2>"  ;
  echo "<img src='{$data['image']}' class='bd-placeholder-img card-img-top' width='300px' height='300px'>"; -->
  
  

<div class="container">
    <div class="album py-5 bg-body-tertiary" >
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light" style= "color: orange; text-align: center;font-size: 50px ;font-size: 94px;font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"><b>Recent Posts</b></h1>
        <p class="lead text-body-secondary"><ul style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 20px ;"><li>Here are some beautiful experiences of people. </li>
            <li>New Submissions get added here.</li>
        <li>Have a great time reading.</li></ul></p>
        
      </div>
    </div>
    <br><br><br>


    <?php
    
$con = mysqli_connect("localhost", "root", "", "blog_posts");


if(!$con){
    die("connection to this database failed due to".
    mysqli_connect_error());
}

$sql = "SELECT * FROM posts";
$result = mysqli_query($con, $sql);
$blogsPerPage = 9;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $blogsPerPage;

// Query to retrieve a subset of blog posts for the current page
$sql = "SELECT * FROM posts LIMIT $offset, $blogsPerPage";
$result = mysqli_query($con, $sql);


if ($result === false) {
  die("Error executing the query: " . mysqli_error($con));
}


// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
  // Display images
  
      // echo "<img src='" . $data['image'] . "' alt='Image'>";
      // echo "<h2> ".$data['title'] ." </h2>";
     
       echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ' class='mt-8' id='blog'>";
       while ($row = mysqli_fetch_assoc($result)) {
           
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
                      
                        
                        echo "<button onclick='likePost(".$row['id'].")' class='btn btn-sm btn-outline-primary'style='margin-top:20px;'><i class='fas fa-thumbs-up fa-lg'></i></button>";
                        echo "<span style='margin-left:2px;' id='likeCount_" . $row['id'] . "'>" . $row['likes'] . "</span>";
                         echo "<button onclick='dislikePost(".$row['id'].")' class='btn btn-sm btn-outline-primary'style='margin-top:20px;margin-left:10px;'><i class='fas fa-thumbs-down fa-lg'></i></button>";
                         echo "<span style='margin-left:2px;' id='dislikeCount_" . $row['id'] . "'>" . $row['dislikes'] . "</span>";
    
                                                            
                    echo  "</div>";
               echo  "</div>";
           echo  "</div>";
          
           
       }
       echo  "</div>";
       echo  "</div>";
       echo  "</div>";

       
$result = mysqli_query($con, $sql);
if ($result && mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='modal fade' id='confirmModal".$row['id']."' tabindex='-1' aria-labelledby='confirmModalLabel".$row['id']."' aria-hidden='true'>";
    echo "<div class='modal-dialog'>";
    echo "<div class='modal-content'>";
    echo "<div class='modal-header'>";
    echo "<h5 class='modal-title' id='confirmModalLabel".$row['id']."'>Confirm Deletion</h5>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
    echo "</div>";
    echo "<div class='modal-body'>";
    echo "Are you sure you want to delete this post?";
    echo "</div>";
    echo "<div class='modal-footer'>";
    echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>";
    echo "<form action='delete.php' method='POST' id='deleteForm" . $row['id'] . "'>";
    echo "<input type='hidden' name='post_id' value='" . $row['id'] . "'>";
    echo "<button type='submit' class='btn btn-danger'>Delete</button>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
}


       
}else {
  echo "No images found";
}
echo "<div class='container'>";
    echo "<ul class='pagination justify-content-center'>";
        
        // Query to get total number of blog posts
        $sql = "SELECT COUNT(*) AS total FROM posts";
        $result = mysqli_query($con, $sql);
        $totalRows = mysqli_fetch_assoc($result)['total'];
        $totalPages = ceil($totalRows / $blogsPerPage);

        // Display pagination links
        for ($i = 1; $i <= $totalPages; $i++) {
            echo "<li class='page-item'><a class='page-link' href='display.php?page=$i'>$i</a></li>";
        }
        
    echo "</ul>";
echo "</div>";

mysqli_close($con);
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function likePost(postId) {
        // Send AJAX request to like_post.php
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
              document.getElementById("likeCount_" + postId).innerHTML = this.responseText;
            }
        };
        xhr.open("POST", "like_post.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("post_id=" + postId);
    }

    function dislikePost(postId) {
        // Send AJAX request to dislike_post.php
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
              document.getElementById("dislikeCount_" + postId).innerHTML = this.responseText;
            }
        };
        xhr.open("POST", "dislike_post.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("post_id=" + postId);
    }
</script>







    

</body>
</html>


