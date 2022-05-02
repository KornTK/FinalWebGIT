<?php
$search = isset($_GET['search']) ? $_GET['search']:'';

$connect = mysqli_connect("localhost", "root", "", "project_atk");
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

<body>
    <div class="container">
        <div class="row">
            <br>
            <?php
            if($search != ""){
                echo "กําลังแสดงข้อมูลชื่อ :".$search;
            }
            ?>
            <form method="get" id="form" enctype="multipart/form-data" action="" >
                <label for="exampleInputEmail1">ระบบค้นหาผู้ใช้</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="ป้อนชื่อที่ต้องการหา">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
            </form>
            <form action="add_user.php">
            <button type="submit"  class="btn btn-danger"> เพิ่มผู้ใช้งาน</button>
            <br>
        </form>
            <div class="col-12">
                <table class="table  table-striped table-hover table-bordered">
                    <tr>
                        <th width='10%'>รหัสประจําตัว</th>
                        <th width='20%'>คำนำหน้าชื่อ</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>อีเมล์</th>
                        <th>เพศ</th>
                        <th>เบอร์ติดต่อ</th>
                        <th>คณะ</th>
                        <th>ชื่อไฟล์รูป</th>
                        <th>ไอดีการฉีดวัคซีน</th>
                        <th>ลบ</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td align='right'><?php echo $row["user_id"]; ?></td>
                            <td><?php echo $row["prefix"]; ?></td>
                            <td><?php echo $row["name"]; ?></td>
                            <td><?php echo $row["lname"]; ?></td>
                            <td><?php echo $row["Email"]; ?></td>
                            <td><?php echo $row["sex"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                            <td><?php echo $row["faculty"]; ?></td>
                            <td><?php echo $row["img"]; ?></td>
                            <td><?php echo $row["VL_ID"]; ?></td>
                            <td>
                                <form action="del_user.php" method="post">
                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $row["user_id"]; ?>">
                                    <button type="submit" class="btn btn-danger"> ลบ</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>