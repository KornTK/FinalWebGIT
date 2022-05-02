<?php
session_start();

include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

$search = isset($_GET['search']) ? $_GET['search']:'';

$sql = "SELECT * FROM user WHERE name LIKE '%$search%'";
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

    <title>Admin | จัดการผู้ใช้งาน</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <?php include 'menu.php'; ?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> จัดการผู้ใช้งาน</h3>

				<div class="row">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> รายละเอียดของผู้ใช้งานทั้งหมด </h4>
                                  <br>
                                 <?php
                                if($search != ""){
                                    echo "กําลังแสดงข้อมูลชื่อ :".$search;
                                    $showmsg = "กําลังแสดงข้อมูลของชื่อ :".$search;
                                }else{
                                    $showmsg = "";
                                }
                                ?>
                                <form method="get" id="form" enctype="multipart/form-data" action="" >
                                    <label for="exampleInputEmail1">ระบบค้นหาผู้ใช้</label>
                                    <input type="text" class="form-control" id="search" name="search" placeholder="ป้อนชื่อที่ต้องการหา">
                                    <br>
                                    <button type="submit" class="btn btn-primary">ค้นหา <i class="fa fa-search" aria-hidden="true"></i></button>   
                                    </form>
                                    
                                    <form action="add_user.php">
                                    <button type="submit"  class="btn btn-success"> เพิ่มผู้ใช้งาน</button>
                                </form>
	                  	  	  <hr>
                                <?php 
                                if ($showmsg != null){ 
                                echo '<center> <h2>'.$showmsg.'</h2></center>'; 
                            }
                                ?>
                              <thead>
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
                              </thead>
                              <tbody>
                              <?php 
							  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
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
                                    <button type="submit" class="btn btn-danger" onClick="return confirm('Do you really want to delete');"> ลบ</button>
                                </form>
                                  </td>
                              </tr>
                              <?php } ?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>