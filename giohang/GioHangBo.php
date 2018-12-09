<?php
include 'GioHangDao.php';
class GioHangBO{
public function getgiohang() {
    $GioHang = new GioHangDao();
    return $GioHang->getgiohang();
}
public function Find($masach,$ds){
        $n = count($ds);
        for($i=0;$i<$n;$i++){
            if($ds[$i]->getMasach() == $masach)
            {
                return $i;
            }
        }
        return -1;
    }
    public function Delete($masach, $ds){
        $a = $this->Find($masach, $ds);
        array_splice($ds, $a,1);
        return $ds;
        
    }
    public function Update($masach,$soluong,$ds){
        $a = $this->Find($masach, $ds);
        $ds[$a]->setSoluong($soluong);
        return $ds;
    }
    public function CheckTrung($masach, $ds){
        $a = $this->Find($masach, $ds);
        $ds[$a]->setSoluong($ds[$a]->getSoluong() +1);
        return $ds;
                
    }
}

