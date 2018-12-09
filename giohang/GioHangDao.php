<?php
include 'GioHang.php';
class GioHangDao{
    public function getgiohang()
    {
        //$ds = array();
         session_start();
        $list = $_SESSION['GioHang'];
        return $list;
  
            
        //return ds;
    }
}

