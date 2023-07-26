<?php

session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'student') {

    $message = "Bad request, Please login.";

    $_SESSION['loginMessage'] = $message;

    header("location:login.php");
}

// connect to db
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
// connect to db end

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * from admission";

$result = mysqli_query($data, $sql);

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
        <center>
            <h1>Applied for Admission</h1>
            <br /><br />
            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size:20px;">Name</th>
                    <th style="padding: 20px; font-size:20px;">Email</th>
                    <th style="padding: 20px; font-size:20px;">Phone</th>
                    <th style="padding: 20px; font-size:20px;">Message</th>
                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th style="padding: 20px;">
                            <?php echo "{$info['name']}"; ?>
                        </th>
                        <th style="padding: 20px;">
                            <?php echo "{$info['email']}"; ?>
                        </th>
                        <th style="padding: 20px;">
                            <?php echo "{$info['phone']}"; ?>
                        </th>
                        <th style="padding: 20px;">
                            <?php echo "{$info['message']}"; ?>
                        </th>

                    </tr>
                <?php
                }
                ?>
            </table>
        </center>
    </div>
</body>

</html>