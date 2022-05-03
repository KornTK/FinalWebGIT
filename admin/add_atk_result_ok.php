<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    $openid = $_POST['openid'];
    $stuid = $_POST['stuid'];
    $date = $_POST['date'];
    $resu = $_POST['resu'];
    $resu_text;
    if ($resu == 1) {
        $resu_text = "ติดเชื้อ (2ขีด)";
    } else {
        $resu_text = "ไม่ติดเชื้อ (1ขีด)";
    }

    // echo $date,$time,$loca,$fac,$band,$howmany;
    $sql = "INSERT INTO `atk_test` (`AT_ID`, `atopen_id`, `user_id`, `Date`, `result`) VALUES (NULL,
     '$openid', '$stuid', '$date', '$resu_text ');";

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
        <title>เพิ่มผลตรวจ ATK</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                        <h1>เพิ่มผลตรวจเรียบร้อยแล้ว!</h1>
                        <p>ระบบจะพาท่านกลับไปหน้าบันทึกผลตรวจ</p>
                    </center>

                </div>
            </section>
        </section>

        <script type="text/javascript">
            let timerInterval
            $(document).ready(function() {
                Swal.fire({
                    title: 'เพิ่มผลตรวจเรียบร้อยแล้ว!',
                    icon: 'success',
                    html: 'ระบบจะพาไปหน้าแสดงผลตรวจทั้งหมดในอีก <b></b> มิลิวินาที.',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 10)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* if timer is end */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                        window.location.href = "show_atk_result.php";
                    }
                });
            });
        </script>
    </body>

    </html>
<?php } ?>