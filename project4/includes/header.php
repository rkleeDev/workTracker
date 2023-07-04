<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?php
            echo $page_title;
        ?>
    </title>

    <link rel="stylesheet" href="../css/plugins/table.min.css"/>
    <link rel="stylesheet" href="../css/plugins/line_breaker.min.css"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../JS/Plugins/table.min.js"></script>
    <script src="../JS/Plugins/line_breaker.min.js"></script>


    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../JS/MasterJS.js"></script>



</head>
<header>
    <?php
        require('navmenu.php');
    ?>
</header>
<body>
    <img src="../images/Sunset-on-the-beach1-120.jpg" width="250" height="100"
      alt="HGs Logo" /><br />

<?php
    echo '<h3>HGs - ' . $page_title . '</h3>';
?>

