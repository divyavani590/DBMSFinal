<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
		 
</head>

<?php

include("session.php");
$conn = $db_handle->connectDB();
if(isset($_POST['update'])){
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
	$confirmnewpassword=$_POST['confirmnewpassword'];
	$email=$_SESSION["email"];
	$changequery="select password from userprofile where email='$email'";
	if(mysqli_query($conn, $changequery)){
	if($confirmnewpassword==$newpassword){
		$newpassword=md5($newpassword);
		$sql="update userprofile set password='$newpassword' where email='$email'";
		if(mysqli_query($conn, $sql)){
			echo "password changed";
		
		echo "<h2><center>Page re-directing to login page</center></h2>";
		echo "<meta http-equiv='refresh' content='5;url=index.php'>";
		}
	}
	else{
		 echo '<script>alert("password and confirm password do not match.")</script>';
	}
	
	}
	
	
}



?>
</html>