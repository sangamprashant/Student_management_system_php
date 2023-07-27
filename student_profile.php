<?php

session_start();
if (!isset($_SESSION['username'])) {

    $message = "Bad request, Please login.";

    $_SESSION['loginMessage'] = $message;

    header("location:login.php");
} else if ($_SESSION['usertype'] == 'admin') {
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
$name = $_SESSION['username'];

$sql="SELECT * FROM user WHERE username='$name' ";

$result=mysqli_query($data,$sql);

$info = mysqli_fetch_assoc($result);

if(isset($_POST['update_profile'])){

    $s_email = $_POST['email'];
    $s_phone = $_POST['phone'];
    $s_password = $_POST['password'];

    $sql2="UPDATE user SET email='$s_email', phone='$s_phone', password='$s_password' WHERE username='$name' ";

    $result2=mysqli_query($data,$sql2);

    if($result2){
       header('location:student_profile.php');
    }

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
    include 'student_side.php'
    ?>

    <div class="content">
        <center>
            <h1>Student Profile</h1>
            <br/><br/>
            <form action="#" method="POST" class="div_deg">
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $info['email']; ?>" />
                </div>
                <div>
                    <label>Phone</label>
                    <input type="number" name="phone" value="<?php echo $info['phone']; ?>" />
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo $info['password']; ?>" />
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="update_profile" value="Update" />
                </div>
            </form>
        </center>
    </div>
</body>

</html>