<?php
class GioHang {
    private $masach;
    private $tensach;
    private $anh;
    private $gia;
    private $soluong;
    private $tacgia;
    public function GioHang($masach,$tensach,$anh,$gia,$soluong,$tacgia)
    {
        $this->masach = $masach;
        $this->tensach = $tensach;
        $this->anh = $anh;
        $this->gia = $gia;
        $this->soluong = $soluong;
        $this->tacgia = $tacgia;
    }
   
            function getMasach() {
        return $this->masach;
    }

    function getTensach() {
        return $this->tensach;
    }

    function getAnh() {
        return $this->anh;
    }

    function getGia() {
        return $this->gia;
    }

    function getSoluong() {
        return $this->soluong;
    }
    function getTacgia(){
        return $this->tacgia;
    }
    function setMasach($masach) {
        $this->masach = $masach;
    }

    function setTensach($tensach) {
        $this->tensach = $tensach;
    }

    function setAnh($anh) {
        $this->anh = $anh;
    }

    function setGia($gia) {
        $this->gia = $gia;
    }

    function setSoluong($soluong) {
        $this->soluong = $soluong;
    }
    function setTacgia($tacgia){
        $this->tacgia = $tacgia;
    }
}
?>