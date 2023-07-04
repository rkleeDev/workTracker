<?php
    //Start session
    require_once('includes/startsession.php');
    require_once('includes/connectvars.php');
    //Insert page header
    $page_title = 'Approve Class';
    require_once('includes/header.php');
    // require_once('includes/navmenu.php');

    //If user isn't logged in, try to log them in
    if (isset($_SESSION['user_id'])) { //changed from cookie
        //Check to see if all 3 fields previously set
        //echo $_GET['entryid'] . $_GET['cldatestr']  . $_GET['clname'];
        if (isset($_GET['entryid']) && ($_GET['cldatestr']) && ($_GET['clname'])) {
            // Grab the class data from the GET
            $entryid = $_GET['entryid'];
            $cldatestr = $_GET['cldatestr'];
            $clname = $_GET['clname'];
        }
        else if (isset($_POST['entryid']) && isset($_POST['cldatestr']) && isset($_POST['clname'])) { //This is POST (not GET)
          $entryid = $_POST['entryid'];
          $cldatestr = $_POST['cldatestr'];
          $clname = $_POST['clname'];
        }
        else {
            echo '<p class="error">Sorry, no class was specified for approval.</p>';
        }

        if (isset($_POST['submit'])) {
            if ($_POST['confirm'] == 'Yes') {
                // Connect to the database
                $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
                        or die('Error connecting to MySQL server.');

                // Approve the class by setting the approved column in the database
                $query = "UPDATE classes SET clapproved = 1 WHERE entryid = $entryid LIMIT 1";
                mysqli_query($dbc, $query)
                        or die('Error querying database.');
                mysqli_close($dbc);

                // Confirm success with the user
                echo "<p>The class of $clname was successfully approved.";
            }
            else if ($_POST['confirm'] == 'No') {
                echo '<p class="error">Class was not approved.</p>';
            }
            else {
                echo '<p class="error">Sorry, there was a problem approving the class.</p>';
            }
        }
        else if (isset($entryid) && isset($cldatestr) && isset($clname)) {
        //else if (isset($id)) {
            echo '<p>Are you sure you want to approve the following class?</p>';
            echo '<p><strong>Class Name: </strong>' . $clname . '<br /><strong>Class Date: </strong>' . $cldatestr . '</p>';
            echo '<form method="post" action="approveClass.php">';
            echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
            echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br />';
            echo '<input type="submit" value="Submit" name="submit" />';
            echo '<input type="hidden" name="entryid" value="' . $entryid . '" />';
            echo '<input type="hidden" name="cldatestr" value="' . $cldatestr . '" />';
            echo '<input type="hidden" name="clname" value="' . $clname. '" />';
            echo '</form>';
        }
    }

    echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';

    //Insert Footer
    require_once('footer.php');
?>
