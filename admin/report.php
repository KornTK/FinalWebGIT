<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM user WHERE name LIKE '%$search%' ";
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
              <tr>
                <td>11/1/2565</td>
                <td>124 คน</td>
                <td>
                  <form action="manage-users.php" method="post">
                    <button type="submit" class="btn btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
                  </form>
                </td>
              </tr>
              <tr>
                <td>25/1/2565</td>
                <td>313 คน</td>
                <td>
                  <form action="manage-users.php" method="post">
                    <button type="submit" class="btn btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
                  </form>
                </td>
              </tr>
              <tr>
                <td>12/2/2565</td>
                <td>214 คน</td>
                <td>
                  <form action="manage-users.php" method="post">
                    <button type="submit" class="btn btn-primary">ดูรายชื่อผู้เข้ารับการตรวจ</button>
                  </form>
                </td>
              </tr>


            </tbody>
            </table>
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