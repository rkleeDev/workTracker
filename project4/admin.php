
<?php
//Start session
require_once('includes/startsession.php');
$page_title = 'Admin';
require_once('includes/connectvars.php');
require_once('includes/header.php');
// require_once('includes/navmenu.php');

    //Clear the error Message
    $error_msg = "";


    //If user isn't logged in, try to log them in
    if (!isset($_SESSION['user_id']) && isset($_POST['submit'])) {  //changed from $_COOKIE to $_SESSION
        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to MySQL server.');

        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $password = mysqli_real_escape_string($dbc, trim($_POST['password']));

        if (!empty($username) && !empty($password)) {
        // Look up the username and password in the database
        $query = "SELECT user_id, username FROM users WHERE username = '$username' AND password = SHA('$password')";
        $data = mysqli_query($dbc, $query)
                or die('Error querying database.' . $query . ' - ' . mysqli_error($dbc));

            if (mysqli_num_rows($data) == 1) {
                // The log-in is OK so set the user ID and username variables
                $row = mysqli_fetch_array($data);
                $_SESSION['user_id'] = $row['user_id'];     //Set session & cookies for both
                $_SESSION['username'] = $row['username'];
                setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));  //sec*min*hrs*days - expires in 30 days      //Initially, only used w/ Cookies
                setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));    //Only used w/ Cookies
                $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin.php';
                header('Location: ' . $home_url);
                exit();
            }
            else {
                //The username/password are incorrect so set an error message
                $error_msg = 'Sorry, you must enter a valid username and password to log in.';
            }
        }
        else {
            $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
    }

    //If cookie is empty, show any error messages and login form, otherwise confirm Login
    if (empty($_SESSION['user_id'])) {
        echo '<p class="error">' . $error_msg . '</p>';

    ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
        <legend>Log In</legend>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" /><br />
        </fieldset>
            <input type="submit" value="Log In" name="submit" />
        </form>
    <?php
    }
    else {
        // Confirm the successful log-in
        //echo('<p class="login">You are logged in as ' . $username . '.</p>'); //used w/ HTTP
        echo '<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>';

        // Connect to the database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                or die('Error connecting to MySQL server.');

        // Retrieve the blog data from MySQL
        $query = "SELECT * FROM classes where clapproved = 0 ORDER BY entryid DESC";
        $data = mysqli_query($dbc, $query)
                or die('-Error querying database.' . $query . ' - ' . mysqli_error($dbc));
        $smCol = '<div class="col-sm">';
        $closeDiv = '</div>';
                // Loop through the array of user data, formatting it as HTML
                echo '<h4>Top 10 Recent Classes Entered:</h4>';
                echo '<div class="container">';
                echo '<table class="table table-striped">';
                echo '<div class="row">';
                    echo $smCol;
                        echo '<tr><th>Class Name</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Class ID</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Type</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Cost</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Max Cap</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>How to Register</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Facility</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Addresss1</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Address2</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Phone Number</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Class Date</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Class Time</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Class Date2</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Class Time2</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Description</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Date Added/Updated</th>';
                    echo $closeDiv;
                    echo $smCol;
                        echo '<th>Action</th>';
                    echo $closeDiv;
                    echo '</tr></div>';
                echo $closeDiv;
                echo $closeDiv;

            while ($row = mysqli_fetch_array($data)) {
            $stcldatestr = $row['cldatestr'];
            $cldatestr = date("m-d-Y", strtotime($stcldatestr));

            echo '<tr><td>' . $row['clname'] . "</td><td>" . $row['clid'] . "</td><td>" . $row['cltype']
            . "</td><td>" . $row['clcostrg1']
            . "</td><td>" . $row['clmax'] . "</td><td>" . $row['clreghow'] . "</td><td>" . $row['clhiname']
            . "</td><td>" . $row['claddress1'] . "</td><td>" . $row['claddress2'] . "</td><td>" . $row['clphone']
            . "</td><td>" . $row['cldatestr'] . "</td><td>" . $row['cltimestr']
            . "</td><td>" . $row['cldatest02'] . "</td><td>" . $row['cltimest02'] . "</td><td>" . $row['cldesc']
            . "</td><td>" . $row['cldatead'] . "</td>" .
            '<td><a href="removeClass.php?entryid=' . $row['entryid'] . '&amp;cldatestr=' . $cldatestr .
                    '&amp;clname=' . $row['clname'] . '">Remove</a>';
            if ($row['clapproved'] == '0') {
                echo ' / <a href="approveClass.php?entryid=' . $row['entryid'] . '&amp;cldatestr=' . $cldatestr .
                        '&amp;clname=' . $row['clname'] . '">Approve</a>';
            }
            echo '</td></tr>';
        }
        echo '</table>';
        echo $closeDiv;

        mysqli_close($dbc);
    }
    //Insert Footer
    require_once('footer.php');
?>
