<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['email'] == null)) {
    header('location:logout.php');
} else {
    $email = $_SESSION['email']; ?>

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
            <h1>จองเวลาตรวจ ATK</h1>
            <p class="booking">ให้ นศ.จองเวลาเข้ารับการตรวจ ATK ในเวลาที่ นศ.สะดวก และจะต้องลงทะเบียนล่วงหน้าเท่านั้น</p>
            <p class="booking">หาก นศ.ยังไม่ลงทะเบียนล่วงหน้าจะต้องเข้ารับการตรวจในช่วงเวลา walk in</p>

            <div class="row mt-3 mb-3">
                <div class="col-md">
                    <form action="comple_book.php" method="POST" enctype="multipart/form-data">
                        <label for="SiSID" class=" form-label">นศ.จะต้องมารับชุดตรวจและเข้ารับการตรวจในช่วงเวลาที่ได้จองไว้เท่านั้น</label><br><br>
        </center>
        <input type="radio" id="Count" name="Count" value="1"> 13:30 น. - 14:00 น.<br><br>
        <input type="radio" id="Count" name="Count" value="2"> 14:00 น. - 14:30 น.<br><br>
        <input type="radio" id="Count" name="Count" value="3"> 14:30 น. - 15:00 น.<br><br>
        <input type="radio" id="Count" name="Count" value="4"> 15:00 น. - 15:30 น.<br><br>
        <input type="radio" id="Count" name="Count" value="5"> 15:30 น. - 16:00 น.<br><br>
        <input type="radio" id="Count" name="Count" value="6"> Walk in (หลัง 16:00 น.)<br><br>
        <input type="radio" id="Count" name="Count" value="7"> ส่งเอกสาร/หลักฐานแสดงผลการตรวจว่าไม่พบเชื้อ ภายในระยะเวลา 72 ชม.ต่อเจ้าหน้าที่<br><br>
        <input type="radio" id="Count" name="Count" value="8"> หายจากการป่วยเป็นโรคโควิด-19 ไม่เกิน 90 วัน<br><br>
        <center>
            <br>
            <a href="show_infor.php" class="btn btn-info" role="button">กลับหน้าโปรไฟล์</a>
            <button type="submit" class="btn btn-success">จอง</button>
        </center>

    </div>
    </form>

    </div>

    </div>


    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php
} ?>