<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    // If the session vars aren't set, try to set them with a cookie
    if (!isset($_SESSION['user_id'])) {
        if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
            $_SESSION['user_id'] = $_COOKIE['user_id'];   //Using both Session & cookies
            $_SESSION['username'] = $_COOKIE['username'];
            $_SESSION['error'] = $_COOKIE['error'];
        }

    }
    

?>
