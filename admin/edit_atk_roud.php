<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    $search = isset($_POST['atopen_id']) ? $_POST['atopen_id'] : '';

    $sql = "SELECT * FROM atk_open WHERE atopen_id LIKE '%$search%'";
    $result = mysqli_query($connect, $sql); ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>เพิ่มวันตรวจ ATK</title>
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
                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>

                    <form action="edit_atk_roud_ok.php" method="POST" enctype="multipart/form-data">
                        <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                            <center>
                                <h1>แก้ไขข้อมูลรอบจอง ATK <br> ไอดี : <?php echo $row["atopen_id"]; ?></h1>
                                <input type="hidden" id="atopen_id" name="atopen_id" value="<?php echo $row["atopen_id"]; ?>">

                                <p>กรุณากรอกข้อมูลให้ครบทุกช่อง</p>
                            </center>

                            <div class="row mt-3 mb-3">
                                <div class="col">
                                    <label class="form-label">วันที่</label>
                                    <input type="date" name="date" placeholder="dd-mm-yyyy" value="<?php echo $row["date"]; ?>" min="1997-01-01" max="2030-12-31" class="form-control" required="">
                                </div>
                                <div class="col">
                                    <label class="form-label">เวลา</label>
                                    <input type="text" name="time" class="form-control" required="" value="<?php echo $row["time"]; ?>">
                                </div>
                                <div class="col">
                                    <label class="form-label">สถานที่</label>
                                    <input type="text" name="loca" class="form-control" required="" value="<?php echo $row["location"]; ?>">
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col">
                                    <label class="form-label">คณะ</label>
                                    <select name="fac" class="form-select" required="" style="font-size: 1.2em;">
                                        <option value="<?php echo $row["faculty"]; ?>" selected="">ค่าเดิม :<?php echo $row["faculty"]; ?></option>
                                        <option value="CoC">COC</option>
                                        <option value="FHT">FHT</option>
                                        <option value="FHT">FIS</option>
                                        <option value="FHT">FTE</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="form-label">ยี่ห้อชุดตรวจ</label>
                                    <input type="text" name="band" class="form-control" required="" value="<?php echo $row["brand"]; ?>">
                                </div>
                                <div class="col">
                                    <label class="form-label">จํานวนคนที่รับ</label>
                                    <input type="number" name="howmany" class="form-control" required="" value="<?php echo $row["amount"]; ?>">

                                </div>
                            </div>

                            <div class="row mt-3 mb-3">
                                <div class="col">
                                    <center>
                                        <br>
                                        <a href="show_atk_roud.php" class="btn btn-info" role="button">กลับหน้าจัดการวันตรวจ ATK</a>
                                        <button type="submit" class="btn btn-success">แก้ไขข้อมูลรอบจอง ATK</button>
                                    </center>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">

                            </div>

                        </div>
                    </form>
                <?php } ?>

            </section>
        </section>
    </body>

    </html>
<?php
} ?>