<?php
session_start();
error_reporting(0);
include("dbconnection.php");
if (isset($_POST['login'])) {
	$adminusername = $_POST['username'];
	$pass = md5($_POST['password']);
	$ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$extra = "manage-users.php";
		$_SESSION['login'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		echo "<script>window.location.href='" . $extra . "'</script>";
		exit();
	} else {
		$_SESSION['action1'] = "*Invalid username or password";
		$extra = "index.php";
		echo "<script>window.location.href='" . $extra . "'</script>";
		exit();
	}
}

?>

<!doctype html>
<html lang="en">

<head>
	<title>Admin | Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
<div id="login-page">	
<section class="ftco-section">
		<div class="container">
		<form action="" class="form-login signin-form" method="post">

			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"><center>
    <img src="images/logo.png" alt="" width="20%" height="20%">
</center></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<center>
							<h3 class="mb-4 text-center">ยินดีต้อนรับเอดมิน <br> กรุณาเข้าสู่ระบบ</h3>
							<?php echo $_SESSION['action1']; ?><?php echo $_SESSION['action1'] = ""; ?></p>
</center>
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้"  autofocus>
							</div>
							<div class="form-group">
								<input type="password" name="password" class="form-control" placeholder="รหัสผ่าน" required>
							</div>
							<div class="form-group">
								<button type="submit" name="login" class="form-control btn btn-primary submit px-3">เข้าสู่ระบบ</button>
							</div>
							<label class="checkbox-wrap checkbox-primary" style="margin-left: 100px;">จดจําการเข้าสู่ระบบ
								<input type="checkbox" checked>
								<span class="checkmark"></span>
							</label>

						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>

	<script>
		$.backstretch("assets/img/login-bg.jpg", {
			speed: 500
		});
	</script>
</body>

</html>