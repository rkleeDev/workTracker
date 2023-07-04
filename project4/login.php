<?php
    //Start session
    require_once('includes/startsession.php');
    $page_title = 'Login';
    require_once('includes/header.php');

    // print_r($_SESSION); echo "</br>";echo "</br>cookie";
    // print_r($_COOKIE);echo "</br>";echo "</br>server";
    // print_r($_SERVER);echo "</br>";echo "</br>session";

    //Clear the error Message
    $error_msg = "";
    

    //If user isn't logged in, try to log them in
    if (!isset($_SESSION['user_id']) && isset($_POST['submit'])) {  //changed from $_COOKIE to $_SESSION
        // Connect to the database
        echo "connecting to db";
        require_once('includes/connectvars.php');
        // $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
        //         or die('Error connecting to MySQL server.');
        echo "connected";
        $username = mysqli_real_escape_string($conn, trim($_POST['username']));
        $password = mysqli_real_escape_string($conn, trim($_POST['password']));
        
        //Encryption - will look further into
        // $options = ['cost' => 10,];
        // $hash = password_hash($password, PASSWORD_ARGON2I);
        // $shaHash
        //$newpw = password_verify($password, $hash);

        $_SESSION['error'] = $error;
        if (!empty($username) && !empty($password)) {
            // Look up the username and password in the database
            $query = "SELECT user_id, username FROM users WHERE username = '$username' AND userpw = SHA('$password')";
            //$query = "SELECT user_id, username FROM users WHERE username = '$username' AND userpw = SHA('$hash')";
            $_SESSION['query'] = $query;
            // echo $query;
            $data = mysqli_query($conn, $query)
                    or die('Error querying database.' . mysqli_error($conn));
            $result = mysqli_num_rows($data);
            $row_cnt = $result;

            //if (password_verify($password, $hash)) {
            if (mysqli_num_rows($data) == 1) {
            //     echo '<br>PW matches - valid ';
            //     echo '<br> h ' . $hash;
            //     echo '<br> pw ' . $password;
            //     echo '<br> result ' . $row_cnt;
            // }
            // else {
            //     echo '<br>PW doesnt match - invalid ';
            //     echo '<br> h ' . $hash;
            //     echo '<br> pw ' . $password;
            //     echo '<br> result ' . $row_cnt;
            // }

                // The log-in is OK so set the user ID and username variables
                $row = mysqli_fetch_array($data);
                //$user_id = $row['user_id']; //Only used w/ HTTP auth
                //$username = $row['username']; //Only used w/ HTTP auth
                //$_COOKIE['user_id'] = $row['user_id'];  //only needed for Cookies
                //$_COOKIE['username'] = $row['username'];    //only needed for Cookies
                $_SESSION['user_id'] = $row['user_id'];     //Set session & cookies for both
                $_SESSION['username'] = $row['username'];
                setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));  //sec*min*hrs*days - expires in 30 days      //Initially, only used w/ Cookies
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));    //Only used w/ Cookies
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
                // header('Location: ' . $home_url);
                echo "Before succ login";
                header("Location: index.php?success=loggedIn");
                exit();
            }

            else {
                //Encryption - will look further into
                // if (password_verify($password, $hash)) {
                //     echo '<br>PW matches2 - valid ';
                //     echo '<br> h' . $hash;
                //     echo '<br> pw' . $password;
                // }
                // else {
                //     echo '<br>PW doesnt match2 - invalid ';
                //     echo '<br> h' . $hash;
                //     echo '<br> np' . $newpw;
                //     echo '<br> pw' . $password;
                // }
                //The username/password are incorrect so set an error message
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        }
        else {
            $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
    }
?>
<div>
<?php
    // print_r($_SESSION);
    // print_r($_COOKIE);
    if (isset($_SESSION['error'])) {
        echo $_SESSION['error'];
        echo $_SESSION['query'];
        // print_r($_SESSION);
    }
?>

</div>
<?php
    //If cookie is empty, show any error messages and login form, otherwise confirm Login
    if (empty($_SESSION['user_id'])) {
        echo '<p class="error">' . $error_msg . '</p>';
    

?>

<div>
    <!-- <form method="post" action="<php echo $_SERVER['PHP_SELF']; ?>"> -->
    <form method="post" action="login.php">
        <fieldset>
        <legend></legend>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" /><br />
        </fieldset>
            <input type="submit" value="Log In" name="submit" />
    </form>
</div>

<?php
    }
    else {
        // Confirm the successful log-in
        $error = '<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>';
        // $_SESSION['error'] = $error;
        header("Location: index.php?success=loggedIn");
        exit();
    }
    //Insert Footer
    require_once('includes/footer.php');
?>