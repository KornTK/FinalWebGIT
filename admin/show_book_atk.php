<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM atk_booking WHERE Book_ID = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=show_book_atk.php");
        }
    }

    $check1 = isset($_GET['check-twitter']) ? $_GET['check-twitter'] : '';
    $status_1 = isset($_GET['status_1']);
    if ($status_1 == 99) {
        $deletestmt3 = $conn->query("UPDATE `system_setting` SET `sys_id`='1',
            `name_setting`='main',`book_atk_allow`='f'");
        $deletestmt3->execute();
    }
    if ($check1 == 'on') {
        $deletestmt1 = $conn->query("UPDATE `system_setting` SET `sys_id`='1',
            `name_setting`='main',`book_atk_allow`='true'");
        $deletestmt1->execute();
    } else {
    }



    $search = isset($_GET['search']) ? $_GET['search'] : '';

    $sql = "SELECT * FROM atk_booking WHERE user_id LIKE '%$search%'";
    $result = mysqli_query($connect, $sql);


    $sql2 = "SELECT * FROM system_setting";
    $result2 = mysqli_query($connect, $sql2); ?>
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
                <h3><i class="fa fa-angle-right"></i> จัดการจองตรวจ ATK</h3>

                <div class="row">

                    <div class="col-md-12">

                        <div class="content-panel">

                            <table class="table table-striped table-advance table-hover">
                                <h4><i class="fa fa-angle-right"></i> รายละเอียดการจองทั้งหมด </h4>
                                <br>
                                <?php
                                        if ($search != "") {
                                            echo "กําลังแสดงข้อมูลของรหัสนักศึกษา :" . $search;
                                            $showmsg = "กําลังแสดงข้อมูลของรหัสนักศึกษา :" . $search;
                                        } else {
                                            $showmsg = "";
                                        } ?>
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-6 col-md-8">
                                        
                                        <form method="get" id="form" enctype="multipart/form-data" action="">
                                            <label for="exampleInputEmail1">ระบบค้นหารอบเปิดจอง จากรหัสนึกศึกษา</label>
                                            <input type="text" class="form-control" id="search" name="search" placeholder="ป้อนรหัสนักศึกษาที่ต้องการค้นหา">
                                            <br>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <button type="submit" class="btn btn-primary" style="margin-left: 1em;">ค้นหา <i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>


                                    </div>
                                    <div class="col-sm-2">
                                        <form action="add_book_atk.php">
                                            <button type="submit" class="btn btn-success" style="margin-left: 1em;">เพิ่มการจองตรวจ ATK</button>
                                        </form>
                                    </div>

                                </div>




                        </div>
                        <div class="col-6 col-md-4">
                            <?php
                            while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                                if ($row2["book_atk_allow"] == "true") {
                                    $check = "checked";
                                } else {
                                    $check = "unchecked";
                                } ?>
                                <form method="get" id="formName" enctype="multipart/form-data" action="">
                                    <center>
                                        <label class="form-check-label" for="inlineRadio2">อนุณาติให้ผู้ใช้จองตรวจ ATK</label>
                                        <br>
                                        <label class="switch">
                                            <input type="hidden" id="check-twitter" name="status_1" value="99">
                                            <input type="checkbox" name="check-twitter" onchange="document.getElementById('formName').submit()" name="status_1" <?php echo $check; ?>>
                                            <span class="slider round"></span>
                                        </label>
                                        <br><br>
                                        <!-- <input class="btn btn-success" type="submit" value="บันทึก" /> -->
                                    </center>
                                </form>

                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $("#formname").on("change", "input:checkbox", function() {
                                $("#formname").submit();
                            });
                        });
                    </script>

                    <hr>
                    <?php
                                if ($showmsg != null) {
                                    echo '<center> <h2>' . $showmsg . '</h2></center>';
                                    echo "<center>
                  <a href='show_book_atk.php' class='btn btn-primary'>แสดงทั้งหมด</a>

                  <br> <br>
                  </center>";
                                } ?>



                <?php
                            } ?>
                <div class="col-12">

                    <thead>
                        <tr>
                            <th width='10%'>รหัสการจอง</th>
                            <th width='20%'>เลขประจําตัว</th>
                            <th>วันที่</th>
                            <th>เวลา</th>
                            <th>รหัสรอบที่เปิด</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                            <tr>
                                <td align='center'><?php echo $row["Book_ID"]; ?></td>
                                <td><?php echo $row["user_id"]; ?></td>
                                <td><?php echo $row["Date"]; ?></td>
                                <td><?php echo $row["time"]; ?></td>
                                <td><?php echo $row["atopen_id"]; ?></td>
                                <td>
                                    <form action="edit_book_atk.php" method="post">
                                        <input type="hidden" id="Book_ID" name="Book_ID" value="<?php echo $row["Book_ID"]; ?>">
                                        <button type="submit" class="btn btn-info"> แก้ไข <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                                <td>

                                    <div>
                                        <a data-id="<?php echo $row["Book_ID"]; ?>" href="?delete=<?php echo $row["Book_ID"]; ?>" class="btn btn-danger delete-btn"> ลบ <i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>

                                </td>
                            </tr>
                    </thead>
                <?php } ?>
                </table>
               
                </div>
                
                </div>
                
                </div>
                </div>
</section>
</section>
</section>
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
                                            url: 'show_book_atk.php',
                                            type: 'GET',
                                            data: 'delete=' + userId,
                                        })
                                        .done(function() {
                                            Swal.fire({
                                                title: 'success',
                                                text: 'ลบเรียบร้อยแล้ว!',
                                                icon: 'success',
                                            }).then(() => {
                                                document.location.href = 'show_book_atk.php';
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