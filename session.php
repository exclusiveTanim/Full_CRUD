<?php
   include('database.php');

   session_start();
   $user_check = $_SESSION['login_user'];
   //echo "From check User :".$user_check;
   
   //$ses_sql = mysqli_query($conn,"select name from user where name = '$user_check' ");
   $sql = mysqli_query($conn,"SELECT name FROM user WHERE email='$user_check'");
   
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   
   $login_session = $row['name'];
   //echo "From Session PHP:".$login_session;
   
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
      die();
   }
?>