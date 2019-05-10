<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PMS Admin Panel</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--Required -->
    <link rel="stylesheet" href="<?php base_url();?>assets/bootstrap/css/bootstrap.min.css?v=1.0">
    <link rel="stylesheet" href="<?php base_url();?>assets/plugins/datatables/dataTables.bootstrap.css?v=1.0">
    <link rel="stylesheet" href="<?php base_url();?>assets/dist/css/font-awesome.min.css?v=1.0">
    <link rel="stylesheet" href="<?php base_url();?>assets/dist/css/ionicons.min.css?v=1.0">
    <link rel="stylesheet" href="<?php base_url();?>assets/dist/css/AdminLTE.min.css?v=1.0">
    <style type="text/css">
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
    margin: 10px;
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
    margin-top: 120px;
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
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">         
	<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-6">

            <div class="account-wall">
                <h1 class="text-center login-title">Log in to PMS</h1>
                <img class="profile-img" src="<?php base_url();?>assets/image/men.jpg" border="0" alt="">
                <span style="text-align:center"><?php echo validation_errors(); ?></span>
                <form class="form-signin" action="verifyLogin" method="post">
                <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <input name="submit_btn" value="Login" type="submit" class="btn btn-lg btn-primary btn-block">
               <!-- <label class="checkbox pull-left"><input type="checkbox" value="remember-me">Remember me</label>    -->          
                </form>
       </div>            
      </div>
     </div>
</div>    
       
    
</div></body></html>      
      
      

