
<?php
include 'dbconnection.php';

$user_id = $_POST['user_id'];

$sql = "DELETE FROM user WHERE user_id = $user_id;";
$result = mysqli_query($connect, $sql);


if ($result) {
  header('Location: manage-users.php');
} else {
  //
}

?>
