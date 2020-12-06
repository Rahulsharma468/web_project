 <?php
   session_start();
   $userProfileName = $_SESSION['username'];
   //check
   if(isset($userProfileName)){

   }else{
       //back to login page
       header("location:login.php");
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
</head>
<body>
  <div class="container text-white text-center bg-dark py-5 ">
       <h2><?php echo "&#9786; Hello " .$userProfileName; ?></h2>
       <a class="btn btn-secondary mt-2" href="logout.php">logout</a> 
</div>
</body>
</html>