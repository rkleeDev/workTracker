<?php
//Start session
// require_once('includes/startsession.php');
$page_title = 'Logout';
require_once('includes/header.php');

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    //Delete the session vars by clearing the $_SESSION array
    $_SESSION = array(); //setting to empty array
    // $_COOKIE = array(); //setting to empty array

    //Delete the session cookie by setting its expiration to the past
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600);
    }

//Destroy the session
session_destroy();
}


$_SESSION = array(); //setting to empty array
// $_COOKIE = array(); //setting to empty array

//Delete the UserID & username Cookies by setting expiration date
setcookie('user_id', '', time() - 3600);        //Initially, only used w/ Cookies
setcookie('username', '', time() - 3600);

//Delete any cookies associated w/ SessionId
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600);
}

// //Destroy the session
// session_destroy();

// Redirect to the home page
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
// header('Location: ' . $home_url);

// print_r($_SESSION); echo "</br>";echo "</br>";
// print_r($_COOKIE);echo "</br>";echo "</br>";
// print_r($_SERVER);echo "</br>";echo "</br>";
// header("Location: index.php?success=loggedOut");
header("Refresh:5; url=index.php?success=loggedOut");
exit("You have been successfully logged out. - This page will redirect in a few seconds");


//Insert Footer
require_once('includes/footer.php');
?>
