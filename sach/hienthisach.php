<?php
include_once 'ketnoi.php';
include_once 'phantrang.php';
if(isset($_GET['maloai'])){
    $maloai=$_GET['maloai'];
}
if(isset($_GET['key'])){
    $key=$_GET['key'];
}
if(isset($_GET['tacgia'])){
    $tacgia=$_GET['tacgia'];
}

$sqlslide =$sql = "select * from sach inner join loai on sach.maloai=loai.maloai  ORDER by masach asc limit 1,4";
$resultslide = $conn->query($sqlslide);
$sql = "select * from sach inner join loai on sach.maloai=loai.maloai  ORDER by masach asc limit $perrow,$rowperpage ";
if(isset($maloai)!=NULL)
         $sql = "select * from sach inner join loai on sach.maloai=loai.maloai where loai.maloai='$maloai' ORDER by masach asc limit $perrow,$rowperpage ";
if(isset($key)!=NULL)
        $sql = "select * from sach inner join loai on sach.maloai=loai.maloai where sach.tensach like '%$key%' or sach.tacgia like '%$key%' ORDER by masach asc limit $perrow,$rowperpage ";
if(isset($tacgia)!=NULL)
        $sql = "select * from sach inner join loai on sach.maloai=loai.maloai where sach.tacgia like '%$tacgia%' ORDER by masach asc limit $perrow,$rowperpage ";
    


$result = $conn->query($sql);

?>
