<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['email'] == NULL)) {
    header('location:logout.php');
} else {

    $email = $_SESSION['email'];
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vaccine Update</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="assets/tem.css" rel="stylesheet">

    </head>

    <body>

        <form action="comple_edit.php" method="POST" enctype="multipart/form-data">
            <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                <center>
                    <h1>อัพเดตการฉีดวัคซีน</h1>
                    <p>Please input your pass vaccination</p>
                    <p>กรุณากรอกข้อมูลการฉีดวัคซีน</p>
                </center>
                <?php $ret = mysqli_query($connect, "SELECT * from vacc_log where Email = '$email'");
                while ($row = mysqli_fetch_array($ret)) { ?>
                    <div class="col">
                        <label class="form-label">จำนวนวัคซีนที่ได้รับ</label>
                        <select name="vacnum" class="form-select">
                            <option value="<?php echo $row["vacnum"]; ?>" selected=""><?php echo $row["vacnum"]; ?></option>
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
                    <?php
                        function show_sele_vac(){
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
                        };
                    ?>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <label class="form-label">วัคซีนเข็มที่ 1</label><br>
                            <select name="vac1" class="form-select">
                                <option value="<?php echo $row["vac1"]; ?>" selected=""><?php echo $row["vac1"]; ?></option>
                                <?php show_sele_vac(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">วัคซีนเข็มที่ 2</label><br>
                            <select name="vac2" class="form-select">
                                <option value="<?php echo $row["vac2"]; ?>" selected=""><?php echo $row["vac2"]; ?></option>
                                <?php show_sele_vac(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">วัคซีนเข็มที่ 3</label><br>
                            <select name="vac3" class="form-select">
                                <option value="<?php echo $row["vac3"]; ?>" selected=""><?php echo $row["vac3"]; ?></option>
                                <?php show_sele_vac(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">วัคซีนเข็มที่ 4</label><br>
                            <select name="vac4" class="form-select">
                                <option value="<?php echo $row["vac4"]; ?>" selected=""><?php echo $row["vac4"]; ?></option>
                                <?php show_sele_vac(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <label class="form-label">วัคซีนเข็มที่ 5</label><br>
                            <select name="vac5" class="form-select">
                                <option value="<?php echo $row["vac5"]; ?>" selected=""><?php echo $row["vac5"]; ?></option>
                                <?php show_sele_vac(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">วัคซีนเข็มที่ 6</label><br>
                            <select name="vac6" class="form-select">
                                <option value="<?php echo $row["vac6"]; ?>" selected=""><?php echo $row["vac6"]; ?></option>
                                <?php show_sele_vac(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">วัคซีนเข็มที่ 7</label><br>
                            <select name="vac7" class="form-select">
                                <option value="<?php echo $row["vac7"]; ?>" selected=""><?php echo $row["vac7"]; ?></option>
                                <?php show_sele_vac(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">วัคซีนเข็มที่ 8</label><br>
                            <select name="vac8" class="form-select">
                                <option value="<?php echo $row["vac8"]; ?>" selected=""><?php echo $row["vac8"]; ?></option>
                                <?php show_sele_vac(); ?>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <center>
                            <br>
                            <a href="show_infor.php" class="btn btn-info" role="button">กลับหน้าโปรไฟล์</a>
                            <input name="updatevac" type="submit" class="btn btn-success" value="แก้ไขข้อมูล">
                        </center>
                    </div>
                </div>

            </div>
        </form>
        <?php include 'footer.php'; ?>
        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} ?>