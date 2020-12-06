<?php
  $host = "localhost";
  $user = "root";
  $password = "";
  $dbname = "user_data";
  //connect
  $conn = mysqli_connect($host,$user,$password,$dbname);
  //check
  if($conn){
      echo "";
  }
  else{
      die("Connection-Error: ".mysqli_connect_error());
  }
?>