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
        <title>Bio Update</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="assets/tem.css" rel="stylesheet">

    </head>

    <body>
        <?php include 'header.php'; ?>
        <?php $ret = mysqli_query($connect, "SELECT * from user where Email = '$email'");
    while ($row = mysqli_fetch_array($ret)) { ?>

<form action="edit_user_ok.php" method="post" enctype="multipart/form-data">
                        <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                            <center>
                                <h1>อัพเดตประวัติ <br> คุณ : <?php echo $row["name"]; ?> <?php echo $row["lname"]; ?></h1>
                                <p>Please input your things</p>
                                <p>กรุณากรอกข้อมูลประวัติในระบบ</p>

                            </center>
                            <div class="row mt-3 mb-3">
                                <div class="col">
                                    <label class="form-label">คำนำหน้าชื่อ</label>
                                    <select name="prefix" class="form-select" style="height: 3em;">
                                        <option value="<?php echo $row["prefix"]; ?>" selected=""><?php echo $row["prefix"]; ?></option>
                                        <option value="นาย">นาย</option>
                                        <option value="นาง">นาง</option>
                                        <option value="นางสาว">นางสาว</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">ชื่อ</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>" style="height: 3em;">
                                </div>
                                <div class="col">
                                    <label class="form-label">นามสกุล</label>
                                    <input type="text" name="lname" class="form-control" value="<?php echo $row["lname"]; ?>" style="height: 3em;">
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col">
                                    <label class="form-label">เพศ</label>
                                    <select name="sex" class="form-select" style="height: 3em;">
                                        <option value="<?php echo $row["sex"]; ?>" selected=""><?php echo $row["sex"]; ?></option>
                                        <option value="ชาย">ชาย</option>
                                        <option value="หญิง">หญิง</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">รหัสนักศึกษา</label>
                                    <input type="text" name="user_id" class="form-control" value="<?php echo $row["user_id"]; ?>" style="height: 3em;">
                                </div>
                                <div class="col">
                                    <label class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $row["phone"]; ?>" style="height: 3em;">

                                </div>
                            </div>
                            <div class="row mt-3 mb-3">

                                <div class="col">
                                    <label class="form-label">รหัสผ่าน</label>
                                    <input type="text" name="password" class="form-control" value="<?php echo $row["password"]; ?>" style="height: 3em;">

                                </div>
                            </div>
                            <input type="hidden" id="oldpic" name="oldpic" value="<?php echo $row["img"]; ?>">
                        <?php } ?>
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label for="formFile" class="form-label">รูปโปรไฟล์</label>
                                <input class="form-control" type="file" name="file">
                                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <center>
                                    <br>
                                    <a href="show_infor.php" class="btn btn-info" role="button">กลับหน้าแรก</a>
                                    <button type="submit" class="btn btn-success">แก้ไขข้อมูลผู้ใช้งาน</button>
                                </center>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">

                        </div>

                        </div>
                    </form>
            <?php include 'footer.php'; ?>
            <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} ?>