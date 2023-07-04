<?php
// //Insert page header
$page_title = 'Sign-Up';
require_once('./header.php');
//Connection & application variables
// require_once('includes/appvars.php');
// require_once('connectvars.php');
// require_once('verification.php');


if (isset($_POST['submit'])) {
    require_once('connectvars.php');

    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $fname = mysqli_real_escape_string($conn, trim($_POST['fname']));
    $lname = mysqli_real_escape_string($conn, trim($_POST['lname']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $client = mysqli_real_escape_string($conn, trim($_POST['client']));
    $password1 = mysqli_real_escape_string($conn, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($conn, trim($_POST['password2']));

    //Regex
    $phregex = '/^\(?[2-9]\d{2}\)?[-\.\s]?\d{3}[-\.\s]?\d{4}([-\.\s]\d{4})?$/';
    $emregex = '/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/';
    $pwregex = '/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/';
    $domain = preg_replace($emregex, '', $email);
    $uppercase = preg_match('@[A-Z]@', $password1);
    $lowercase = preg_match('@[a-z]@', $password1);
    $number    = preg_match('@[0-9]@', $password1);

        //Encryption - will look further into
        // $options = ['cost' => 10,];
        //
        // $hash1 = password_hash($password1, PASSWORD_ARGON2I);
        // $hash2 = password_hash($password2, PASSWORD_ARGON2I);
        //
        // $newpw1 = password_verify($password1, $hash1);
        // $newpw2 = password_verify($password2, $hash2);

        //Encryption - will look further into
        //if ($hash1 == $hash2) {
        // if ($password1 == $password2) {
        //     echo '<br>PW matches - valid ';
        //     echo '<br> h1 ' . $hash1 . '<br> h2 ' . $hash2;
        //     echo '<br> np1 ' . $newpw1 . '<br> np2 ' . $newpw2;
        //     echo '<br> pw1 ' . $password1 . '<br> pw2 ' . $password2;
        // }
        // else {
        //     echo '<br><br>PW doesnt match - invalid ';
        //     echo '<br> h1 ' . $hash1 . '<br> h2 ' . $hash2;
        //     echo '<br> np1 ' . $newpw1 . '<br> np2 ' . $newpw2;
        //     echo '<br> pw1 ' . $password1 . '<br> pw2 ' . $password2;
        //}



    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
        //verify phone and email format
        if ((preg_match($phregex, $phone) || (preg_match($emregex, $email)))) {
            if ($uppercase && $lowercase && $number && strlen($password1) >= 4) {
                // Make sure someone isn't already registered using this username
                $query = "SELECT * FROM users WHERE username = '$username'";
                $data = mysqli_query($conn, $query);
                
                if (mysqli_num_rows($data) == 0) {
                    // The username is unique, so insert the data into the database
                    //$queryI = "INSERT INTO users VALUES (0, '$client', '$username', '$fname', '$lname', '$email', '$phone', SHA('$hash1'), NOW())";
                    $queryI = "INSERT INTO users VALUES (0, '$client', '$username', '$fname', '$lname', '$email', '$phone', SHA('$password1'), NOW())";
                    mysqli_query($conn, $queryI)
                            or die('Error querying database for Insert.' . mysqli_error($conn));

                    // Confirm success with the user
                    echo '<p>Your new account has been successfully created. You\'re now ready to <a href="..login.php">login</a> and edit your profile.</p>';

                    mysqli_close($conn);
                    exit();
                }
                else {
                    // An account already exists for this username, so display an error message
                    echo '<p class="error">An account already exists for this username. Please use a different username.</p>';
                    $username = "";
                }
            }
            else {
                echo '<p class="error">Your password must be 8 characters and include each of the following (uppercase, lowercase, and number).</p>';
            }
        }
        else {
            if (!preg_match($phregex, $phone)) {
                echo '<p class="error">Please enter a valid phone number.</p>';
            }
            if (!preg_match($emregex, $email)) {
                echo '<p class="error">Please enter a valid email address.</p>';
            }
            if (!checkdnsrr($domain)) {
                echo '<p class="error">Email domain is invalid, please correct.</p>';
            }
            else {
                echo '<p class="error">Please chk email or phn. - Shouldnt get this msg</p>';
            }
        }
    }
    else {
        if ($password1 != $password2) {
            echo '<p class="error">Your password entries did not match.  Please try again.</p>';
        }
        else {
            echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
        }
    }
    mysqli_close($conn);
}

?>