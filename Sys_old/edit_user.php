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

<body >
<?php include 'header.php';?>    

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
                    <select name="prefix" class="form-select" required="">
                        <option value="" disabled="" selected="">คำนำหน้าชื่อ</option>
                        <option value="นาย">นาย</option>
                        <option value="นาง">นาง</option>
                        <option value="นางสาว">นางสาว</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">ชื่อ</label>
                    <input type="text" name="name" class="form-control" value="อิตาชิ" required="">
                </div>
                <div class="col">
                    <label class="form-label">นามสกุล</label>
                    <input type="text" name="sname" class="form-control" value="ลมแรงจัง" required="">
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">
                    <label class="form-label">เพศ</label>
                    <select name="sex" class="form-select" required="">
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="ชาย">ชาย</option>
                        <option value="หญิง">หญิง</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">รหัสนักศึกษา</label>
                    <input type="text" name="stdid" class="form-control" required="">
                </div>
                <div class="col">
                    <label class="form-label">เบอร์โทรศัพท์</label>
                    <input type="text" name="phonenum" class="form-control" required="">

                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">
                    <label class="form-label">Faculty</label>
                    <select name="faculty" class="form-select" required="">
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
                    <select name="vacnum" class="form-select" required="">
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
            <div class="row mt-3 mb-3">
                <div class="col">
                    <label class="form-label">วัคซีนเข็มที่ 1</label><br>
                    <select name="vac1" class="form-select" >
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="Sinovac">CoronaVac (Sinovac)</option>
                        <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                        <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                        <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm/COVILO</option>
                        <option value="Sputnik V">Sputnik V</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">วัคซีนเข็มที่ 2</label><br>
                    <select name="vac2" class="form-select" >
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="Sinovac">CoronaVac (Sinovac)</option>
                        <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                        <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                        <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm/COVILO</option>
                        <option value="Sputnik V">Sputnik V</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">วัคซีนเข็มที่ 3</label><br>
                    <select name="vac3" class="form-select" >
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="Sinovac">CoronaVac (Sinovac)</option>
                        <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                        <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                        <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm/COVILO</option>
                        <option value="Sputnik V">Sputnik V</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">วัคซีนเข็มที่ 4</label><br>
                    <select name="vac4" class="form-select" >
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="Sinovac">CoronaVac (Sinovac)</option>
                        <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                        <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                        <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm/COVILO</option>
                        <option value="Sputnik V">Sputnik V</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col">
                    <label class="form-label">วัคซีนเข็มที่ 5</label><br>
                    <select name="vac5" class="form-select" >
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="Sinovac">CoronaVac (Sinovac)</option>
                        <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                        <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                        <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm/COVILO</option>
                        <option value="Sputnik V">Sputnik V</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">วัคซีนเข็มที่ 6</label><br>
                    <select name="vac6" class="form-select" >
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="Sinovac">CoronaVac (Sinovac)</option>
                        <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                        <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                        <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm/COVILO</option>
                        <option value="Sputnik V">Sputnik V</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">วัคซีนเข็มที่ 7</label><br>
                    <select name="vac7" class="form-select" >
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="Sinovac">CoronaVac (Sinovac)</option>
                        <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                        <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                        <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm/COVILO</option>
                        <option value="Sputnik V">Sputnik V</option>
                    </select>
                </div>
                <div class="col">
                    <label class="form-label">วัคซีนเข็มที่ 8</label><br>
                    <select name="vac8" class="form-select" >
                        <option value="" disabled="" selected="">โปรดระบุ</option>
                        <option value="Sinovac">CoronaVac (Sinovac)</option>
                        <option value="Astrazeneca">Astrazeneca (Covisshield)</option>
                        <option value="Pfizer">ไฟเซอร์ ไบออนเทค/ Comirnaty</option>
                        <option value="JnJ">Johnson & Johnson/Janssen/Ad26.COV2.5</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Sinopharm">Sinopharm/COVILO</option>
                        <option value="Sputnik V">Sputnik V</option>
                    </select>
                </div>
            </div>
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
                        <button type="submit" class="btn btn-success">แก้ไขข้อมูล</button>
                    </center>
                </div>
            </div>
            <div class="row mt-3 mb-3">

            </div>
            
        </div>
    </form>
    <?php include 'footer.php';?>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>