<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not
if (strlen($_SESSION['email'] == null)) {
    header('location:logout.php');
} else {
    $email = $_SESSION['email']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองเวลาตรวจ ATK</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="assets/tem.css" rel="stylesheet">


    <link rel="stylesheet" href="./lib/jquery.fancybox.css" type="text/css" media="screen" />
<!-- fullcalendar -->
<link href='./fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='./fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<!-- bootstrap -->
<link href="./lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="./lib/jquery/dist/jquery.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src='./lib/moment.min.js'></script>
<script src='./fullcalendar/fullcalendar.min.js'></script>
<script src='./lib/lang/th.js'></script>
<script src="./lib/jquery.fancybox.pack.js"></script>
<script type="text/javascript">
         $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    lang: 'th',
    timezone: 'Asia/Bangkok',
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    events: 'dataEvents.php',
    selectable:true,
    selectHelper:true,
    select: function(start, end, allDay)
    {
    },
    eventClick:function(event)
    {
     if(confirm("คุณแน่ใช่ว่าต้องการจองวันนี้ใช่ไหม?"))
     {
      var id = event.id;
      $.ajax({
          
       url:"dontpostthis.php",
       type:"POST",
       data:{id:id},
       success:function(data)
       {
       },
       error: function () {
        document.location = "book_atk_input.php?atopen_id="+event.id;
        }
      })
     }
    },
   });
  });
    </script>
</head>

<body>
    <?php include 'header.php'; ?>

    <br>

    <div class="atkbook container mt-3 mb-3" style="width: 100em;">
    <div id="wrapper">
        <div class="container" >
            <center>
        <h1>จองเวลาตรวจ ATK</h1>
            <p class="booking">ให้ นศ.จองเวลาเข้ารับการตรวจ ATK ในเวลาที่ นศ.สะดวก และจะต้องลงทะเบียนล่วงหน้าเท่านั้น</p>
            <p class="booking">หาก นศ.ยังไม่ลงทะเบียนล่วงหน้าจะต้องเข้ารับการตรวจในช่วงเวลา walk in</p>
            </center>
            <div class="row">

                <div class='col-md-12'>
                    <div class="panel panel-default">
                        <div class="panel-heading bg-dark">
                            ปฏิทินเลือกวันจอง
                        </div>
                        <div class="panel-body">


                            <div class="row">
                                <div class="col-lg-12">
                                    <div id='calendar'></div>
                                    <div style="margin:10px 0 50px 0;" align="center">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
            
    </div>
    </div>
    <center>
            <br>
            <a href="show_infor.php" class="btn btn-info" role="button">กลับหน้าโปรไฟล์</a>
        </center>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <?php include 'footer.php'; ?>

</body>

</html>
<?php
} ?>