<?php
ob_start();
session_start();
include_once '../ketnoi.php';;
?>
<?php
$sqlloai=" select * from loai";
//$queryloai= mysqli_query($sqlloai);
$resultloai = $conn->query($sqlloai);
// check thông tin trong textbox
//if (isset($_POST['cancel'])){
    //header('location:themsach,php');   
//}
if (isset($_POST['add'])){
    if($_POST['tensach']==''){
        $error_ts ='<span style="color:red">(*)</span>';
    } else {
        $tensach=$_POST['tensach'];
    }
    if($_POST['masach']==''){
        $error_ms ='<span style="color:red">(*)</span>';
    } else {
        $masach=$_POST['masach'];
    }
   // kiểm tra ảnh
    if($_FILES['anh']['name']==''){
        $error_a ='<span style="color:red">(*)</span>';
    } else {
        $anh=$_FILES['anh']['name'];
        $anh_tmp=$_FILES['anh']['tmp_name'];
    }
    //
    if($_POST['gia']==''){
        $error_g ='<span style="color:red">(*)</span>';
    } else {
        $gia=$_POST['gia'];
    }
    //
    if($_POST['soluong']==''){
        $error_sl ='<span style="color:red">(*)</span>';
    } else {
        $soluong=$_POST['soluong'];
    }
    if($_POST['tacgia']==''){
        $error_tg ='<span style="color:red">(*)</span>';
    } else {
        $tacgia=$_POST['tacgia'];
    }
    // mã loại
     if($_POST['maloai']=='unselect'){
        $error_ml ='<span style="color:red">(*)</span>';
    } else {
        $maloai=$_POST['maloai'];
    }
    // sql thêm sách
    if(isset($tensach) && isset($masach) && isset($maloai) && isset($anh) && isset($gia) && isset($soluong) && isset($tacgia)){
        $uploaded_file= move_uploaded_file($anh_tmp,'../img/'.$anh);
        $sql="INSERT INTO sach (tensach , masach , maloai , anh , tacgia , soluong , gia)
                VALUES ('$tensach', '$masach', '$maloai','$anh','$tacgia','$soluong','$gia')";
        //$resultadd = $conn->query($sqladd);
        $query = mysqli_query($conn,$sql);
        //header('location:index.php');
        if ($query ===true) {
                           $tc="<span style='text-align:center'><strong>Thành công</strong>!Bạn đã thêm <strong>$tensach</strong> thành công</span>";
                            }
        
    }
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/icon.jpg" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Nhà Sách/Thêm sách</title>
        <style>
           
        </style>
    </head>
    <body>
        <!--  Thanh công cụ-->
   <?php 
   include '../header.php';
   ?>
        <!-- Menu -->
 <?php
 $sql1 = " select tenloai from loai";
 $result1 = $conn->query($sql1);
 ?>
        
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="../quanlysach.php"><span class="glyphicon glyphicon-home"></span><b>Quản lý sách</b></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>Hiển thị sách</a></li>
                <li class=""active"><span class="glyphicon glyphicon-plus"></span>Thêm mới sách</li>
                <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>Cập nhật sách</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-trash"></span>Xóa sách</a></li>
        </ul>
  <div class="list-group">
    <h3 style="text-align:center" class="list-group-item active">Thêm mới sản phẩm</h3>
    <div class="list-group-item"> 
        <div class="container"> 
             <!-- hiển thị loại sách -->
           <div class="col-sm-8 col-md-6 col-md-offset-3">
                      <?php if(isset($tc)){ echo "<div class='alert alert-success'>".$tc. "</div>" ;}?>
            </div>    
           <!-- hiển thị loại sách -->
          
          
    			<div class="row">
        		<div class="col-sm-8 col-md-6 col-md-offset-3">
                <form action="" method="post" enctype="multipart/form-data">				 			    
				  <div class="input-group">
				    <span class="input-group-addon"><b>Mã sách</b></span>
                                    <input class="form-control" type="text" value=""  name="masach" ><?php if(isset($error_ms)){ echo $error_ms;}?>
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><b>Tên sách</b></span>
				    <input class="form-control" type="text" value="" name="tensach"><?php if(isset($error_ts)){ echo $error_ts;}?>
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><b>Ảnh</b></span>
				    <input class="form-control" type="file" value="" name="anh"><?php if(isset($error_a)){ echo $error_a;}?>
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><b>Gía</b></span>
				    <input class="form-control" value="" name="gia"><?php if(isset($error_g)){ echo $error_g;}?>
				  </div>
				  
				  <div class="input-group">
				    <span class="input-group-addon"><b>Số lượng</b></span>
				    <input class="form-control" value="" name="soluong"><?php if(isset($error_sl)){ echo $error_sl;}?>
				  </div>
                                  <div class="input-group">
				    <span class="input-group-addon"><b>Tác giả</b></span>
				    <input class="form-control" value="" name="tacgia"><?php if(isset($error_tg)){ echo $error_tg;}?>
				  </div>
				   <label>Loại sách</label><br />
                                <select name="maloai">
                                    <option value="unselect" selected="selected">Lựa chọn loại sách</option>
                                    <?php
                                     while ($rowloai = $resultloai->fetch_assoc()){
                                    ?>
                                    <option value=<?php echo $rowloai['maloai'];?> ><?php echo $rowloai['tenloai']; ?></option>
                                    <?php
                                     }
                                    ?>

                                </select><?php if(isset($error_ml)){ echo $error_ml;}?>	<br>
                                <label>Thông tin chi tiết</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"></textarea><br>
				
				  <input type="submit" class="btn btn-primary" name="add" value="Thêm">
                                  <a href="../quanlysach.php"><input type="submit" class="btn btn-primary"name="cancel" value="Cancel"></a>
				</form>
				</div>
				</div>
            
           
         
     
  
</div>
    
    
    
   
  </div>
</div>
        </div>

    </body>
</html>
