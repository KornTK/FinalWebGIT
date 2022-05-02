<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $loca = $_POST['loca'];
    $fac = $_POST['fac'];
    $band = $_POST['band'];
    $howmany = $_POST['howmany'];

    // echo $date,$time,$loca,$fac,$band,$howmany;
    $sql = "INSERT INTO `atk_open` (`atopen_id`, `date`, `time`, `location`, `faculty`, `brand`, `amount`) VALUES (NULL,
     '$date', '$time', '$loca', '$fac', '$band', '$howmany');";

    $result = mysqli_query($connect, $sql);

    if ($result) {
    } else {
        //
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>เพิ่มวันตรวจ ATK</title>
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
                        <h1>เปิดรอบจอง ATK เพิ่มเรียบร้อยแล้ว!</h1>
                        <p>โปรดอย่าลืมอัพเดทสถานะระบบให้รับผลการตรวจ</p>
                    </center>

                </div>
            </section>
        </section>
        <script type="text/javascript">
    $(document).ready(function() {
        swal({
  title: "เปิดรอบจอง ATK เพิ่มเรียบร้อยแล้ว!",
  text: "ระบบจะพาไปหน้าแสดงรอบทั้งหมดในอีก 3 วินาที.",
  type: "success",
  timer: 3000,
  showConfirmButton: false
}, function(){
      window.location.href = "show_atk_roud.php";
});
    });
</script>
    </body>

    </html>
<?php } ?>