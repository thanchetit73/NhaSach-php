<?php
ob_start();
session_start();
include_once '../ketnoi.php';;
?>
<?php
$sqlloai=" select * from loai";
$masach=$_GET['masach'];
$resultloai = $conn->query($sqlloai);
$sql = "select * from sach where masach ='$masach'";
$query= mysqli_query($conn,$sql);
$row= mysqli_fetch_array($query);

if (isset($_POST['update'])){
    if($_POST['tensach']==''){
        $error_ts ='<span style="color:red">(*)</span>';
    } else {
        $tensach=$_POST['tensach'];
    }
    //if($_POST['masach']==''){
        //$error_ms ='<span style="color:red">(*)</span>';
    //} else {
       // $masach=$_POST['masach'];
    //}
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
    $masach=$_GET['masach'];
    $maloai=$_POST['maloai'];
    // sql thêm sách
    if(isset($tensach) && isset($anh) && isset($gia) && isset($soluong) && isset($tacgia)){
        $uploandanh= move_uploaded_file($anh_tmp,'../img/'.$anh);
        $sqldel="update sach set maloai='$maloai',tensach ='$tensach', anh='$anh', tacgia='$tacgia', soluong='$soluong', gia='$gia'
                where masach='$masach'";
        //$resultadd = $conn->query($sqladd);
        $querydel = mysqli_query($conn,$sqldel);
        //header('location:../quanlysach.php');
        if ($querydel ===true) {
                           $tc="<span style='text-align:center'><strong>Thành công</strong>!Bạn đã cập nhật <strong>$tensach</strong> thành công</span>";
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
                <li><a href="../quanlysach.php"><span class="glyphicon glyphicon-home"></span><b>Quản lý sách</b></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span>Hiển thị sách</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-plus"></span>Thêm mới sách</a></li>
                <li class="active"><span class="glyphicon glyphicon-wrench"></span>Cập nhật sách</li>
                <li><a href="#"><span class="glyphicon glyphicon-trash"></span>Xóa sách</a></li>
        </ul><ul class="breadcrumb"><?php //if ($conn->query($sqladd) === TRUE){
        //echo "Thêm mới thành công"; }?>
            </ul>
  <div class="list-group">
    <h3 style="text-align:center" class="list-group-item active">Cập nhật sản phẩm</h3>
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
                                    <input class="form-control" type="text" value="<?php echo $row['masach'];?>"  name="masach" disabled><?php if(isset($error_ms)){ echo $error_ms;}?>
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><b>Tên sách</b></span>
				    <input class="form-control" type="text" value="<?php echo $row['tensach'];?>" name="tensach"><?php if(isset($error_ts)){ echo $error_ts;}?>
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><b>Ảnh</b></span>
				    <input class="form-control" type="file" value="<?php echo $row['anh'];?>" name="anh"><?php if(isset($error_a)){ echo $error_a;}?>
				  </div>
				  <div class="input-group">
				    <span class="input-group-addon"><b>Gía</b></span>
				    <input class="form-control" value="<?php echo $row['gia'];?>" name="gia"><?php if(isset($error_g)){ echo $error_g;}?>
				  </div>
				  
				  <div class="input-group">
				    <span class="input-group-addon"><b>Số lượng</b></span>
				    <input class="form-control" value="<?php echo $row['soluong'];?>" name="soluong"><?php if(isset($error_sl)){ echo $error_sl;}?>
				  </div>
                                  <div class="input-group">
				    <span class="input-group-addon"><b>Tác giả</b></span>
				    <input class="form-control" value="<?php echo $row['tacgia'];?>" name="tacgia"><?php if(isset($error_tg)){ echo $error_tg;}?>
				  </div>
				   <label>Loại sách</label><br />
                                <select name="maloai">
                                    <option value="unselect" selected="selected">Lựa chọn loại sách</option>
                                    <?php
                                     while ($rowloai = $resultloai->fetch_assoc()){
                                    ?>
                                    <option <?php if($row['maloai']==$rowloai['maloai']){echo 'selected ="selected"';}?>value=<?php echo $rowloai['maloai'];?> ><?php echo $rowloai['tenloai']; ?></option>
                                    <?php
                                     }
                                    ?>

                                </select><?php if(isset($error_ml)){ echo $error_ml;}?>	<br>
                                <label>Thông tin chi tiết</label><br /><textarea cols="60" rows="12" name="chi_tiet_sp"></textarea><br>
				
				  <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                                  <a href="../quanlysach.php"><input type="submit" class="btn btn-primary"name="cancel" value="Cancel"></a>
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
