<?php include("header.php"); ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>password update</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" href="style.css" />
<style>
.table-borderless td,
.table-borderless th {
    border: 0;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	border: 0;
}
</style>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
	<h1 style="color: Tomato; text-align: center">Change Password</h1>


	<form action="changepswd.php" method="post">
		<table align="center" class="table table-borderless">
			<tr>
				<td>Old password:</td>
				<td><input type="password" name="oldpassword" required></td>
			</tr>

			<tr>
				<td>New password:</td>
				<td><input type="password" name="newpassword" required></td>
			</tr>

			<tr>
				<td>Confirm new password:</td>

				<td><input type="password" name="confirmnewpassword" required></td>
			</tr>

			
			<tr>
			<td></td>
			<td>		<?php
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
					
					echo "<h3><center>Password Change Succesful. Re-directing to Home page</center></h3>";
					echo "<meta http-equiv='refresh' content='2;url=userhome.php'>";
					}
				}
				else{
					echo 'password and confirm password do not match.';
				}
				
				}	
			}
			?></td>
			</tr>
			<tr>
			<td></td>
				<td  colspan="2"><input type="submit"
					value="update" name="update"> <input type="submit" value="clear"></td>
			</tr>

		</table>

	</form>
	</div>
	</div>
	</div>
	<?php include 'footer.php'?>
</body>
</html>
