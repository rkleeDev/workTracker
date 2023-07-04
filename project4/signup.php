<?php
    //Insert page header
    $page_title = 'Sign-Up';
    require_once('includes/header.php');
    // require_once('includes/signup-inc.php');
?>

<div>
  <p>Please enter your information to sign up to add your classes.</p>
        <!-- <form method="post" action="
        <php echo $_SERVER['PHP_SELF']; ?>"> -->
        <form action="includes/signup-inc.php" method="post" >
        <fieldset>
        <legend>Registration Info</legend>
            <label for="client">Client:</label>
            <input type="text" id="client" name="client" value="
                <?php if (!empty($client)) echo $client; ?>" /><br />
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" value="<?php if (!empty($fname)) echo $fname; ?>" /><br />
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" value="<?php if (!empty($lname)) echo $lname; ?>" /><br />
            <label for="email">Email address:</label>
            <input type="text" id="email" name="email" value="<?php if (!empty($email)) echo $email; ?>" /><br />
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php if (!empty($phone)) echo $phone; ?>" /><br />

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
            <label for="password1">Password:</label>
            <input type="password" id="password1" name="password1" /><br />
            <label for="password2">Password (re-enter):</label>
            <input type="password" id="password2" name="password2" /><br />
        </fieldset>
        <input type="submit" value="Sign Up" name="submit" />
        </form>
</div>

    <?php
        //Insert Footer
        require_once('includes/footer.php');
    ?>
