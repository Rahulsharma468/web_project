<?php
include("config.php");
session_start();
   if(isset($_POST['but_submit'])){

      $user = $_POST['username'];
      $pwd = $_POST['password'];
      $sql = "SELECT * FROM users WHERE username='$user' AND password='$pwd'";
      $data = mysqli_query($conn,$sql);
      $total = mysqli_num_rows($data);
      if($total == 1){
         $_SESSION['username'] = $user;
         header("location:dashboard.html") ;
      }else{
        echo '<script>alert("Account Not Found")</script>';
      }
   }
  ?>