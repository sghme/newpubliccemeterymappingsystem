<?php
require_once("../include/initialize.php");

 ?>
  <?php
 // login confirmation
  if(isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Cemetery Mapping and Information System</title>

<!-- Bootstrap core CSS -->
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>css/jquery.dataTables.css"> 
<link href="<?php echo web_root; ?>css/bootstrap.css" rel="stylesheet" media="screen">

<link href="<?php echo web_root; ?>fonts/font-awesome.min.css" rel="stylesheet" media="screen">
<!-- Plugins -->
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/jquery.dataTables.js"></script>
<!-- <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/fixnmix.js"></script> / -->
 <link rel="icon" href="<?php echo web_root; ?>img/cempicme.png" type="image/x-icon">  


<style>
@CHARSET "UTF-8";


.progress-bar {
    color: #333;
} 

*{
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    outline: none;
}

    .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 7px;
    @include box-sizing(border-box);

    &:focus {
      z-index: 2;
    }
  }

body {
  /*background: url(../img/bgadmin5.jpg) no-repeat center center fixed;*/
  background-color: #eee;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.login-form {
  margin-top: 70px;
}

form[role=login] {
  color: #5d5d5d;
  background: #fff;
  padding: 26px;
  /*border:solid 5px #eee;*/
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
  form[role=login] img {
    display: block;
    margin: 0 auto;
    margin-bottom: 35px;
    height: 90px;
  }
  form[role=login] input,
  form[role=login] button {
    font-size: 18px;
    margin: 16px 0;
  }
  form[role=login] > div {
    text-align: center;
  }
  
/* .form-links {
  text-align: center;
  margin-top: 1em;
  margin-bottom: 50px;
}
  .form-links a {
    color: #fff;
  } */
 @media only screen and (max-width:500px),(max-width:650px),(max-width:780px),(max-width:890px) {
  form[role=login] {
  padding: 26px;
  margin: 60px;
}
 }
</style>
 
<body  >


<div class="container">
  

    <div class="col-md-4"></div>
    
    <div class="col-md-4">

      <section class="login-form"> <? echo check_message(); ?>
        <form method="post" action="" role="login">
          <!-- <img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" /> -->
           <img src="../img/cempicme.png" height="25px" class="img-responsive" alt="" />
         
          <input type="input" name="user_email" placeholder="Username" required class="form-control input-lg" value="" />
          
          <input type="password" name="user_pass" class="form-control input-lg" id="password" placeholder="Password" required  />
          
          
          <!-- <div class="pwstrength_viewport_progress"></div>
          
           -->
          <button type="submit" name="btnLogin" class="btn btn-lg btn-primary btn-block">Sign in</button>
          <!-- <div>
            <a href="#">Back</a>
          </div> -->
          
        </form>
        
        
      </section>  
      </div>
      
     
      


  
     
  
  
</div>
   
</body>

 <?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user::userAuthentication($email, $h_upass);
    if ($res==true) { 
       message("You logon as ".$_SESSION['U_ROLE'].".","success");
      if ($_SESSION['U_ROLE']=='Administrator'){
         redirect(web_root."admin/index.php");
      }else{
           redirect(web_root."admin/login.php");
      }
    }else{
      message("Account does not exist! Please contact Administrator.", "error");
       redirect(web_root."admin/login.php"); 
    }
 }
 } 
 ?> 
</head>
</html>