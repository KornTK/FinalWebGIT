<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM user WHERE name LIKE '%$search%'";
    $result = mysqli_query($connect, $sql); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>เพิ่มผู้ใช้งาน</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

    </head>

    <body>
        <?php include 'menu.php'; ?>
        <br>
        <section id="main-content">
            <section class="wrapper">
                <form action="add_user_ok.php" method="POST" enctype="multipart/form-data">
                    <div class="container mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                        <center>
                            <h1>เพิ่มผู้ใช้งาน</h1>
                            <p>กรุณากรอกข้อมูลให้ครบทุกช่อง</p>
                        </center>

                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label class="form-label">คำนำหน้าชื่อ</label>
                                <select name="prefix" class="form-select" required="" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">คำนำหน้าชื่อ</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">ชื่อ</label>
                                <input type="text" name="name" class="form-control" value="" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">นามสกุล</label>
                                <input type="text" name="lname" class="form-control" value="" required="">
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label class="form-label">เพศ</label>
                                <select name="sex" class="form-select" required="" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <option value="ชาย">ชาย</option>
                                    <option value="หญิง">หญิง</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">รหัสนักศึกษา</label>
                                <input type="number" name="user_id" class="form-control" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">เบอร์โทรศัพท์</label>
                                <input type="number" name="phone" class="form-control" required="">

                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label class="form-label">อีเมล์</label>
                                <input type="email" name="email" class="form-control" required="">

                            </div>
                            <div class="col">
                                <label class="form-label">รหัสผ่าน</label>
                                <input type="text" name="password" class="form-control" required="">

                            </div>
                            <div class="col">
                                <label class="form-label">Faculty</label>
                                <select name="faculty" class="form-select" required="" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <option value="FHT">FHT</option>
                                    <option value="FTE">FTE</option>
                                    <option value="FIS">FIS</option>
                                    <option value="CoC">CoC</option>
                                    <option value="CoE">CoE</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">จำนวนวัคซีนที่ได้รับ</label>
                                <select name="vacnum" class="form-select" required="" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                        </div>
                        <?php
                        function show_sele_vac()
                        {
                            $output = '
                            <option value="Sinovac">CoronaVac (Sinovac)</option>
                                <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                                <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                                <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                                <option value="Moderna">Moderna</option>
                                <option value="Sinopharm">Sinopharm/COVILO</option>
                                <option value="Sputnik V">Sputnik V</option>
                            ';
                            echo $output;
                        }; ?>
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label class="form-label">วัคซีนเข็มที่ 1</label><br>
                                <select name="vac1" class="form-select" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <?php show_sele_vac(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">วัคซีนเข็มที่ 2</label><br>
                                <select name="vac2" class="form-select" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <?php show_sele_vac(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">วัคซีนเข็มที่ 3</label><br>
                                <select name="vac3" class="form-select" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <?php show_sele_vac(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">วัคซีนเข็มที่ 4</label><br>
                                <select name="vac4" class="form-select" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <?php show_sele_vac(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label class="form-label">วัคซีนเข็มที่ 5</label><br>
                                <select name="vac5" class="form-select" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <?php show_sele_vac(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">วัคซีนเข็มที่ 6</label><br>
                                <select name="vac6" class="form-select" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <?php show_sele_vac(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">วัคซีนเข็มที่ 7</label><br>
                                <select name="vac7" class="form-select" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <?php show_sele_vac(); ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">วัคซีนเข็มที่ 8</label><br>
                                <select name="vac8" class="form-select" style="font-size: 1.2em;">
                                    <option value="" disabled="" selected="">โปรดระบุ</option>
                                    <?php show_sele_vac(); ?>
                                </select>
                            </div>
                        </div>
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
<?php
} ?>