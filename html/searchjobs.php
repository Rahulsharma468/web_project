<!DOCTYPE HTML>
<html lang="en">
<?php
//session is used to access the username which is stored in the session when the user logs in 
session_start();
?>
		<head >
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet"> 
	    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
	    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	    <link rel="icon" href="../svg/main.png">
	    



    
			<!----------------------------BOOTSRAP---------------------------->
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="dashboard.css">
			<!-- -------------------------------------------------------------->
			
			<!-- Some styling ------>
			<style type="text/css">
						select{
			background-color: #4CAF50;
			font-size:30px;
			}
			.input-select{
				width:250px;
				text-align: center;
			}
			</style>


/<!--************************** NAVBAR ****************************************** -->
    <header>
        <div class="container">
            <nav class="flex items-center justify-between">
                <div class="left flex items-center">
                    <div class="branding">
                        <a href="dashboard.html"><i class="fab fa-500px fa-3x">Jobly</i></a>
                    </div>
                    <div>
                        <a href="job_post.html" target="_self">Post</a>
                        <a href="searchjobs.php">Search</a>
                        <a href="#">About</a>
                        <a href="#">Services</a>
                        <a href="#"></a>
                    </div>
                </div>
                <div class="btn">
                    <a class="btn btn-primary"  href="profile.html">Profile</a>
                </div>
            </nav>
        </div>
    </header>
   <!-- ******************************************************************************* -->




		


			<!--<header align="center">-->
			
			<title>
			Look For Jobs		
			</title>

			<h1 class="text-info" align="center"><strong>JOBS AVAILABLE</strong></h1>
			
			<!--</header>-->

		</head>

		<hr>


		<body >

<!--------------------------LEFT HALF OF THE PAGE --------------------------------------------->
			<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">

    
    <h2 style="text-align: center;"><strong>Trending Jobs</strong></h2>
    
   
				<table class="table table-striped table-hover responsive">
				<tr class="text-info">
				<th >Project Name</th>
				<th >Job Type</th>
				<th >Price Range</th>
				<th >View Full Job</th>
				<!-- (Higher the trend rate,more the trend for this project) -->
				</tr>
				<?php

				$conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
				$select_db=mysqli_select_db($conn,'freelance') or die(mysqli_error($conn));

$sql="SELECT project_id,name,job_type,price_range,trend_rate FROM project_details where NOT assigned_status='1' order by trend_rate desc limit 10;";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));


		if($result==true)
			{					
			//$i=0;	
			
						while($rows=mysqli_fetch_assoc($result))
							{
								$name=$rows['name'];
								$pid=$rows['project_id'];
								//A restriction can be set here for the number of people who submit the forms
								$job_type=$rows['job_type'];
								$price_range=$rows['price_range'];
								//$trend_rate=$rows['trend_rate'];
				?>				
								<?php 
				 				echo '<tr>'; ?>
								
								
								<td ><?php echo $name ;?></td>
								<td ><?php echo $job_type ;?></td>
								<td ><?php echo $price_range ;?></td>
								
								<?php echo "<td><a href=selectjob.php?pid=",$pid,">View</a></td>";?>
								<!--<td><a href="selectjob.php?pid=">View </a></td>-->
								</tr>
								
								<?php
								
								
								

							}

			}
			
								?> 
	</table>

	
</div>

<!----------------------------------RIGHT HALF OF THE PAGE ------------------------------------>

	<div class="col-md-6">

   
    		<h2><strong>Search For Jobs</strong></h2>
    		
			<form method="post" action="searchjobs.php">
			<select    class="  form-control input-select " name="genre"   >
				<option  value="Front-end Developer">Front end Development</option>
				<option value="Back-end Developer">Back-end Development</option>
				<option value="Fullstack Developer">Full Stack Development</option>
				<option value="Database Admin">Database Administrator</option>
			</select>


			<button class="btn btn-md btn-info" type="submit" name="submit" value="submit"><span class="glyphicon glyphicon-search"></span>Search</button>
			</form>
		
 <br>




<div>
   
				
				<?php



$conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
$select_db=mysqli_select_db($conn,'freelance') or die(mysqli_error($conn));

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	?>
	<table class="table table-striped table-hover responsive" >
				<tr class="text-info">
				<th >Project Name</th>
				<th >Job Type</th>
				<th >Price Range</th>
				<th >View Full Job</th>
				
				<!-- (Higher the trend rate,more the trend for this project) -->
		</tr>


	<?php

$genre=$_POST['genre'];

$sql="SELECT project_id,name,job_type,price_range,trend_rate  FROM project_details where job_type='$genre' ;";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));



		if($result==true)
		{
//$genre=$_POST['genre'];
		?>
<h2> <?php echo $genre; ?> Jobs</h2>
<?php
			{					
				
			
						while($rows=mysqli_fetch_assoc($result))
							{
								$pid=$rows['project_id'];
								//echo $pid;
								$name=$rows['name'];

								//A restriction can be set here for the number of people who submit the forms
								$job_type=$rows['job_type'];
								$price_range=$rows['price_range'];
								//$trend_rate=$rows['trend_rate'];
							
				 				echo '<tr>'; ?>
								
								<td ><?php echo $name ;?></td>
								<td ><?php echo $job_type ;?></td>
								<td ><?php echo $price_range ;?></td>
								
								<?php echo "<td><a href=selectjob.php?pid=",$pid,">View</a></td>";?>
								</tr>
								<?php
								
							}

			}
			}
		}
								?>
	</table>
</div>
 

  </div>



	
 </div>
		</body>

</html>