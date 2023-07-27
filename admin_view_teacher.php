<?php

session_start();
error_reporting(0);
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

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data, $sql);


if ($_GET['teacher_id']) {

    $t_id = $_GET['teacher_id'];

    $sql2 = "DELETE FROM teacher WHERE id='$t_id' ";

    $reqult2 = mysqli_query($data, $sql2);

    if ($reqult2) {

        header('location:admin_view_teacher.php');
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
        .table_th {
            padding: 20px;
            font-size: 20px;
        }

        .table_td {
            padding: 20px;
            font-size: 15px;
            background-color: skyblue;
        }
    </style>

</head>

<body>

    <?php
    include 'admin_side.php'
    ?>

    <div class="content">
        <center>
            <h1>View All Teacher</h1>
            <table border="1px">
                <tr>
                    <th class="table_th">Teacher Name</th>
                    <th class="table_th">Teacher Description</th>
                    <th class="table_th">Teacher Image</th>
                    <th class="table_th">Action</th>
                </tr>
                <?php while ($info = $result->fetch_assoc()) { ?>
                    <tr>
                        <td class="table_td"><?php echo "{$info['name']}" ?></td>
                        <td class="table_td"><?php echo "{$info['description']}" ?></td>
                        <td class="table_td"><img height="100px" width="100px" src="<?php echo "{$info['image']}" ?>" /></td>
                        <td class="table_td">
                            <?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this user.');\" href='admin_view_teacher.php?teacher_id={$info['id']}'><i class='fas fa-trash-alt'></i></a>
                            <a href='update_sutdent.php?teacher_id={$info['id']}'><i class='fas fa-user-edit'></i></a>"; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </center>
    </div>
</body>

</html>