<?php

session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'student') {

    $message = "Bad request, Please login.";

    $_SESSION['loginMessage'] = $message;

    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php
    include 'admin_css.php'
    ?>
</head>

<body>

    <?php
    include 'admin_side.php'
    ?>

    <div class="content">

        <h1>Admin home</h1>

    </div>

</body>

</html>