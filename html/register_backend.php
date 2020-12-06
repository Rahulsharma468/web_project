
<?php
	include("config.php");
        function checkInput($data){
          $data = htmlspecialchars($data);
          $data = trim($data);
          $data = stripslashes($data);
          return $data;
        }
        
        function function_alert($message) { 
		    // Display the alert box  
		    echo "<script>alert('$message');</script>"; 
		} 

        if (isset($_POST['signup'])){
          // getting input values
          $userName = $_POST['username'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          //validation
           if(empty($userName) || empty($email) || empty($password)){
           	function_alert("*All fields are required");
             
            }
            else
            //Validate email, password and username
            {
                $userName = checkInput($userName);
                $email = checkInput($email);
                $password = checkInput($password);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                	function_alert("Invalid email format");
                	header('location:register.php');
                }
                elseif(strlen($userName) > 20){
                	function_alert("Username must be below 20 characters");
                    header('location:register.php');
                }
                elseif(strlen($password) < 6){
                	function_alert("Password is too short");
                   	header('location:register.php');
                }  
                else{
                   #allow entering data into database
                   $query = "INSERT INTO users (username,email,password) VALUES ('$userName','$email','$password')";
                   $data = mysqli_query($conn,$query);
                   //check
                   if($data){
                   	 function_alert("Account has been created log in now.");
                     header('location:dashboard.html');
                   }else{
                   	  function_alert("Oops something went wrong!!");
                      header('location:register.php');
                   }
                }
            }
        }
       ?>