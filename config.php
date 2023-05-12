<?php
// Database credentials
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'your-username');
define('DB_PASSWORD', 'your-password');
define('DB_NAME', 'your-database-name');

// Create database connection
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
