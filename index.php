<?php

error_reporting(0);
session_start();
session_destroy();

if ($_SESSION['message']) {
    $message = $_SESSION['message'];

    echo "<script type='text/javascript'>
        
        alert('$message');

        </script>";
}

// connect to db
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";
// connect to db end

$data = mysqli_connect($host, $user, $password, $db);

$sql = "SELECT * FROM teacher";

$result = mysqli_query($data, $sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    include 'index_nav.php'
    ?>

    <div class="section1">
        <label class="image_text">We Teach Student With Care</label>
        <img class="main_img" src="img/school_management.jpg" />

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="img/school2.jpg" />
            </div>
            <div class="col-md-8">
                <h1>Welcome To W-School</h1>
                <p> jfvb3ffv 3 ff 3r uf rv v g b t iu ghr h duhg uigdff hdff dfuh di duhi gdh g higuh guhgdghdfhuh duhf kdhf hkdf hhk hklk f uh h h rhig hr rhe ehhk fh ehf 1erg er uherfg hklerkh er jhrf hgr hkrtjhg jhdf 1dffjbh dfjhdf fj b fg f mnf nf n f g mng mnfg mn mn mn f fg ng mng mn g </p>
            </div>

        </div>

    </div>
    <center>
        <h1>Our Teachers</h1>
    </center>

    <div class="container">
        <div class="row">
            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <div class="col-md-4 teacher_container">
                    <img class="teacher" src=<?php echo "{$info['image']}" ?> />
                    <h3><?php echo "{$info['name']}" ?></h3>
                    <h5><?php echo "{$info['description']}" ?></h5>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <center>
        <h1>Our Courses</h1>
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher" src="img/graphic.jpg" />
                <h3>Graphic Design</h3>

            </div>
            <div class="col-md-4">
                <img class="teacher" src="img//web.jpg" />
                <h3>Web Development</h3>

            </div>
            <div class="col-md-4">
                <img class="teacher" src="img/marketing.png" />\
                <h3>Marketing</h3>

            </div>
        </div>
    </div>
    <center>
        <h1 id="adm" class="adm">Admission Form</h1>
    </center>
    <div align="center" class="admission_form">
        <form action="data_check.php" method="POST">
            <div class="adm_int">
                <label class="label_text">Name</label>
                <input class="input_deg" type="text" name="name" />
            </div>
            <div class="adm_int">
                <label class="label_text">Email</label>
                <input class="input_deg" type="email" name="email" />
            </div>
            <div class="adm_int">
                <label class="label_text">Phone</label>
                <input class="input_deg" type="text" name="phone" />
            </div>
            <div class="adm_int">
                <label class="label_text">Message</label>
                <textarea class="int_txt" name="message"></textarea>
            </div>
            <div class="adm_int">
                <input class="btn btn-primary" type="submit" id="submit" value="Apply" name="apply" />
            </div>
        </form>
    </div>
    <footer>
        <h3 class="footer_txt">All @copyright reserved by:Prashant Srivastav</h3>

    </footer>


</body>

</html>