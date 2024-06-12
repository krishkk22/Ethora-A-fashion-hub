<?php
require('db.php'); 
require_once 'google-client/vendor/autoload.php';
session_start();

// Verify the ID token and get the user data from Google
$id_token = $_POST['id_token'];
$client = new Google_Client(['client_id' => '838321752460-6ah497tdpkbekj7lfj5so48suaqhu1e7.apps.googleusercontent.com']);
$payload = $client->verifyIdToken($id_token);
if ($payload) {
    $email = $payload['email'];
    $username = $payload['name'];
    
    // Check if the user exists in the database
    $query = "SELECT * FROM users WHERE email=$1";
    $result = pg_query_params($con, $query, array($email));
    $rows = pg_num_rows($result);
    if ($rows == 0) {
        // Insert the user into the database
        $query = "INSERT INTO users (name, username, email, create_datetime) VALUES ($1, $2, $3, CURRENT_TIMESTAMP)";
        pg_query_params($con, $query, array($username, $username, $email));
    }
    
    // Set the user session
    $_SESSION['username'] = $username;
    
    echo 'success';
} else {
    echo 'error';
}
?>
