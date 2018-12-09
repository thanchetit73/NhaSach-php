<?php
ob_start();
session_start();
include_once '../ketnoi.php';
?>
<html>
    <title>Huế Bookstore/Đăng nhập </title>
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
        $type=$_POST['type'];
        if(isset($user) && isset($pass) && isset($type)){
            $sql=" SELECT * FROM dangnhap WHERE user='$user' and pass='$pass' and type='$type'";
            //$query = mysqli_query($sql);
            //$rows= mysqli_num_rows($query);
            $result = $conn->query($sql);
            //$row = $result->fetch_assoc();
            if ($result->num_rows > 0)
            //if($rows==1)
            {
                $_SESSION['type'] = $type;
                 $_SESSION['txtun']=$user;
                $_SESSION['txtpass']=$pass;
               // if($row['type']=="0"){
               // header("location:../quanlysach.php"); }
       // else {
            header('location:../index.php');
       // }
                
            }else
            {
                $error =" Tài khoản, mật khẩu hoặc quyền không đúng.";
            }
        }
        
    }
    ?>
    <?php
    if(isset($_SESSION["txtun"]))
        {
        header('location:../index.php');
        
        }
    else{
    ?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Đăng nhập vào Huế BookStore</h1>          
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin" method="post" action="login.php">
                <input type="text" class="form-control" placeholder="Nhập tài khoản" required autofocus name="txtun">
                <input type="password" class="form-control" placeholder="Nhập mật khẩu" required name ="txtpass">
                  <input type="radio" name="type" value="0" checked> Quản lý<br>
                    <input type="radio" name="type" value="1"> Khách hàng<br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">
                    Đăng nhập</button><?php if(isset($error))
      {
          echo '<span style="color:red">'.$error.'</span>';
      }
          ?>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                        Nhớ mật khẩu?
                </label>
                <a href="#" class="pull-right need-help">Quên mật khẩu? </a><span class="clearfix"></span>
                <a href="reg.php" class="text-center new-account">Đăng kí tài khoản mới? </a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
    <?php }?>