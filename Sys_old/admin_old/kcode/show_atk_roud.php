<?php
$search = isset($_GET['search']) ? $_GET['search']:'';

$connect = mysqli_connect("localhost", "root", "", "project_atk");
$sql = "SELECT * FROM atk_open WHERE faculty LIKE '%$search%'";
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
                echo "กําลังแสดงข้อมูลของคถะ :".$search;
            }
            ?>
            <form method="get" id="form" enctype="multipart/form-data" action="" >
                <label for="exampleInputEmail1">ระบบค้นหารอบเปิดจอง จากชื่อคณะ</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="ป้อนชื่อที่ต้องการหา">
                <button type="submit" class="btn btn-primary">ค้นหา</button>
            </form>

            <div class="col-12">
                <table class="table  table-striped table-hover table-bordered">
                    <tr>
                        <th width='10%'>ไอดีรอบที่เปิด</th>
                        <th width='20%'>วันที่</th>
                        <th>เวลา</th>
                        <th>สถานที่</th>
                        <th>คณะ</th>
                        <th>ยี่ห้อชุดตรวจ</th>
                        <th>จํานวนคนที่รับ</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <tr>
                            <td align='right'><?php echo $row["atopen_id"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td><?php echo $row["time"]; ?></td>
                            <td><?php echo $row["location"]; ?></td>
                            <td><?php echo $row["faculty"]; ?></td>
                            <td><?php echo $row["brand"]; ?></td>
                            <td><?php echo $row["amount"]; ?></td>
                            <td>
                                <form action="del_atk_roud.php" method="post">
                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $row["user_id"]; ?>">
                                    <button type="submit" class="btn btn-info"> แก้ไข</button>
                                </form>
                            </td>
                            <td>
                                <form action="del_atk_roud.php" method="post">
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