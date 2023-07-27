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

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $userphone = $_POST['phone'];
    $userpassword = $_POST['password'];
    $usertype = "student";

    $check = "SELECT * FROM user WHERE username='$username'";

    $chec_user = mysqli_query($data, $check);

    $row_count = mysqli_num_rows($chec_user);

    if ($row_count == 1) {
        echo "<script type='text/javascript' >
        alert('Username Already Exist. Try Another One.');
        </script>";
    } else {
        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO user(username, phone, email, usertype, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($data, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $username, $userphone, $useremail, $usertype, $userpassword);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo "<script type='text/javascript' >
        alert('Data Uploaded Successfully.');
        </script>";
        } else {
            echo "Upload Failed.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <style>
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>

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
            <h1>Add Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" />
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" />
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="number" name="phone" />
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="text" name="password" />
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" name="add_student" value="Add Student" />
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>