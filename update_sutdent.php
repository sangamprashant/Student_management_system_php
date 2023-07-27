<?php
// login controll
session_start();
if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'student') {

    $message = "Bad request, Please login.";

    $_SESSION['loginMessage'] = $message;

    header("location:login.php");
}
// connection value
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
// connection
$data = mysqli_connect($host, $user, $password, $db);
// id by param
$id = $_GET['student_id'];
// get data
$sql = "SELECT * FROM user WHERE id='$id' ";
$result = mysqli_query($data, $sql);
// show data
$info = $result->fetch_assoc();

// to update

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id' ";

    $result2 = mysqli_query($data, $query);

    if ($result2) {

        $_SESSION['message'] = 'Updated student successfully.';

        header("location:view_student.php");
    }
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

</head>

<body>

    <?php
    include 'admin_side.php'
    ?>

    <div class="content">
        <center>
            <h1>Update Student</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <label>Username</label>
                        <input type="text" name="name" value="<?php echo "{$info['username']}" ?>" />
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="text" name="email" value="<?php echo "{$info['email']}" ?>" />
                    </div>
                    <div>
                        <label>Phone</label>
                        <input type="text" name="number" value="<?php echo "{$info['phone']}" ?>" />
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="text" name="password" value="<?php echo "{$info['password']}" ?>" />
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" name="update" value="update" />
                    </div>
                </form>
            </div>
        </center>
    </div>
</body>

</html>