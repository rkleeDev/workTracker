<?php
    //Start session
    require_once('includes/startsession.php');
    //Insert page header
    $page_title = 'Home';
    require_once('includes/header.php');
    //Connection & application variables
    //require_once('appvars.php');
    require_once('includes/connectvars.php');
    //Insert Navigation menu
    // require_once('includes/navmenu.php');

    // Connect to the database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
            or die('Error connecting to MySQL server.');
    // Retrieve the user data from MySQL
    $query = "SELECT * FROM classes WHERE entryid IS NOT NULL ORDER BY entryid DESC LIMIT 10";
    $data = mysqli_query($dbc, $query)
            or die('Error querying database.' . $query . ' - ' . mysqli_error($dbc));

    // Loop through the array of user data, formatting it as HTML
    echo '<h4>Top 10 Recent Classes Entered:</h4>';
    echo '<div class="container">';
    echo '<table class="table table-striped">';
            echo '<div class="row">';
                echo '<div class="col-sm">';
                    echo '<tr><th>Class Name</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Class ID</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Type</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Cost</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Max Cap</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>How to Register</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Facility</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Addresss1</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Address2</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Phone Number</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Class Date</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Class Time</th>';
                echo '</div>';
                /*
                echo '<div class="col-sm">';
                    echo '<th>Class Date2</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Class Time2</th>';
                echo '</div>';
                */
                echo '<div class="col-sm">';
                    echo '<th>Description</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Date Added/Updated</th>';
                echo '</div>';
                echo '<div class="col-sm">';
                    echo '<th>Approved?</th>';
                echo '</div>';

                echo '</tr></div>';
            echo '</div>';
        //echo '</div>';
    while ($row = mysqli_fetch_array($data)) {
        echo '<tr><td>' . $row['clname'] . "</td><td>" . $row['clid'] . "</td><td>" . $row['cltype']
        . "</td><td>" . $row['clcostrg1']
        . "</td><td>" . $row['clmax'] . "</td><td>" . $row['clreghow'] . "</td><td>" . $row['clhiname']
        . "</td><td>" . $row['claddress1'] . "</td><td>" . $row['claddress2'] . "</td><td>" . $row['clphone']
        . "</td><td>" . $row['cldatestr'] . "</td><td>" . $row['cltimestr']
        /*. "</td><td>" . $row['cldatest02'] . "</td><td>" . $row['cltimest02'] */ . "</td><td>" . $row['cldesc'] 
        . "</td><td>" . $row['cldatead'] . "</td>";
        if ($row['clapproved'] == 0) {
            echo '<td>Needs Approving';
        }
        echo "</td></tr>";
    }
    echo '</table>';


    mysqli_close($dbc);
    //Insert Footer
    require_once('footer.php');
?>
