<?php

error_reporting(0);
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

$sql = "SELECT * FROM user WHERE usertype='student' ";

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
            <h1>Student Data</h1>

            <?php

            if($_SESSION['message']){
                echo $_SESSION['message'];
            }

            unset($_SESSION['message']);
            
            ?>

            <br /><br />
            <table border="1px">
                <tr>
                    <th style="padding: 20px; font-size:20px;">User Name</th>
                    <th style="padding: 20px; font-size:20px;">Email</th>
                    <th style="padding: 20px; font-size:20px;">Phone</th>
                    <th style="padding: 20px; font-size:20px;">Password</th>
                    <th style="padding: 20px; font-size:20px;">Action</th>
                </tr>

                <?php
                while ($info = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <th style="padding: 20px;">
                            <?php echo "{$info['username']}"; ?>
                        </th>
                        <th style="padding: 20px;">
                            <?php echo "{$info['email']}"; ?>
                        </th>
                        <th style="padding: 20px;">
                            <?php echo "{$info['phone']}"; ?>
                        </th>
                        <th style="padding: 20px;">
                            <?php echo "{$info['password']}"; ?>
                        </th>
                        <th style="padding: 20px;">
                            <?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this user.');\" href='delete.php?student_id={$info['id']}'><i class='fas fa-trash-alt'></i></a>
                            <a href='update_sutdent.php?student_id={$info['id']}'><i class='fas fa-user-edit'></i></a>"; ?>
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