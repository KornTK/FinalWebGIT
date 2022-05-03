<?php
session_start();

include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else {
    $atopen_id = $_POST['atopen_id'];
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // echo $date,$time,$loca,$fac,$band,$howmany;
    $sql = "INSERT INTO `atk_booking` (`Book_ID`, `atopen_id`, `user_id`, `Date`, `time`) VALUES (NULL,
     '$atopen_id', '$user_id', '$date', '$time');";

    $result = mysqli_query($connect, $sql);

    if ($result) {
    } else {
        //
    } ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>เพิ่มคิวการจอง ATK</title>
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
                        <h1>เพิ่มคิวจองเรียบร้อยแล้ว!</h1>
                        <p>ระบบจะพาท่านกลับไปหน้าคิวทั้งหมด</p>
                    </center>

                </div>
            </section>
        </section>

        <script type="text/javascript">
            let timerInterval
            $(document).ready(function() {
                Swal.fire({
                    title: 'เพิ่มคิวจองเรียบร้อยแล้ว!',
                    icon: 'success',
                    html: 'ระบบจะพาท่านกลับไปหน้าคิวทั้งหมดในอีก <b></b> มิลิวินาที.',
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
                        window.location.href = "show_book_atk.php";
                    }
                });
            });
        </script>
    </body>

    </html>
<?php
} ?>