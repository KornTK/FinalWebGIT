<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['email'] == null)) {
    header('location:logout.php');
} else {
    $email = $_SESSION['email'];
    $ret = mysqli_query($connect, "SELECT * from system_setting");
    while ($row = mysqli_fetch_array($ret)) {
        if ($row["book_atk_allow"] == "true") {
            header('location:book_atk.php');
        }
    } ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>จองเวลาตรวจ ATK</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="assets/tem.css" rel="stylesheet">


    </head>

    <body>
        <?php include 'header.php'; ?>

        <br>

        <div class="atkbook container mt-3 mb-3">

            <center>
                <h2>ขณะนี้ระบบจองตรวจ ATK ปิดอยู่ <br>โดยผู้ดูแลระบบ</h2>
                <br>
                <a href="show_infor.php" class="btn btn-info" role="button">กลับหน้าโปรไฟล์</a>

            </center>


        </div>
        <?php include 'footer.php'; ?>
        </div>


        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} ?>