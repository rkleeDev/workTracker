<?php
    // Define database connection constants
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'hgdb');


    // Connect to the database
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if(!$conn) {
        die('Error connecting to MySQL server.');
    }
    // echo "Connection successful";
    // mysqli_close($conn);
?>
