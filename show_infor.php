<?php
session_start();
include 'dbconnection.php';

// checking session is valid for not 
if (strlen($_SESSION['email']==NULL)) {
  header('location:logout.php');
  } else{

$email = $_SESSION['email'];

?>

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
                        <?php $ret=mysqli_query($connect,"SELECT * from user where Email = '$email'");
							  while($row=mysqli_fetch_array($ret))
							  {

                            echo '<img src="pic/user/'.$row['img'].'" width="55%" style="border-radius: 10%"/>';

                            ?>
                            <br><br>
                            <h2><?php echo $row["prefix"].$row["name"].' '.$row["lname"] ; ?></h2>
                            <h4><?php echo $row["user_id"]; ?></h4>
                            <?php }?>
                        </center>
                    </div>

                    <center>
                        <br>
                        <p>ลงทะเบียนจองเวลาตรวจ ATK</p>
                        <form action="book_atk_system.php" method="POST" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-primary btn-lg">จองเวลาตรวจ</button>
                        </form>
                        <br>
                        
                        <button type="button" onclick="confirmalert();" class="btn btn-danger btn-lg">ออกจากระบบ</button>

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
                            <?php $ret=mysqli_query($connect,"SELECT * from user where Email = '$email'");
							  while($row=mysqli_fetch_array($ret))
							  {?>
                            <tr>
                                <td>คณะ</td>
                                <td><?php echo $row["faculty"]; ?></td>
                            </tr>
                            <tr>
                                <td>เพศ</td>
                                <td><?php echo $row["sex"]; ?></td>
                            </tr>
                            <tr>
                                <td>เบอร์โทรศัพท์</td>
                                <td><?php echo $row["phone"]; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <br>
                    <center>
                        <form action="edit_user.php">
                            <button type="submit" class="btn btn-info btn-lg">อัพเดตข้อมูลส่วนตัว</button>
                        </form>
                    </center>
                </div>
                <div class="p-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ประวัติการฉีดวัคซีน</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $ret=mysqli_query($connect,"SELECT * from vacc_log where Email = '$email'");
							  while($row=mysqli_fetch_array($ret))
							  {?>
                            <tr>
                                <td>เข็มที่ 1</td>
                                <td><?php echo $row["vac1"]; ?></td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 2</td>
                                <td><?php echo $row["vac2"]; ?></td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 3</td>
                                <td><?php echo $row["vac3"]; ?></td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 4</td>
                                <td><?php echo $row["vac4"]; ?></td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 5</td>
                                <td><?php echo $row["vac5"]; ?></td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 6</td>
                                <td><?php echo $row["vac6"]; ?></td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 7</td>
                                <td><?php echo $row["vac7"]; ?></td>
                            </tr>
                            <tr>
                                <td>เข็มที่ 8</td>
                                <td><?php echo $row["vac8"]; ?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                    <br>
                    <center>
                        <form action="edit_vac.php">
                            <button type="submit" class="btn btn-info btn-lg">อัพเดตการฉีดวัคซีน</button>
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
// function confirmalert() {
// 	Swal.fire({
//         title: "ออกจากระบบเรียบร้อยแล้ว!",
//   text: "ขอให้ปลอดภัยจากโควิดนะคะ.",
//   type: "success",
//                 }).then(function() {
//                     window.location.href = "logout.php";
//                 })
// 	}
function confirmalert() {
	Swal.fire({
  title: 'คุณต้องการออกจากระบบใช่หรือไม่?',
  text: "หากไม่ใช่สามารถกดปุ่มสีแดงเพื่อยกเลิกได้",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'ออกจากระบบ'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'ออกจากระบบเรียบร้อยแล้ว!',
      'ขอให้ปลอดภัยจากโควิดนะคะ.',
      'success'
    )
        window.location.href = "logout.php";
            }
})
	}


</script>
</body>

</html>

<?php
} ?>
