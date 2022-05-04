<?php ob_start(); ?>
<?php
session_start();
/* Load factory class */
unset($_SESSION['email']);
unset($_SESSION['id']);
unset($_SESSION['user_id']);

session_destroy();

if (!isset($_SESSION['email'])) {
    header('Location:' . $main->siteurl . 'index.php');
    exit;
//echo 'logout';
} else {
    echo 'logout ไม่สำเร็จ';
}
?>
