<?php

$connect = mysqli_connect("localhost", "root", "", "project_atk");
$sql = "SELECT * FROM user ";
$result = mysqli_query($connect, $sql);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
