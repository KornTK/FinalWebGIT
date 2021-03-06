<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM atk_open WHERE atopen_id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=show_atk_roud.php");
        }
    }


    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM atk_open WHERE faculty LIKE '%$search%'";
    $result = mysqli_query($connect, $sql); ?>
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
                                if ($search != "") {
                                    echo "กําลังแสดงข้อมูลของคถะ :" . $search;
                                    $showmsg = "กําลังแสดงข้อมูลของคณะ :" . $search;
                                } else {
                                    $showmsg = "";
                                } ?>
                                <form method="get" id="form" enctype="multipart/form-data" action="">
                                    <label for="exampleInputEmail1">ระบบค้นหารอบเปิดจอง จากชื่อคณะ</label>
                                    <input type="text" class="form-control" id="search" name="search" placeholder="ป้อนชื่อคณะที่ต้องการหา">
                                    <br>
                                    <button type="submit" class="btn btn-primary" style="margin-left: 1em;">ค้นหา <i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                                <form action="add_atk_roud.php">
                                    <button type="submit" class="btn btn-success" style="margin-left: 1em;">เพิ่มรอบตรวจ ATK</button>
                                </form>
                                <hr>
                                <?php
                                if ($showmsg != null) {
                                    echo '<center> <h2>' . $showmsg . '</h2></center>';
                                    echo "<center>
                  <a href='show_atk_roud.php' class='btn btn-primary'>แสดงทั้งหมด</a>

                  <br> <br>
                  </center>";
                                } ?>
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
                                                <td align='center'><?php echo $row["atopen_id"]; ?></td>
                                                <td><?php echo $row["date"]; ?></td>
                                                <td><?php echo $row["time"]; ?></td>
                                                <td><?php echo $row["location"]; ?></td>
                                                <td><?php echo $row["faculty"]; ?></td>
                                                <td><?php echo $row["brand"]; ?></td>
                                                <td><?php echo $row["amount"]; ?></td>
                                                <td>
                                                    <form action="edit_atk_roud.php" method="post">
                                                        <input type="hidden" id="atopen_id" name="atopen_id" value="<?php echo $row["atopen_id"]; ?>">
                                                        <button type="submit" class="btn btn-info"> แก้ไข <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                                <td>

                                                    <div>
                                                        <a data-id="<?php echo $row["atopen_id"]; ?>" href="?delete=<?php echo $row["atopen_id"]; ?>" class="btn btn-danger delete-btn"> ลบ <i class="fa fa-times" aria-hidden="true"></i></a>
                                                    </div>

                                                </td>
                                            </tr>
                                    </thead>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

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
                            icon: 'warning',
                            text: "หากลบแล้ว จะไม่สามารถกู้คืนได้!",
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'ลบ',
                            showLoaderOnConfirm: true,
                            preConfirm: function() {
                                return new Promise(function(resolve) {
                                    $.ajax({
                                            url: 'show_atk_roud.php',
                                            type: 'GET',
                                            data: 'delete=' + userId,
                                        })
                                        .done(function() {
                                            Swal.fire({
                                                title: 'success',
                                                text: 'ลบเรียบร้อยแล้ว!',
                                                icon: 'success',
                                            }).then(() => {
                                                document.location.href = 'show_atk_roud.php';
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
<?php
} ?>