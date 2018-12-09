<?php
ob_start();
session_start();
include_once '../ketnoi.php';
?>
<html>
    <title>Huế Bookstore/Đăng ký </title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<style>
    body{
        background-image: url(../img/hn.jpg);
        background-size: cover;
        background-position: center center ;
    }
    .form-signin
{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
}
.form-signin .form-signin-heading, .form-signin .checkbox
{
    margin-bottom: 10px;
}
.form-signin .checkbox
{
    font-weight: normal;
}
.form-signin .form-control
{
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus
{
    z-index: 2;
}
.form-signin input[type="text"]
{
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}
.form-signin input[type="password"]
{
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
.account-wall
{
    margin-top: 20px;
    padding: 40px 0px 20px 0px;
    background-color: #f7f7f7;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.login-title
{
    color: #555;
    font-size: 18px;
    font-weight: 400;
    display: block;
}
.profile-img
{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
.need-help
{
    margin-top: 10px;
}
.new-account
{
    display: block;
    margin-top: 10px;
}
</style>

 <body>
<?php
    if(isset($_POST['submit'])){
        if($_POST['txtun']==''){
            $error=" Vui lòng nhập đủ tài khoản và mật khẩu!";   
        }else{
            $user=$_POST['txtun'];
        }
        if($_POST['txtpass']==''){
            $error=" Vui lòng nhập đủ tài khoản và mật khẩu!";   
        }else{
            $pass=$_POST['txtpass'];
        }
        if($_POST['txtname']==''){
            $error=" Vui lòng nhập đủ họ tên!";   
        }else{
            $name=$_POST['txtname'];
        }
        if(isset($user) && isset($pass) && isset($name)){
            $sql=" INSERT INTO dangnhap(user,pass,displayname,type) values('$user','$pass','$name',1)";          
            $query = mysqli_query($conn,$sql);
            if ($query ===true)           
            {
               $tc =" Đăng ký thành công "; 
            }else
            {
                $error =" Tài khoản đã tồn tại";
            }
        }
    }
    if(isset($_SESSION["txtun"])=='admin' && $_SESSION["txtpass"]=='1')
        {
        header('location:../index.php');
        
        }
    else{
    ?>


<div class="container">
    <div class="row">
        <div class="col-md-2 text-center col-sm-4 col-xs-4"></div>
        <div class="col-md-8 text-center col-sm-4 col-xs-4">
            <h1 class="text-center login-title">Đăng ký thành viên Huế BookStore</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" method="post" action="reg.php">
                <input type="text" class="form-control" placeholder="Nhập tài khoản" required autofocus name="txtun">
                <input type="text" class="form-control" placeholder="Nhập mật khẩu" required name ="txtpass">
                <input type="text" class="form-control" placeholder="Nhập họ tên" required name ="txtname">
                <input type="hidden" class="form-control" placeholder="Nhập họ tên" value ="1" required name ="type">
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">
                    Đăng ký</button><?php if(isset($error))
      {
          echo '<span style="color:red">'.$error.'</span>';
      } if(isset($tc))
      {
          echo '<span style="color:red">'.$tc.'</span>';
      } 
          ?>
                
                
                <a href="login.php" class="text-center new-account">Nếu đã có tài khoản? Đăng nhập </a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
    <?php }?>