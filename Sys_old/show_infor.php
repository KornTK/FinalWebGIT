<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="assets/tem.css" rel="stylesheet">

</head>

<body>
<?php include 'header.php';?>   

    <div class="container mt-3 mb-3">
    <div class="row mt-3 mb-3">
            <div class="col-5">
                <div class="p3css p-3" >
                    <div class="profile-img">
                        <center>
                            <?php

                            echo '<img class="center" width="55%" src="pic/6330611008.jpg" style="border-radius: 10%">';

                            ?>
                            <br><br>
                            <h2>นางสาว อิตาชิ ลมแรงจัง</h2>
                            <h4>6330611099</h4>
                        </center>
                    </div>

                    <center>
                        <br>
                        <p>ลงทะเบียนจองเวลาตรวจ ATK</p>
                        <form action="book_atk.php" method="POST" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-primary btn-lg">จองเวลาตรวจ</button>
                        </form>
                        <br>
                        <form action="indexs.html">
                        <button type="button" onclick="confirmalert();" class="btn btn-danger btn-lg">ออกจากระบบ</button>
</form>
                    </center>
                </div>

            </div>
            <div class="clo_7_css col-7" >
                <div class="p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ข้อมูลส่วนตัว</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>คณะ</td>
                                <td>วิทยาการคอมพิวเตอร์</td>
                            </tr>
                            <tr>
                                <td>เพศ</td>
                                <td>ชาย</td>
                            </tr>
                            <tr>
                                <td>เบอร์โทรศัพท์</td>
                                <td>0618492749</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ประวัติการฉีดวัคซีน</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>เข็มที่ 1</td>
                                <td>Pfizer</td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 2</td>
                                <td>AstraZeneca</td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 3</td>
                                <td>AstraZeneca</td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 4</td>
                                <td>Sinopharm</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <center>
                        <form action="edit_user.php">
                            <button type="submit" class="btn btn-info btn-lg">แก้ไขข้อมูล</button>
                        </form>
                    </center>
                </div>
            </div>
        </div>
        <?php include 'footer.php';?>
    </div>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
function confirmalert() {
	Swal.fire({
        title: "ออกจากระบบเรียบร้อยแล้ว!",
  text: "ขอให้ปลอดภัยจากโควิดนะคะ.",
  type: "success",
                }).then(function() {
                    window.location.href = "indexs.html";
                })
	}
</script>
</body>

</html>


