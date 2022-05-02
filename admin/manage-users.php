<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {

  if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $deletestmt = $conn->query("DELETE FROM user WHERE user_id = $delete_id");
    $deletestmt->execute();
    
    if ($deletestmt) {
        echo "<script>alert('Data has been deleted successfully');</script>";
        $_SESSION['success'] = "Data has been deleted succesfully";
        header("refresh:1; url=manage-users.php");
    }
}


  $search = isset($_GET['search']) ? $_GET['search'] : '';

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
                if ($search != "") {
                  echo "กําลังแสดงข้อมูลชื่อ :" . $search;
                  $showmsg = "กําลังแสดงข้อมูลของชื่อ :" . $search;
                } else {
                  $showmsg = "";
                }
                ?>
                <form method="get" id="form" enctype="multipart/form-data" action="">
                  <label for="exampleInputEmail1"> ระบบค้นหาผู้ใช้</label>
                  <input type="text" class="form-control" id="search" name="search" placeholder="ป้อนชื่อที่ต้องการหา">

                  <br>

                  <button type="submit" class="btn btn-primary" style="margin-left: 1em;">ค้นหา <i class="fa fa-search" aria-hidden="true"></i></button>
                </form>

                <form action="add_user.php">
                  <button type="submit" class="btn btn-success" style="margin-left: 1em;"> เพิ่มผู้ใช้งาน</button>
                </form>
                <hr>
                <?php
                if ($showmsg != null) {
                  echo '<center> <h2>' . $showmsg . '</h2></center>';
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
                    <th>ลบ</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
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
                      <td>
                        <!-- <form action="del_user.php" method="post">
                                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $row["user_id"]; ?>">
                                    <button type="submit" class="btn btn-danger" onClick="return confirm('Do you really want to delete');"> ลบ</button>
                                </form> -->
                        <div>
                          <a data-id="<?php echo $row["user_id"]; ?>" href="?delete=<?php echo $row["user_id"]; ?>" class="btn btn-danger delete-btn"> ลบ <i class="fa fa-times" aria-hidden="true"></i></a>
                        </div>

                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
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
     <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
                <script>

        //เข้าถึง class 
        $(".delete-btn").click(function(e) {
            var userId = $(this).data('id');
            e.preventDefault();
            deleteConfirm(userId);
        })

        function deleteConfirm(userId) {
            Swal.fire({
                title: 'คุณต้องการจะลบใช่หรือไม่?',
                text: "หากลบแล้ว จะไม่สามารถกู้คืนได้!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ลบ',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: 'manage-users.php',
                                type: 'GET',
                                data: 'delete=' + userId,
                            })
                            .done(function() {
                                Swal.fire({
                                    title: 'success',
                                    text: 'ลบเรียบร้อยแล้ว!',
                                    icon: 'success',
                                }).then(() => {
                                    document.location.href = 'manage-users.php';
                                })
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'มีบางอย่างผิดพลาดกับระบบหลังบ้าน ajax !', 'error')
                                window.location.reload();
                            });
                    });
                },
            });
        }
    </script>

  </body>

  </html>
<?php } ?>