<?php
session_start();

include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

$search = isset($_GET['search']) ? $_GET['search']:'';

$sql = "SELECT * FROM atk_open WHERE faculty LIKE '%$search%'";
$result = mysqli_query($connect, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>จัดการวันตรวจ ATK</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>
<?php include 'menu.php'; ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> จัดการวันตรวจ ATK</h3>
				<div class="row">

                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                                <h4><i class="fa fa-angle-right"></i> รายละเอียดวันตรวจทั้งหมด </h4>

                                <br>
                                <?php
                                if($search != ""){
                                    echo "กําลังแสดงข้อมูลของคถะ :".$search;
                                    $showmsg = "กําลังแสดงข้อมูลของคณะ :".$search;
                                }else{
                                    $showmsg = "";
                                }
                                ?>
                                <form method="get" id="form" enctype="multipart/form-data" action="" >
                                    <label for="exampleInputEmail1">ระบบค้นหารอบเปิดจอง จากชื่อคณะ</label>
                                    <input type="text" class="form-control" id="search" name="search" placeholder="ป้อนชื่อคณะที่ต้องการหา">
                                    <br>
                                    <button type="submit" class="btn btn-primary">ค้นหา <i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
			<form action="add_atk_roud.php">
			<button type="submit" class="btn btn-success">เพิ่มรอบตรวจ ATK</button>
			</form>
            <hr>
            <?php 
                                if ($showmsg != null){ 
                                echo '<center> <h2>'.$showmsg.'</h2></center>'; 
                            }
                                ?>
            <div class="col-12">
                <thead>
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
                                    <input type="hidden" id="user_id" name="user_id" value="">
                                    <button type="submit" class="btn btn-info"> แก้ไข</button>
                                </form>
                            </td>
                            <td>
                                <form action="del_atk_roud.php" method="post">
                                    <input type="hidden" id="user_id" name="user_id" value="">
                                    <button type="submit" class="btn btn-danger" onClick="return confirm('Do you really want to delete');"> ลบ</button>
                                </form>
                            </td>
                        </tr>
                    </thead>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>