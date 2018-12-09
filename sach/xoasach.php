<?php
session_start();
    include_once '../ketnoi.php';
    $masach=$_GET['masach'];
    $sql=" delete from sach where masach='$masach'";
    $query= mysqli_query($conn, $sql);
    header('location:../quanlysach.php');
?>

