<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['email'] == null)) {
    header('location:logout.php');
} else {
    $atopen_id = $_POST['atopen_id'];
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];


    $sql = "INSERT INTO `atk_booking` (`Book_ID`, `atopen_id`, `user_id`, `Date`, `time`) VALUES (NULL,
    '$atopen_id', '$user_id', '$date', '$time');";

   $result = mysqli_query($connect, $sql);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>จองเรียบร้อยแล้ว</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="assets/tem.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    </head>

    <body>
        <?php include 'header.php'; ?>
        <br>
        <section id="main-content">
            <section class="wrapper">
                <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px;
        border: none; padding: 50px; padding-top: 25px;">
                    <center>
                        <h1>จองตรวจ ATK เรียบร้อยแล้ว!</h1>
                        <p>โปรดอย่าลืมไปตามวันเวลาที่ท่านจอง</p>

                        <!-- QR Code here -->
                        <?php
                        include "phpqrcode/qrlib.php";
                        $PNG_TEMP_DIR = 'temp/';
                        if (!file_exists($PNG_TEMP_DIR))
                            mkdir($PNG_TEMP_DIR);

                        $filename = $PNG_TEMP_DIR . 'test.png';


                        $codeString = "การจองถูกต้อง ✓ \n";
                        $codeString .= "วันที่ : " . $date;
                        $codeString .= " เวลา : " . $time . "\n";
                        $codeString .= "จองโดย : " . $user_id . "\n";
                        $codeString .= "รหัสยืนยัน : " . $atopen_id;

                        $filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';

                        QRcode::png($codeString, $filename);

                        echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /> 
                        <p><strong>โปรดบันทึก QR ไว้สําหรับตรวจสอบ</strong></p>
                        <hr/>';


                        ?>
                        <!-- end of qr -->

                        <p>รายละเอียดการจอง</p>

                        <p>วันที่ : <?php echo $date; ?> เวลา : <?php echo $time; ?></p>
                        <p>จองโดย : <?php echo $user_id; ?></p>
                        <a href="show_infor.php" class="btn btn-info" role="button">กลับหน้าโปรไฟล์</a>
                        <button  onclick="window.print();" class="btn btn-success" role="button">ปริ้นหน้านี้</button>

                    </center>
                </div>
            </section>
        </section>
        <script type="text/javascript">
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'จองตรวจ ATK เรียบร้อยแล้ว!'
            });
        </script>
        <?php include 'footer.php'; ?>

    </body>

    </html>

<?php } ?>