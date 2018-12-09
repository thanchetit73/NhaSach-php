<script>
    function xoasach(){
        var conf= confirm(" Bạn có muốn xóa sản phẩm này không?");
        return conf;
    }
</script>
<?php
ob_start();
session_start();
include_once 'ketnoi.php';
include_once 'phantrang.php';

        
    //if (!isset($_SESSION["txtun"])) {
	// header('Location:login.php');
    //}
 //else {
     //$user=$_SESSION["txtun"];
        
   // }
         ?>
<?php
         include_once './sach/hienthisach.php';   
     
 ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/icon.jpg" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Quản lý Sách/Nhà Sách</title>
        <style>
            #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}
        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            }
        </style>
    </head>
    <body>
        <!--  Thanh công cụ-->
      <?php
       include 'header.php';
      ?>
        <!-- Menu -->        
       <div class="container">
            <ul class="breadcrumb">
                <li><a href="quanlysach.php"><span class="glyphicon glyphicon-home"></span><b>Quản lý sách</b></a></li>
                <li class="active"><span class="glyphicon glyphicon-list-alt"></span>Hiển thị sách</li>
                <li><a href="themsach.php"><span class="glyphicon glyphicon-plus"></span>Thêm mới sách</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>Cập nhật sách</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-trash"></span>Xóa sách</a></li>     
        </ul>
             <div class="row">
                    <div  class="col-sm-8">
                    <form  action="" method="get">
                    <div class="form-group">
                        <input size="10" type="text" class="form-control" placeholder="Nhập tên sách or tác giả" name="key">
                    </div>
                        <button type="submit" class="btn btn-primary">Tìm sách</button> 
                        <button style="float: right" type="submit" class="btn btn-default"><a href="./sach/themsach.php"><span class="glyphicon glyphicon-plus"></span>Thêm mới sách</a></button>
                  </form>
                        
            <hr>
                    </div>                   
                </div>
            <hr>
            
  <div class="list-group">
    <h3 style="text-align:center" class="list-group-item active">Danh sách sách đang bán</h3>
    <div class="list-group-item"> 
        
           <!-- hiển thị loại sách -->
                    
  <table class="table table-hover">
    <thead>
        <tr>
          <th style="text-align: center">STT</th>
        <th style="text-align: center"></th>
        <th style="text-align: center">Mã sách</th>
        <th style="text-align: center">Tên sách</th>
        <th style="text-align: center">Số lượng</th>
        <th style="text-align: center">Gía</th>
        <th style="text-align: center">Tác giả</th>
        <th style="text-align: center">Xóa</th>
        <th style="text-align: center">Sửa</th>
      </tr>
    </thead>
     <?php
     $i=1;
      while($row = $result->fetch_assoc()) { 
    ?>
    <tbody>
      <tr style="text-align: center">
          <td> <?php echo $i;?></td>
          <td><span><img width="100" height="150" src="./img/<?php echo $row['anh'];?>"></span></td>
          <td><span> <?php echo $row['masach'];?></span></td>
        <td><span style="color:red"> <?php echo $row['tensach'];?></span></td>
        <td><span style="color:red"> <?php echo $row['soluong'];?></span></td>
        <td><span style="color:red"> <?php echo $row['gia'];?></span></td>
        <td><span style="color:red"> <?php echo $row['tacgia'];?></span></td>
        <td> <a onclick="return xoasach();" href="sach/xoasach.php?&masach=<?php echo $row['masach'];?>"><span class="label label-danger">Xóa</span></a></td>
        <td> <a target="_blank" href="sach/capnhatsach.php?&masach=<?php echo $row['masach'];?>"><span class="label label-primary">Cập nhật</span></a></td></td>
      </tr>
      <?php
      $i++;
    }
      ?>
    </tbody>
  </table>

       <!-- hiển thị loại sách -->      

    
    
    
    </div>
   
  </div>
            <!-- phân trang -->
            <ul style="float:right" class="pagination">
    <li><?php echo $listpageql;?></li>
    
                </ul> 
</div>
        <div class="list-group">
    <h4 style="text-align:center" class="list-group-item active">&copy; 2018 | &nbsp; Huế BookStore | &nbsp; Design by Nhóm php | &nbsp; Contact: 0973468684 | &nbsp; Email : thanchetit73@gmail.com</h4>
            
    </div>
    </body>
</html>
