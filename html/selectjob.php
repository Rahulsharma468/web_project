<html>
<head>
	<title>
		Viewjob
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<style type="text/css">
		
		</style>

		<script type="text/javascript">
		function myFunction() {
		alert("Job successsfully assigned !!!");
		
	//Assigning the job to the user who takes up the job
		<?php
		$conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
		$select_db=mysqli_select_db($conn,'freelance') or die(mysqli_error($conn));
		//$sql="UPDATE project_details,signup set assigned_status='1' WHERE uname= "$_SESSION["uname"];
		?>
		header('location:dashboard.html');
		}
		</script>
		
		

</script>
</head>
<h1 class="text-info" style="text-align: center"><strong>VIEW JOB</strong></h1>   
<body>
	
<?php
	//if(isset($_GET["pid"]))
	$proid=$_GET["pid"];
	//echo $proid;

$conn=mysqli_connect('localhost','root','') or die(mysqli_error($conn));
$select_db=mysqli_select_db($conn,'freelance') or die(mysqli_error($conn));

$sql="SELECT * FROM project_details WHERE project_id='$proid' ";

$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if($result==true)
{
$rows=mysqli_fetch_assoc($result);
{
	$name=$rows['name'];
	$project_name=$rows['project_name'];
	$description=$rows['description'];
	$job_type=$rows['job_type'];
	$price_range=$rows['price_range'];
}
}
?>

<div class="container">
	<div class="row">
	<div class="col-md-1">
	</div>
	<div class="col-md-10">
<div class="jumbotron" >
	
      
  
	
<?php 
?>

<h3><strong>Name of the Company</strong></h3>
<?php 
echo "<h4>".$name."<br></h4>";
?>

<h3><strong>Project Name</strong></h3>
<?php 
echo "<h4>".$project_name."<br></h4>";
?>

<h3><strong>Job Description</strong></h3>
<?php 
echo "<h4>".$description."<br></h4>";
?>

<h3><strong>Job Type</strong></h3>
<?php 
echo "<h4>".$job_type."<br><h4>";
?>

<h3><strong>Estimated Price Range</strong></h3>
<?php 
echo "<h4>".$price_range."<br><h4>";
?>

<form action="#" method="post">
	<button onclick="myFunction()" class="btn btn-success btn-lg" type="submit" name="submit" value="submit">Take up the job</button>
</form>
</div>

</div>
<div class="col-md-1">
	</div>
</div>


</body>
</html>