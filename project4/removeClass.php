<?php
    //Start session
    require_once('includes/startsession.php');
    require_once('includes/connectvars.php');
    //Insert page header
    $page_title = 'Remove Class';
    require_once('includes/header.php');
    require_once('includes/navmenu.php');


    //If user isn't logged in, try to log them in
    if (isset($_SESSION['user_id'])) { //changed from cookie
        //Check to see if all 3 fields previously set
        if (isset($_GET['entryid']) && ($_GET['cldatestr']) && ($_GET['clname'])) {
            // Grab the class data from the GET
            $entryid = $_GET['entryid'];
            $cldatestr = $_GET['cldatestr'];
            $clname = $_GET['clname'];
        }
        else if (isset($_POST['entryid']) && isset($_POST['cldatestr']) && isset($_POST['clname'])) { //This is POST (not GET)
          // Grab the score data from the POST
          $entryid = $_POST['entryid'];
          $cldatestr = $_POST['cldatestr'];
          $clname = $_POST['clname'];
        }
        else {
            echo '<p class="error">Sorry, no class was specified for removal.</p>';
        }

        //If already submitted
        if (isset($_POST['submit'])) {
            if ($_POST['confirm'] == 'Yes') {
                // Connect to the database
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or die('Error connecting to MySQL server.');

                // Delete the blog data from the database
                $query = "DELETE FROM classes WHERE entryid = $entryid LIMIT 1";
                mysqli_query($dbc, $query)
                        or die('Error querying database.');
                mysqli_close($dbc);

                // Confirm success with the user
                echo "<p>The class $clname was successfully removed.";
            }
            else if ($_POST['confirm'] == 'No') {
                echo '<p class="error">Class was not removed.</p>';
            }
            else {
                echo '<p class="error">Sorry, there was a problem removing the class.</p>';
            }
        }
        //Check to see if all 5 fields previously set - Show confirmation page
        else if (isset($entryid) && isset($cldatestr) && isset($clname)) {
            echo '<p>Are you sure you want to remove the following class?</p>';
            echo '<p><strong>Class Name: </strong>' . $clname . '<br /><strong>Class Date: </strong>' . $cldatestr . '</p>';
            echo '<form method="post" action="removeClass.php">';
            echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
            echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
            echo '<input type="submit" value="Submit" name="submit" />';
            echo '<input type="hidden" name="entryid" value="' . $entryid . '" />';
            echo '<input type="hidden" name="cldatestr" value="' . $cldatestr . '" />';
            echo '<input type="hidden" name="clname" value="' . $clname. '" />';
            echo '</form>';
        }

        echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
    }
    //Insert Footer
    require_once('footer.php');
?>
