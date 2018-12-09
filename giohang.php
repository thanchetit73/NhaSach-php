<!DOCTYPE html>
<?php //ob_start();
include './giohang/GioHangBo.php';
session_start();
include_once 'ketnoi.php';
include_once 'phantrang.php';
include_once './sach/hienthisach.php';
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Huế-BookStore Online</title>
    <!-- Bootstrap  -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.jpg" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide  Css -->
    <link href="css/main-style.css" rel="stylesheet" />
    <!--  -->
    <link href="css/style.css" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Book</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>HUE</strong> BookStore</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                

                <ul class="nav navbar-nav navbar-right">
                  
                    <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng</a></li>
                        <?php if(isset($_SESSION["txtun"])!=null){?>
                    <li><a href ="#">Xin chào<span style="color: lightblue"> <?php echo $_SESSION["txtun"]; ?></span></a></li>
                    <li><a href="./nguoidung/logout.php"><span class="glyphicon glyphicon-log-in"></span>Đăng xuất</a></li>
                    <?php } else{ ?>
                    <li><a href="nguoidung/login.php"><span class="glyphicon glyphicon-user"></span>Đăng nhập</a></li>
                    <?php } ?>
                    <li><a href="quanlysach.php"><span class="glyphicon glyphicon-cog"></span>Quản lý</a></li>
                        
                   
                </ul>
            </div>
        </div>
    </nav>
            <!-- /.navbar-collapse -->
        
        <!-- /.container-fluid -->
        
    

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main box-border">
                    
                    
                </div>
                <br />
            </div>
            <!-- /.col -->
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a class="list-group-item active "><b>Sách theo chủ đề</b>
                    </a>
                     <?php
                    $sql2 ="select * from loai";
                    $result2 = $conn->query($sql2);

                      while($row2 = $result2->fetch_assoc()) { 
                          $ml=$row2['maloai'];
                    ?>  
                    <ul class="list-group">
                             
                        
                        <li class="list-group-item"><a href="index.php?maloai=<?php echo $row2['maloai'];?>"><span style="color: blue">
                            <?php echo $row2['tenloai'];?></span>
                            <?php 
                            $sql3 ="SELECT COUNT(*) FROM sach WHERE sach.maloai='$ml'";
                            $result3 = $conn->query($sql3);
                            while($row3 = $result3->fetch_assoc()) { 
                              echo "(".$row3["COUNT(*)"].")";
                            ?>
                                </a>
                        </li>  
                        <?php
                            }
                            }
                            ?>
                    </ul>  
                </div>
                <!-- /.div -->
               
                <!-- /.div -->
                <div>
                    <a href="#" class="list-group-item active"><b>Sách theo tác giả</b>
                    </a>
                    <?php
                    $sqltg ="select DISTINCT tacgia from sach";
                    $resulttg = $conn->query($sqltg);
                      while($rowtg = $resulttg->fetch_assoc()) { 
                          $tg=$rowtg['tacgia'];
                    ?>  
                    <ul class="list-group">
                        <li class="list-group-item"><a href="index.php?tacgia=<?php echo $rowtg['tacgia'];?>"><span style="color: blue">
                            <?php echo $rowtg['tacgia'];?></span> 
                            <?php 
                            $sql4 ="SELECT COUNT(*) FROM sach WHERE tacgia='$tg'";
                            $result4 = $conn->query($sql4);
                            while($row4 = $result4->fetch_assoc()) { 
                              echo "(".$row4["COUNT(*)"].")";
                            ?>
                            </a>                            
                        </li>
                        <?php
                            }
                            }
                            ?>
                        
                    </ul>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><span class="glyphicon glyphicon-home"></span><a href="index.php">Huế Bookstore</a></li>
                        <li class="active">Danh sách sản phẩm</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div  class="col-sm-6">
                    <form  action="" method="get">
                    <div class="form-group">
                        <input size="10" type="text" class="form-control" placeholder="Nhập tên sách or tác giả" name="key">
                    </div>
                        <button type="submit" class="btn btn-primary">Tìm sách</button>
                  </form>
                    </div>
                    
                </div>
                <!-- /.row -->
                
                <!-- /.col -->
                <div class="row">
                          <?php
                   // session_start();

                if(isset($_SESSION['GioHang']))
                {
                        $tongtien = 0;
                        $giohang = $_SESSION['GioHang'];
                         if(isset($_POST['butupdate'])){
                           $ms = $_POST['ms'];
                           $sl = $_POST['sl'];
                            //var_dump($ms);
                            $BO = new GioHangBO;
                            $new = $BO->Update($ms, $sl, $giohang);
                            //var_dump($new);
                            $_SESSION['GioHang'] = $new;
                            $giohang = $_SESSION['GioHang'];
                            //var_dump($_SESSION['cart']);
                        }
                         if(isset($_POST['butxoa'])){
                           $ms = $_POST['ms'];
                            //var_dump($ms);
                            $BO = new GioHangBO;
                            $new = $BO->Delete($ms, $giohang);
                            //var_dump($new);
                            $_SESSION['GioHang'] = $new;
                            $giohang = $_SESSION['GioHang'];
                            //var_dump($_SESSION['']);
                        }
                        if($giohang!=null){
                            ?>
                                      <div class="list-group">
                    <h3 style="text-align:center" class="list-group-item active">Danh sách sách đặt mua</h3>
                    <div class="list-group-item"> 

                           <!-- hiển thị loại sách -->

                  <table class="table table-hover">
                    <thead>
                        <tr>
                        <th style="text-align: center"></th>                     
                        <th style="text-align: center">Tên sách</th>
                        <th style="text-align: center">Gía</th>
                        <th style="text-align: center">Tác giả</th>
                      </tr>
                    </thead>
                     <?php
                        $n= count($giohang);                     
                        $sl = $_POST['sl'];                     
                        for($i=0;$i<$n;$i++){
                            $g = $giohang[$i];
                            $tt = ($g->getGia())*$sl;
                            $tongtien+= $tt;

                            //var_dump($g);
                    ?>
                    <tbody>
                      <tr style="text-align: center">

                          <td><span><img width="100" height="150" src="./img/<?php echo $g->getAnh(); ?>"></span></td>                        
                        <td><span style="color:red"> <?php echo $g->getTensach(); ?></span></td>
                        <td><span style="color:red"> <?php echo $g->getGia(); ?></span></td>
                        <td><span style="color:red"> <?php echo $g->getTacgia(); ?></span></td>
                        
                    </tbody>

                       <!-- hiển thị loại sách -->          
                    </div>

                  </div>                                                                
                                <div style="font-weight: bold;">
                                                    <td>
                                    <span style="color: red">
                                        <form action="giohang.php" method="post">
                                        <input type="text" size="1" name="sl" value="<?php echo $g->getSoluong(); ?>">
                                        <input hidden="true" type="text" name="ms" value="<?php echo $g->getMasach(); ?>">

                                        <input type='submit' name='butupdate' value='Số lượng'>


                                        <input type='submit' name='butxoa' value='Xóa'>
                                        </form>                    </span>


                                </td>
                            </tr>
                        <?php } ?>
                        <hr>
                        <div>
                            <div><h3 style="color:red" style="float: center">Tổng tiền: <?php echo $tongtien; ?></h3><button style="float: right;">Thanh Toán</button></div>
                        </table>

                        <?php }
                else{
                        echo "Giỏ hàng bạn đang rỗng";
                }
                ?>
                <?php }
                else{
                        echo "Giỏ hàng bạn đang rỗng";
                }
                ?>
                                 </div>   
                    <!-- /.col -->
                </div>
                
                </div>
                <!-- /.row -->
                <div class="row">
                    <ul class="pagination alg-right-pad">                       
                        <li><?php// echo $listpage;?></li>                                             
                   </ul>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                
                <!-- /.row -->
                
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    

    <!--Footer -->
    <div class="col-md-12 footer-box">


       
        
        <div class="row">
            <div class="col-md-4">
                <strong>Ý kiến của khách hàng<br>(Rất vui khi nhận được sự góp ý của các bạn!) </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Họ tên">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Đại chỉ Email ">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Nội dung góp ý"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Gửi ý kiến</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Địa chỉ</strong>
                <hr>
                <p>
                     142 Nguyễn Huệ, Thành phố Huế,<br />
                                    Đối diện Nhà thờ DCCT Huế<br />
                    Di động: php<br>
                    Email: php<br>
                </p>

                2018  | Huế BookStore
            </div>
            <div class="col-md-4 social-box">
                <strong>Kết nối với chúng tôi </strong>
                <hr>
                <img width="40" height="40" src="img/fb.jpg">
                <img width="40" height="40" src="img/ytb.jpg">
                <img width="40" height="40" src="img/gmail.jpg">
                <p>
                    2018  | Huế BookStore
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        <h5>&copy; 2018 | &nbsp; Huế BookStore | &nbsp; Design by Nhóm php | &nbsp; Contact: xxxxxxxxx | &nbsp; Email : xxxxxxxxxxx@gmail.com </h5>
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--Core JavaScript file  -->
    <script src="boottrap/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="boottrap/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="boottrap/modernizr.custom.63321.js"></script>
    <script src="boottrap/jquery.catslider.js"></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
</body>
</html>
