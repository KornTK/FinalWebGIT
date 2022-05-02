<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if (isset($_POST['login'])) {
  $email = $_POST['SiSID'];
  $pass = ($_POST['SiSpassword']);

  $ret = mysqli_query($connect, "SELECT * FROM user WHERE Email='$email' and password='$pass'");
  $num = mysqli_fetch_array($ret);
  if ($num > 0) {
    $extra = "show_infor.php";
    $_SESSION['email'] = $email;
    echo "<script>window.location.href='" . $extra . "'</script>";
    exit();
  } else {
    $_SESSION['action1'] = "*ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    $extra = "index.php";
    echo $num;
    echo "<script>window.location.href='" . $extra . "'</script>";
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Sign in</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="assets/tem.css" rel="stylesheet">
</head>

<body>
  <center>
    <img src="pic/logo.png" alt="" width="20%" height="20%">
    <br>
  </center>
  <div id="login-page">
    <div class="container mt-3 mb-3" style="background-color: white; border-radius: 20px; width: 600px;
        border: none; padding: 50px; padding-top: 25px;">

      <form class="form-login" action="" method="post">
        <center>
          <h1>Sign In</h1>
          <p>Please input your passport account name and your Password</p>
          <p>กรุณากรอกบัญชี PSU Passport และรหัสผ่าน</p>
        </center>
        <p style="color:#F00; padding-top:20px;" align="center">
          <?php 
          echo $_SESSION['action1']; ?><?php echo $_SESSION['action1'] = ""; ?></p>
        <div class="login-wrap">
          <input name="SiSID" class="form-control" placeholder="User ID" autofocus>
          <br>
          <input type="password" name="SiSpassword" class="form-control" placeholder="Password"><br>
          <input name="login" class="btn btn-primary " type="submit">
        </div>
      </form>

    </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("assets/img/login-bg.jpg", {
      speed: 500
    });
  </script>


</body>

</html>