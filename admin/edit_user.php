<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

    $search = isset($_POST['user_id']) ? $_POST['user_id'] : '';

    $sql = "SELECT * FROM user WHERE user_id LIKE '%$search%'";
    $result = mysqli_query($connect, $sql);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>แก้ไขผู้ใช้งาน</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        
    </head>

    <body>
        <?php include 'menu.php'; ?>
        <br>
        <section id="main-content">
        <section class="wrapper">
            <?php 
                  while ($row = mysqli_fetch_array($result)) { ?>

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
                            <input type="text" name="stdid" class="form-control" value="<?php echo $row["user_id"]; ?>" style="height: 3em;">
                        </div>
                        <div class="col">
                            <label class="form-label">เบอร์โทรศัพท์</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo $row["phone"]; ?>" style="height: 3em;">

                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <label class="form-label">Faculty</label>
                            <select name="faculty" class="form-select" value="" style="height: 3em;">
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
                            <input class="form-control" type="file" name="file">
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <center>
                                <br>
                                <a href="manage-users.php" class="btn btn-info" role="button">กลับหน้าแอดมิน</a>
                                <button type="submit" class="btn btn-success">เพิ่มผู้ใช้งาน</button>
                            </center>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">

                    </div>

                </div>
            </form>
            </section>
        </section>
    </body>

    </html>
<?php } ?>