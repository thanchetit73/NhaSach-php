<?php
ob_start();
session_start();
include_once '../ketnoi.php';;
?>
<?php
 $maloai=$_GET['maloai'];
$sql=" select * from loai where maloai='$maloai'";
$query= mysqli_query($conn,$sql);
$row= mysqli_fetch_array($query);

if (isset($_POST['update'])){
    if($_POST['tenloai']==''){
        $error_ts ='<span style="color:red">(*)</span>';
    } else {
        $tenloai=$_POST['tenloai'];
    }

    $maloai=$_GET['maloai'];
    // sql thêm sách
    if(isset($tenloai)){    
        $sqldel="update loai set tenloai ='$tenloai'
                where maloai='$maloai'";
        //$resultadd = $conn->query($sqladd);
        $querydel = mysqli_query($conn,$sqldel);
        //header('location:../quanlysach.php');
        if ($querydel ===true) {
                           $tc="<span style='text-align:center'><strong>Thành công</strong>!Bạn đã cập nhật <strong>$tenloai</strong> thành công</span>";
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
        <title>Nhà Sách/Sửa sách</title>
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
               <li><a href="../quanlyloai.php"><span class="glyphicon glyphicon-home"></span><b>Quản lý loại sách</b></a></li>
                <li ><span class="glyphicon glyphicon-list-alt"></span>Hiển thị loại</li>
                <li><a href="themloai.php"><span class="glyphicon glyphicon-plus"></span>Thêm mới loại</a></li>
                <li class="active"><a href="#"><span class="glyphicon glyphicon-wrench"></span>Cập nhật sách</a></li>          
        </ul><ul class="breadcrumb"><?php //if ($conn->query($sqladd) === TRUE){
        //echo "Thêm mới thành công"; }?>
            </ul>
  <div class="list-group">
    <h3 style="text-align:center" class="list-group-item active">Cập nhật loại sách</h3>
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
				    <span class="input-group-addon"><b>Mã loại</b></span>
                                    <input class="form-control" type="text" value="<?php echo $row['maloai'];?>"  name="maloai" disabled><?php if(isset($error_ms)){ echo $error_ms;}?>
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><b>Tên loại</b></span>
				    <input class="form-control" type="text" value="<?php echo $row['tenloai'];?>" name="tenloai"><?php if(isset($error_ts)){ echo $error_ts;}?>
				  </div>
				 
                               
				
				  <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                                  <a href="../quanlyloai.php"><input type="submit" class="btn btn-primary"name="cancel" value="Cancel"></a>
				</form>
				</div>
				</div>
				   
  
</div>
    
    
    
   
  </div>
</div>
        </div>
 <div class="list-group">
    <h4 style="text-align:center" class="list-group-item active">&copy; 2018 | &nbsp; Huế BookStore | &nbsp; Design by Nhóm php | &nbsp; Contact: 0973468684 | &nbsp; Email : thanchetit73@gmail.com</h4>
            
    </div>
    </body>
</html>
