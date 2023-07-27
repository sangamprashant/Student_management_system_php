<?php

session_start();
if (!isset($_SESSION['username'])) {

    $message = "Bad request, Please login.";

    $_SESSION['loginMessage'] = $message;

    header("location:login.php");
} else if ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

    <?php
    include 'admin_css.php'
    ?>

</head>

<body>

    <?php
    include 'student_side.php'
    ?>

    <div class="content">
        <h1>Side Accordion</h1>
        <p>However, there seems to be an issue with the if condition for checking the request method. It should be $_SERVER["REQUEST_METHOD"] == "POST" instead of $_SERVER["REQUEST_METHOD"]==POST. The double equal signs == are used for comparison in PHP, and the value of the right-hand side should be enclosed in quotes.</p>
    </div>

</body>

</html>