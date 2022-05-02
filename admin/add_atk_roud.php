<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM user WHERE name LIKE '%$search%'";
    $result = mysqli_query($connect, $sql);

?>
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
    <title>เพิ่มวันตรวจ ATK</title>
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
<form action="add_atk_ok.php" method="POST" enctype="multipart/form-data">
        <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
            <center>
                <h1>เปิดรอบจอง ATK</h1>
                <p>กรุณากรอกข้อมูลให้ครบทุกช่อง</p>
            </center>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <label class="form-label">วันที่</label>
                    <input type="date" name="name" class="form-control"  required="">
                </div>
                <div class="col">
                    <label class="form-label">เวลา</label>
                    <input type="text" name="name" class="form-control" required="">
                </div>
                <div class="col">
                    <label class="form-label">สถานที่</label>
                    <input type="text" name="sname" class="form-control"  required="">
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">
                    <label class="form-label">คณะ</label>
                    <select name="sex" class="form-select" required="" style="font-size: 1.2em;">
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="CoC">COC</option>
                        <option value="FHT">FHT</option>
                        <option value="FHT">FIS</option>
                        <option value="FHT">FTE</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">ยี่ห้อชุดตรวจ</label>
                    <input type="text" name="stdid" class="form-control" required="">
                </div>
                <div class="col">
                    <label class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" name="phonenum" class="form-control" required="">

                </div>
            </div>
           
            <div class="row mt-3 mb-3">
                <div class="col">
                    <center>
                        <br>
                        <a href="manage-users.php" class="btn btn-info" role="button">กลับหน้าแอดมิน</a>
                        <button type="submit" class="btn btn-success">เพิ่มรอบจอง ATK</button>
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