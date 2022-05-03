<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>จองคิวตรวจ ATK</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <form action="add_book_atk_ok.php" method="POST" enctype="multipart/form-data">
                    <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                        <center>
                            <h1>จองคิวตรวจ ATK</h1>
                            <p>กรุณากรอกข้อมูลให้ครบทุกช่อง</p>
                        </center>

                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <label class="form-label">รหัสรอบที่เปิด</label>
                                <input type="number" name="atopen_id" class="form-control" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">รหัสนักศึกษา</label>
                                <input type="text" name="user_id" class="form-control" required="">
                            </div>
         
                        </div>
                        <div class="row mt-3 mb-3">
                        <div class="col">
                                <label class="form-label">วันที่</label>
                                <input type="date" name="date" class="form-control" required="">
                            </div>
                            <div class="col">
                                <label class="form-label">เวลา</label>
                                <input type="test" name="time" class="form-control" required="">

                            </div>

                        </div>

                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <center>
                                    <br>
                                    <a href="show_book_atk.php" class="btn btn-info" role="button">กลับหน้าแสดงการจองทั้งหมด</a>
                                    <button type="submit" class="btn btn-success">จองคิวการตรวจ ATK</button>
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