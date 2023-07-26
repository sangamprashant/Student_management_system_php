<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM user WHERE username=? AND password=?";
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $name, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_array($result)) {
        if ($row["usertype"] == "student") {
            $_SESSION['username'] = $name;
            $_SESSION['usertype'] = "student";
            header("location:studenthome.php");
        } else if ($row["usertype"] == "admin") {
            $_SESSION['username'] = $name;
            $_SESSION['usertype'] = "admin";
            header("location:adminhome.php");
        } else {
            $message = "Invalid user type";
            $_SESSION['loginMessage'] = $message;
            header("location:login.php");
        }
    } else {
        $message = "Username or password do not match";
        $_SESSION['loginMessage'] = $message;
        header("location:login.php");
    }
}
?>
