<?php 


session_start();
require '../configs/env.php';
require '../configs/db.php';
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);
// $remember = $_POST['remember_me'];

if(empty($password)){
   $_SESSION['username_required'] = 'This field is required.';
}else if(empty($username)){
   $_SESSION['pass_required'] = 'This field is required.';
}else{

   
   $check_user_exist = "SELECT `username`,`email`,`password`,`status` FROM `users` WHERE `email` = '$username' OR `username` = '$username'";
   
   $excute_query = mysqli_query($con, $check_user_exist);
   if(mysqli_num_rows($excute_query) == 1){
      $get_user = mysqli_fetch_assoc($excute_query);
      if(password_verify($password,$get_user['password'])){
         if($get_user['status'] == 1){

            // if($remember){
            //    setcookie("username",$username, time()+3600*24);
            // }

            $_SESSION['USEREMAIL'] = $get_user['email'];
            header('location: ../admin/index.php');
         }else{
            $_SESSION['status_error'] = "Your status is deactivated. To activate your status contact with admin";
            header('location: login.php');
         }
      }else{
         $_SESSION['password_error'] = "Password is incorrect.";
         header('location: login.php');
      }
   
   }else{
      $_SESSION['username_error'] = "username or email is incorrect.";
      header('location: login.php');
   }
}


?>