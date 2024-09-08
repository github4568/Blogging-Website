<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Store user data in a file (for simplicity, you can use a database in a real-world scenario)
    $file = 'users.txt';
    $data = "$username:$password\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    // Redirect to login page after registration
    header("Location: http://localhost/mysql/login.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script>
		window.onload = function() {
		  alert("Unregistered User. Please Register First!!");
		};
	  </script>

  </head>
  <body style="background-image: url('http://localhost/java/blog%20submission10.jpeg') ;background-size: cover;">
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
          <form class="d-flex" action="search.php" method="POST">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>    
    <!-- <div class="alert alert-danger d-flex align-items-center" role="alert" style="height: 50px;">
  <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:" style="height: 50px;">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    Please Register First!!
  </div>
</div>  -->

    <h2 class="mt-4 mb-4" style="text-align: center;margin-bottom: 5px; font-size: 50px;">REGISTRATION</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style=" border-radius:12px;
			height: 430px; 
			width: 350px; 
			border: 3px solid black; 
			margin: auto; 
			margin-top: 12px; background-color: rgba(247,243,230,0.89);">
        <label for="username" style="margin-top: 15px;margin-left: 15px;font-size: 20px;font-family: Verdana, Geneva, Tahoma, sans-serif;"><i style="color:red;">*</i>Username:</label><br>
        <input type="text" id="username" name="username" style="margin-top: 10px;margin-left: 15px;font-size: 20px;" required><br><br>
        <label for="password" style="margin-top: 15px;margin-left: 15px;font-size: 20px;font-family: Verdana, Geneva, Tahoma, sans-serif;"><i style="color:red;">*</i>Password:</label><br>
        <input type="password" id="password" name="password"  style="margin-top: 15px;margin-left: 15px;font-size: 20px;" required><br><br>
        <label for="password" style="margin-top: 15px;margin-left: 15px;font-size: 20px;font-family: Verdana, Geneva, Tahoma, sans-serif;"><i style="color:red;">*</i>Confirm Password:</label><br>
        <input type="password" id="password" name="password"  style="margin-top: 15px;margin-left: 15px;font-size: 20px;" required><br><br>
        <input type="submit" value="Register"  style="margin-top: 15px;margin-left: 15px;font-size: 20px; font-family: Verdana, Geneva, Tahoma, sans-serif;">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>

<!-- <?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Store user data in a file (for simplicity, you can use a database in a real-world scenario)
    $file = 'users.txt';
    $data = "$username:$password\n";
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);
    // Redirect to login page after registration
    header("Location: http://localhost/java/login.php");
    exit;
}
?> -->
