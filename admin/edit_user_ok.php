<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    $user_id = $_POST['user_id'];

    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

    //form , to
    move_uploaded_file($_FILES["file"]["tmp_name"], "../pic/user/" . $user_id . "." . $extension);





    $prefix = $_POST['prefix'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    $faculty = $_POST['faculty'];
    $namefile = $user_id . "." . $extension;

    if(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) != null){
        $query = "UPDATE user 
    SET prefix = '$prefix',
    name = '$name',
    lname = '$lname',
    email = '$email',
    password = '$password',
    sex = '$sex',
    phone = '$phone',
    faculty = '$faculty',
    img = '$namefile'
    WHERE user_id = '$user_id'";
    }else{
        $query = "UPDATE user 
        SET prefix = '$prefix',
        name = '$name',
        lname = '$lname',
        email = '$email',
        password = '$password',
        sex = '$sex',
        phone = '$phone',
        faculty = '$faculty'
        WHERE user_id = '$user_id'";
    }
    $update = mysqli_query($connect, $query);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>แก้ไขข้อมูลผู้ใช้</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    </head>

    <body>
        <?php include 'menu.php'; ?>
        <br>
        <section id="main-content">
            <section class="wrapper">
                <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                    <center>
                        <h1>แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว!</h1>
                        <p>ระบบจะพาท่านกลับไปหน้าแสดงผู้ใช้งานทั้งหมด</p>
                    </center>

                </div>
            </section>
        </section>
        <script type="text/javascript">
            $(document).ready(function() {
                swal({
                    title: "แก้ไขข้อมูลผู้ใช้เรียบร้อยแล้ว!",
                    text: "ระบบจะพาท่านกลับไปหน้าแสดงผู้ใช้งานทั้งหมดในอีก 3 วินาที.",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false
                }, function() {
                    window.location.href = "manage-users.php";
                });
            });
        </script>
    </body>

    </html>
<?php
} ?>