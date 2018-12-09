 <nav class="navbar navbar-inverse">
<span style="background-color: #555">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span><b><strong>Huế BookStore</strong></b></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Quản lý </b><span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="quanlysach.php">Sách</a></li>
            <li><a href="quanlyloai.php">Loại</a></li>
            <li><a href="quanlynguoidung.php">Khách hàng</a></li>
        </ul>
      </li>
      <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input style="size:100px" type="text" class="form-control" placeholder="Search">
      </div> 
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>  
    </form>   
    </ul>
    <ul class="nav navbar-nav navbar-right"> 
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
        <?php if(isset($_SESSION["txtun"])!=null){?>
        <li><a href ="#">Xin chào<span style="color: lightblue"> <?php echo $_SESSION["txtun"]; ?></span></a></li>
        <li><a href="./nguoidung/logout.php"><span class="glyphicon glyphicon-log-in"></span>Đăng xuất</a></li>
                    <?php } else{ ?>
        <li><a href="nguoidung/login.php"><span class="glyphicon glyphicon-user"></span>Đăng nhập</a></li>
                    <?php } ?>
    </ul>
  </div>
</nav> 