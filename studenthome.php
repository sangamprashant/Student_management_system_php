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
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>

    <header class="header">
        <a href="">Student Dashboard</a>
        <div class="logout">
            <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
    </header>

    <aside>
        <ul>
            <li><a href="">My Courses</a></li>
            <li><a href="">My Result</a></li>
        </ul>
    </aside>

    <div class="content">
        <h1>Side Accordion</h1>
        <p>However, there seems to be an issue with the if condition for checking the request method. It should be $_SERVER["REQUEST_METHOD"] == "POST" instead of $_SERVER["REQUEST_METHOD"]==POST. The double equal signs == are used for comparison in PHP, and the value of the right-hand side should be enclosed in quotes.</p>
    </div>

</body>

</html>