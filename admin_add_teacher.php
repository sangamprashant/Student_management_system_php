<?php

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

if(isset($_POST['add_teacher'])){

    $t_name=$_POST['name'];
    $t_description=$_POST['description'];
    $t_file=$_FILES['image']['name'];

    $dist="./img/teacher/".$t_file;

    $dst_db="img/teacher/".$t_file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dist);

    $sql="INSERT INTO teacher (name,description,image) VALUES('$t_name','$t_description','$dst_db') ";
    $result=mysqli_query($data,$sql);

    if($result){
        header('location:admin_add_teacher.php');
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

            <h1>Add Teacher</h1>
            <br /><br />
            <form class="div_deg" action="#" method="POST" enctype="multipart/form-data">
                <div>
                    <label>Teacher Name:</label>
                    <input type="text" name="name" />
                </div>
                <div>
                    <label>Description:</label>
                    <textarea name="description"></textarea>
                </div>
                <div>
                    <label>Image:</label>
                    <input type="file" name="image" />
                </div>
                <br />
                <div>
                    <input class="btn btn-success" type="submit" name="add_teacher" value="Add Teacher" />
                </div>
            </form>
        </center>


    </div>

</body>

</html>