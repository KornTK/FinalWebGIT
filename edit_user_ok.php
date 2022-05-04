<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['email'] == null)) {
    header('location:logout.php');
} else {
    $user_id = $_POST['user_id'];

    $extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

    //form , to
    move_uploaded_file($_FILES["file"]["tmp_name"], "pic/user/" . $user_id . "." . $extension);





    $prefix = $_POST['prefix'];
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    $namefile = $user_id . "." . $extension;

    if(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION) != null){
        $query = "UPDATE user 
    SET prefix = '$prefix',
    name = '$name',
    lname = '$lname',
    password = '$password',
    sex = '$sex',
    phone = '$phone',
    img = '$namefile'
    WHERE user_id = '$user_id'";
    }else{
        $query = "UPDATE user 
        SET prefix = '$prefix',
        name = '$name',
        lname = '$lname',
        password = '$password',
        sex = '$sex',
        phone = '$phone'
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
        <title>จองเวลาตรวจ ATK</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="assets/tem.css" rel="stylesheet">


    </head>

    <body>
        <?php include 'header.php'; ?>

        <br>

        <div class="atkbook container mt-3 mb-3">

            <center>
                <h2>อัพเดทข้อมูลเรียบร้อยแล้ว</h2>
                <br>
                <a href="show_infor.php" class="btn btn-info" role="button">กลับหน้าโปรไฟล์</a>

            </center>


        </div>
        <?php include 'footer.php'; ?>
        </div>


        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} ?>