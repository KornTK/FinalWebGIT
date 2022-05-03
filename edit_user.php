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

            <form action="comple_edit.php" method="POST" enctype="multipart/form-data">
                <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                    <center>
                        <h1>อัพเดตประวัติ</h1>
                        <p>Please input your things</p>
                        <p>กรุณากรอกข้อมูลประวัติในระบบ</p>

                    </center>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <label class="form-label">คำนำหน้าชื่อ</label>
                            <select name="prefix" class="form-select">
                                <option value="<?php echo $row["prefix"]; ?>" selected=""><?php echo $row["prefix"]; ?></option>
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $row["name"]; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $row["lname"]; ?>">
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <label class="form-label">เพศ</label>
                            <select name="sex" class="form-select">
                                <option value="<?php echo $row["sex"]; ?>" selected=""><?php echo $row["sex"]; ?></option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">รหัสนักศึกษา</label>
                            <input type="text" name="stdid" class="form-control" value="<?php echo $row["user_id"]; ?>">
                        </div>
                        <div class="col">
                            <label class="form-label">เบอร์โทรศัพท์</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $row["phone"]; ?>">

                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <label class="form-label">Faculty</label>
                            <select name="faculty" class="form-select" value="">
                                <option value="<?php echo $row["faculty"]; ?>" selected=""><?php echo $row["faculty"]; ?></option>
                                <option value="FHT">FHT</option>
                                <option value="FTE">FTE</option>
                                <option value="FIS">FIS</option>
                                <option value="CoC">CoC</option>
                                <option value="CoE">CoE</option>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <label for="formFile" class="form-label">รูปโปรไฟล์</label>
                        <input class="form-control" type="file" name="picfile">
                        <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <center>
                            <br>
                            <a href="show_infor.php" class="btn btn-info" role="button">กลับหน้าโปรไฟล์</a>
                            <input name="updatebio" type="submit" class="btn btn-success" value="แก้ไขข้อมูล">
                        </center>
                    </div>
                    >
                </div>
            </form>
            <?php include 'footer.php'; ?>
            <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} ?>