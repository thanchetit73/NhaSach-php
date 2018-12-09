<?php
// xóa sesssion
ob_start();
session_start();
session_destroy();
// chuyển về trang login
header('location:login.php');


?>
