
<?php
// Generate the navigation menu
if (isset($_SESSION['username'])) {  //changed from Cookie
    echo '<a href="../index.php">Home Page</a> &#9997; ';
    echo '<a href="./createClass.php">Create a Class</a> &#9997; ';
    echo '<a href="./admin.php">Admin Page</a> &#9997; ';
    echo '<a href="./logout.php">Log Out (' . $_SESSION['username'] . ')</a>'; //changed from cookie
}
else {
    echo '<a href="../index.php">Home Page</a> &#9997; ';
    echo '<a href="login.php">Login</a> &#9997; ';
    echo '<a href="signup.php">Signup</a> &#9997; ';
}
echo '<hr>';
?>
