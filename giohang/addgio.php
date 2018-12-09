<?php
    include 'GioHangBo.php';
    // khong isset
    $masach =  $_GET['masach'];
    $tensach =  $_GET['tensach'];
    $anh =  $_GET['anh'];
    $gia =  $_GET['gia'];
    //$soluong = $_GET['soluong'];
    $tacgia = $_GET['tacgia'];
    $giohang = new GioHang($masach, $tensach, $anh, $gia , 1,$tacgia);
    session_start();
    if(!isset($_SESSION['GioHang'])){
        $_SESSION['GioHang'] = array();
    }
    $gio = $_SESSION['GioHang'];
    $new_bo = new GioHangBO;
    //var_dump($new_bo->Find($masach, $gio));
    $a = $new_bo->Find($masach, $gio);
    if($a == -1){
        $hang = new GioHang($masach, $tensach, $anh, $gia, 1,$tacgia);
        array_push($_SESSION['GioHang'], $hang);
    }
    else
    {
        $gio[$a]->setSoluong($gio[$a]->getSoluong() + 1);
        //var_dump($gio[$a]);
        $_SESSION['GioHang'] = $gio;
    }
    //array_push($_SESSION['GioHang'], $giohang);
     // ve tc
    header('Location: ../giohang.php');
    
?>