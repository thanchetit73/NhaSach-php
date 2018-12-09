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
    if($_POST['tenloai']==''){
        $error_ts ='<span style="color:red">(*)</span>';
    } else {
        $tenloai=$_POST['tenloai'];
    }
    if($_POST['maloai']==''){
        $error_ms ='<span style="color:red">(*)</span>';
    } else {
        $maloai=$_POST['maloai'];
    }
   
   
    // sql thêm sách
    if(isset($tenloai) && isset($maloai)){
        $sql="INSERT INTO loai(maloai ,tenloai)
                VALUES ('$maloai', '$tenloai')";
        //$resultadd = $conn->query($sqladd);
        $query = mysqli_query($conn,$sql);
        //header('location:index.php');
        if ($query ===true) {
                           $tc="<span style='text-align:center'><strong>Thành công</strong>!Bạn đã thêm <strong>$tenloai</strong> thành công</span>";
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
        <title>Nhà Sách/Thêm loại</title>
        <style>
           
        </style>
    </head>
    <body>
        <!--  Thanh công cụ-->
   <?php 
   include '../header.php';
   ?>
        <!-- Menu -->
        
        <div class="container">
            <ul class="breadcrumb">
                <ul class="breadcrumb">
                <li><a href="../quanlyloai.php"><span class="glyphicon glyphicon-home"></span><b>Quản lý loại sách</b></a></li>
                <li ><span class="glyphicon glyphicon-list-alt"></span>Hiển thị loại</li>
                <li class="active"><a href="themloai.php"><span class="glyphicon glyphicon-plus"></span>Thêm mới loại</a></li>
                <li><
        </ul>
  <div class="list-group">
    <h3 style="text-align:center" class="list-group-item active">Thêm mới loại sách</h3>
    <div class="list-group-item"> 
        <div class="container"> 
             <!-- hiển thị loại sách -->
           <div class="col-sm-8 col-md-6 col-md-offset-3">
                      <?php if(isset($tc)){ echo "<div class='alert alert-success'>".$tc. "</div>" ;}?>
            </div>    
           <!-- hiển thị loại sách -->
          
          
    			<div class="row">
        		<div class="col-sm-8 col-md-6 col-md-offset-3">
                            <form action="themloai.php" method="post" enctype="multipart/form-data">				 			    
				  <div class="input-group">
				    <span class="input-group-addon"><b>Mã loại</b></span>
                                    <input class="form-control" type="text" value=""  name="maloai" ><?php if(isset($error_ms)){ echo $error_ms;}?>
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><b>Tên loại</b></span>
				    <input class="form-control" type="text" value="" name="tenloai"><?php if(isset($error_ts)){ echo $error_ts;}?>
				  </div>
				 
				
				  <input type="submit" class="btn btn-primary" name="add" value="Thêm">
                                  <a href="../quanlyloai.php"><input type="submit" class="btn btn-primary"name="cancel" value="Cancel"></a>
				</form>
				</div>
				</div>
            
           
         
     
  
</div>
    
    
    
   
  </div>
</div>
        </div>

    </body>
</html>
