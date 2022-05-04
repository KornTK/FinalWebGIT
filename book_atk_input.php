<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['email'] == null)) {
    header('location:logout.php');
} else {
    $atopen_id = $_GET['atopen_id']; ?>

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
        <?php $ret = mysqli_query($connect, "SELECT * from atk_open where atopen_id = '$atopen_id'");
    while ($row = mysqli_fetch_array($ret)) { ?>

<form action="book_atk_input_save.php" method="get" enctype="multipart/form-data">
                        <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                            <center>
                                <h1>จองวันที่ <?php echo $row["date"]; ?> เวลา : <?php echo $row["time"]; ?></h1>
                                <p>กรุณาตรวจสอบข้อมูลให้ครบถ้วน</p>

                            </center>
                            <div class="row mt-3 mb-3">
                                <div class="col">
                                    <label class="form-label">สถานที่ :</label>
                                    <input type="text" name="location" class="form-control" value="<?php echo $row["location"]; ?>" style="height: 3em;" disabled>
                                </div>
                                <div class="col">
                                    <label class="form-label">สาขา</label>
                                    <input type="text" name="faculty" class="form-control" value="<?php echo $row["faculty"]; ?>" style="height: 3em;" disabled>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col">
                                    <label class="form-label">ยี่ห้อ ATK :</label>
                                    <input type="text" name="brand" class="form-control" value="<?php echo $row["brand"]; ?>" style="height: 3em;" disabled>
                                </div>
                                <div class="col">
                                    <label class="form-label">จํานวนที่รับ</label>
                                    <input type="text" name="amount" class="form-control" value="<?php echo $row["amount"]; ?>" style="height: 3em;" disabled>

                                </div>
                            </div>

                            <input type="hidden" id="atopen_id" name="atopen_id" value="<?php echo $atopen_id; ?>">
                            
                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

                            <input type="hidden" id="date" name="date" value="<?php echo $row["date"]; ?>">

                            <input type="hidden" id="time" name="time" value="<?php echo $row["time"]; ?>">


                        <?php } ?>

                        <div class="row mt-3 mb-3">
                            <div class="col">
                                <center>
                                    <br>
                                    <a href="book_atk.php" class="btn btn-info" role="button">กลับเลือกวันเวลา</a>
                                    <button type="submit" class="btn btn-success">ยืนยันการจอง</button>
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