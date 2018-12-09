<?php

$servername = "localhost";
$dbname = "qlsach";
$username = "root";
$password = "";
// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'UTF8');
//$dbconnect = mysqli_connect($localhost, $username, $password);
//$dbSelect= mysqli_select_db($conn, $dbname);
//$dbsetLang= mysqli_query("set NAME='utf-8'");
// Kiểm tra kết nối
//if ($conn->connect_error)
//die("Kết nối thất bại: " . $conn->connect_error);
//else
//echo "Kết nối thành công.";
?>

