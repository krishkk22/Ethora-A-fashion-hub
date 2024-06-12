<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>The Fitness Store | Registration Form</title>
    <link rel="stylesheet" href="../assets/css/login.css"/>
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.jpg"><!-- Favicon / Icon -->
</head>
<body>
<?php
// Include the database connection file
require('db.php');

// When form submitted, insert values into the database.
if (isset($_POST['submit'])) {
    // Sanitize and validate user inputs
    $name = pg_escape_string($con, $_POST['name']);
    $username = pg_escape_string($con, $_POST['username']);
    $email = pg_escape_string($con, $_POST['email']);
    $password = md5(pg_escape_string($con, $_POST['password'])); // Use MD5 hashing for passwords
    $create_datetime = date("Y-m-d H:i:s");

    // Insert user data into the database
    $query = "INSERT INTO users (name, username, email, password, create_datetime)
              VALUES ('$name', '$username','$email', '$password', '$create_datetime')";
    $result = pg_query($con, $query);

    if ($result) {
        // Registration successful, redirect to login page
        echo "<script>
                alert('You are registered successfully.');
                window.location.href = 'login.php';
              </script>";
        exit();
    } else {
        // Error handling
        echo "<div class='form'>
                <h3>Error: Unable to register.</h3><br/>
                <p class='link'>Click here to <a href='registration.php'>try registration again</a>.</p>
              </div>";
    }
}
?>
<form class="form" action="" method="post">
    <center>
        <img src="../assets/images/logo.jpg" alt="" class="img img-fluid">
    </center>
    <hr />
    <h1 class="login-title">Registration</h1>
    <input type="text" class="login-input" name="name" placeholder="Name" required />
    <input type="text" class="login-input" name="username" placeholder="Username" required />
    <input type="text" class="login-input" name="email" placeholder="Email Address" required>
    <input type="password" class="login-input" name="password" placeholder="Password" required>
    <input type="submit" name="submit" value="Register" class="login-button">
    <p class="link">Already have an account? <a href="login.php">Login here!</a></p>
</form>
</body>
</html>
