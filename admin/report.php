<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {

    $sql = "SELECT * FROM report_date ";
    $result = mysqli_query($connect, $sql); ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Admin | Report</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

    <?php include 'menu.php'; ?>

    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> รายงานยอดผู้เข้ารับการตรวจ</h3>

        <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> รายงานยอดผู้เข้ารับการตรวจทั้งหมด </h4>
                <br>
                <hr>
                <thead>
                  <tr>
                    <th width="40%">วันที่</th>
                    <th width="40%">จำนวนผู้รับการตรวจ</th>
                    <th width="20%"></th>


                  </tr>
                </thead>
            </div>

            <tbody>
            <?php
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
                              ?>
              <tr>
                <td><?php echo $row["p1"]; ?></td>
               
                <td>

                <?php
                 $p1 = $row["p1"];
                    $sql1 = "SELECT COUNT(*) AS total1
                    FROM atk_open
                    WHERE date = '$p1'";
                    $resultp1 = mysqli_query($connect, $sql1); 
                    
                    
                    ?>
                <?php 
                $rowp1 = mysqli_fetch_array($resultp1, MYSQLI_ASSOC); 
                echo $rowp1["total1"]." คน"; ?>


                </td>
                <td>
                  <form action="manage-users.php" method="get">
                  <input type="hidden" id="date" name="date" value="<?php echo $p1; ?>">

                    <button type="submit" class="btn btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
                  </form>
                </td>
                </tr>
                <tr>
                <td><?php echo $row["p2"]; ?></td>
                <td>

                <?php
                 $p2 = $row["p2"];
                    $sql2 = "SELECT COUNT(*) AS total2
                    FROM atk_open
                    WHERE date = '$p2'";
                    $resultp2 = mysqli_query($connect, $sql2); 
                    
                    
                    ?>
                <?php 
                $rowp2 = mysqli_fetch_array($resultp2, MYSQLI_ASSOC); 
                echo $rowp2["total2"]." คน"; ?>


                </td>
                <td>
                  <form action="manage-users.php" method="get">
                  <input type="hidden" id="date" name="date" value="<?php echo $p2; ?>">

                    <button type="submit" class="btn btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
                  </form>
                </td>
                </tr>
                <td><?php echo $row["p3"]; ?></td>
                <td>

                <?php
                 $p3 = $row["p3"];
                    $sql3 = "SELECT COUNT(*) AS total3
                    FROM atk_open
                    WHERE date = '$p3'";
                    $resultp3 = mysqli_query($connect, $sql3); 
                    
                    
                    ?>
                <?php 
                $rowp3 = mysqli_fetch_array($resultp3, MYSQLI_ASSOC); 
                echo $rowp3["total3"]." คน"; ?>


                </td>
                <td>
                  <form action="manage-users.php" method="get">
                  <input type="hidden" id="date" name="date" value="<?php echo $p3; ?>">

                    <button type="submit" class="btn btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
                  </form>
                </td>
              </tr>



            </tbody>
            </table>
            <!-- ตรงตั้งค่าว่าจะนําอะไรมาแสดง -->
            <form action="report_edit.php" method="post">
            <label for="fname">เลือกวันที่จะนํามาแสดง :</label>
  <input type="date" id="p1" name="p1" value="<?php echo $p1; ?>">
  <input type="date" id="p2" name="p2" value="<?php echo $p2; ?>">
  <input type="date" id="p3" name="p3" value="<?php echo $p3; ?>">
  <input class="btn btn-info" type="submit" value="ตั้งค่า">

            </form>
            <center>
              <br>
              <button class="btn btn-success" onClick="window.print()">ปริ้นรายงานหน้านี้</button>
            </center>
          </div>
        </div>
        </div>
      </section>
    </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script>
      $(function() {
        $('select.styled').customSelect();
      });
    </script>
  </body>

  </html>
<?php
} ?>