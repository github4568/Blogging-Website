<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style="background-image: url('http://localhost/java/blog%20submission4.jpeg') ;background-size: cover;">
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
    <div >
    <h2 class="mt-5 mb-4" style="text-align: center;margin-bottom: 5px; font-size: 50px; ">LOGIN</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style=" border-radius:12px;
			height: 350px; 
			width: 310px; 
			border: 3px solid black; 
			margin: auto; 
			margin-top: 12px;
      background-color: rgba(197, 225, 236, 0.973);">
        <label for="username" style="margin-top: 15px;margin-left: 15px;font-size: 20px;font-family: Verdana, Geneva, Tahoma, sans-serif;"><i style="color:red;">*</i>Username:</label><br>
        <input type="text" id="username" name="username" style="margin-top: 10px;margin-left: 15px;font-size: 20px;border: 1px solid black;" required><br><br>
        <label for="password" style="margin-top: 15px;margin-left: 15px;font-size: 20px; font-family: Verdana, Geneva, Tahoma, sans-serif;"><i style="color:red;">*</i>Password:</label><br>
        <input type="password" id="password" name="password" style="margin-top: 10px;margin-left: 15px;font-size: 20px;border: 1px solid black;" required><br><br>
        <input type="submit" value="Login" style="margin-top: 15px;margin-left: 15px;font-size: 20px; border: 1px solid black;">
        
    </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>

<?php
session_start();

// Check if user is already logged in, if yes, redirect to dashboard
// if (isset($_SESSION['username'])) {
//     header("Location: dashboard.html");
//     exit;
// }

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if user credentials are valid (for simplicity, read from file)
    $file = 'users.txt';
    $users = file($file, FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($stored_username, $stored_password) = explode(':', $user);
        if ($username == $stored_username && $password == $stored_password) {
            // User authenticated, store username in session
            $_SESSION['username'] = $username;
            // Redirect to dashboard page
            header("Location: http://localhost/mysql/Blogsubmission.html");
            exit;
        }
    }

    // Authentication failed, redirect to registration page
    header("Location: http://localhost/mysql/registration.php");
    
    exit;
}
?>
