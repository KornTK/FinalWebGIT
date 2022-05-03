<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'project_atk');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$connect = mysqli_connect("localhost", "root", "", "project_atk");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "project_atk";

 try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     // echo "Connected successfully";
     } catch(PDOException $e) {
     echo "Connection failed: " . $e->getMessage();
 }
