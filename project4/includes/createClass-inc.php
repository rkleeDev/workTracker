<?php
//Start session
require_once('startsession.php');
//Insert page header
$page_title = 'Add a Class';
require_once('header.php');
//Connection & application variables
// //require_once('appvars.php');
// require_once('connectvars.php');
// //Insert Navigation menu
// require_once('navmenu.php');


    //If submitted previously
    if (isset($_POST['submit'])) {
        require_once('connectvars.php');

        // Grab the profile data from the POST
        $clname = mysqli_real_escape_string($conn, trim($_POST['clname']));
        $clexist = mysqli_real_escape_string($conn, trim($_POST['clexist']));
        $clid = mysqli_real_escape_string($conn, trim($_POST['clid']));
        $cltype = mysqli_real_escape_string($conn, trim($_POST['cltype']));
        $clsubtype = mysqli_real_escape_string($conn, trim($_POST['clsubtype']));
        $clformat = mysqli_real_escape_string($conn, trim($_POST['clformat']));

        $clcostrg1 = mysqli_real_escape_string($conn, trim($_POST['clcostrg1']));
        $clmax = mysqli_real_escape_string($conn, trim($_POST['clmax']));
        $clreghow = mysqli_real_escape_string($conn, trim($_POST['clreghow']));
        $cldesc = mysqli_real_escape_string($conn, trim($_POST['cldesc']));
        $clhiname = mysqli_real_escape_string($conn, trim($_POST['clhiname']));
        $claddress1 = mysqli_real_escape_string($conn, trim($_POST['claddress1']));
        $claddress2 = mysqli_real_escape_string($conn, trim($_POST['claddress2']));
        $clcity = mysqli_real_escape_string($conn, trim($_POST['clcity']));

        $clstate = mysqli_real_escape_string($conn, trim($_POST['clstate']));
        $clzip = mysqli_real_escape_string($conn, trim($_POST['clzip']));
        $clphone = mysqli_real_escape_string($conn, trim($_POST['clphone']));
        //$cldatead = mysqli_real_escape_string($conn, trim($_POST['cldatead']));
        $cldatestr = mysqli_real_escape_string($conn, trim($_POST['cldatestr']));
        $cltimestr = mysqli_real_escape_string($conn, trim($_POST['cltimestr']));
        $cltimeend = mysqli_real_escape_string($conn, trim($_POST['cltimeend']));
        /*
        $cldatest02 = mysqli_real_escape_string($conn, trim($_POST['cldatest02']));
        $cltimest02 = mysqli_real_escape_string($conn, trim($_POST['cltimest02']));
        $cltimeen02 = mysqli_real_escape_string($conn, trim($_POST['cltimeen02']));
        */


        if (!empty($clname) && !empty($cltype)) {
            $query = "INSERT INTO classes VALUES (0, '$clname', $clexist, '$clid'," .
                    " '$cltype', '$clsubtype', '$clformat', $clcostrg1, $clmax, '$clreghow', '$cldesc'," .
                    " '$clhiname', '$claddress1', '$claddress2', '$clcity', '$clstate'," .
                    " $clzip, '$clphone', NOW(), '$cldatestr', '$cltimestr', '$cltimeend', NULL, '', '', 0)";
                    /*" $clzip, '$clphone', NOW(), '$cldatestr', '$cltimestr', '$cltimeend', '$cldatest02', '$cltimest02', '$cltimeen02', 0)";*/

            $data = mysqli_query($conn, $query)
                    or die('Error querying database for Insert.' . mysqli_error($conn));
            // Confirm success with the user
            echo '<p>Thank you for adding your class. Please visit to view the <a href="../index.php">most recently added classes</a>.</p>';

            mysqli_close($conn);
            exit();
        }
        else {
            $error = '<p class="error">You must enter all of the class information.</p>';
            $_SESSION['error'] = $error;  
            setcookie('error', $error, time() + (60 * 60 * 24 * 30));    //Only used w/ Cookies
            header("Location: ../createClass.php?error=missingFields&clmax=$clmax");
            // echo '<p class="error">You must enter all of the class information.</p>';
            exit();
        }
    }
    // mysqli_close($conn);
?>