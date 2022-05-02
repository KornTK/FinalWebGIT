<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['email'] == null)) {
    header('location:logout.php');
} else {

   
    $email = $_SESSION['email'];
    if (isset($_POST['updatebio'])) {

        $prefix = $_POST['prefix'];
        $name = $_POST['name'];
        $lname = $_POST['lname'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $faculty = $_POST['faculty'];


        $query = "UPDATE user SET prefix='$prefix',name='$name',
        lname='$lname',sex='$sex',phone='$phone',faculty='$faculty' WHERE Email='$email'";

        $update = mysqli_query($connect, $query);
    }
    if (isset($_POST['updatevac'])) {

        $vacnum = $_POST['vacnum'];
        $vac1 = $_POST['vac1'];
        $vac2 = $_POST['vac2'];
        $vac3 = $_POST['vac3'];
        $vac4 = $_POST['vac4'];
        $vac5 = $_POST['vac5'];
        $vac6 = $_POST['vac6'];
        $vac7 = $_POST['vac7'];
        $vac8 = $_POST['vac8'];

        $queryvac = "UPDATE vacc_log SET vacnum='$vacnum',vac1='$vac1',
        vac2='$vac2',vac3='$vac3',vac4='$vac4',vac5='$vac5',vac6='$vac6',vac7='$vac7',vac8='$vac8' WHERE Email='$email'";

        $updatevac = mysqli_query($connect, $queryvac);
    }
?>

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
                <h2>อัพเดทข้อมูลเรียบร้อยแล้ว</h2>
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