<html>  
<head>
<title>ICTYA Collections</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" />
<style>
	.required:before{
  content:"*";
  font-weight:bold;
}
.col-md-4{
  background: white;
}
</style>
</head>
<body>
<h1> <font face="courier" color="#C70039">ICTYA Collections-Employee Registration </font></h1>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="aboutus.php">About Us</a></li>
  <li><a href="login.php">Place Order</a></li>
  <li class="dropdown"><a href="order.php" class="dropbtn">Items</a>
    <div class="dropdown-content" >
      <a href="women1.php">Women</a>
      <a href="men.php">Men</a>
    </div>
  </li>
  <li><a href="register.php">Register</a></li>
  <li><a href="contact.php">Contact Us</a></li>
</ul>
<div class="bg">

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 login-sec">
		    <h2 class="text-center">Register</h2>
		    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">First Name</label>
    <input type="text" name="firstname"  required= "required" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Last Name</label>
    <input type="text" name="lastname"  required= "required" class="form-control" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Email</label>
    <input type="email" name="email"  required= "required" class="form-control" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Confirm Password</label>
    <input type="password" id="cpsw" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required class="form-control" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Phone Number</label>
    <input type="tel" name="phno"  required= "required"  required class="form-control" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Address</label>
    <textarea name="address" rows="6" cols="30" required= "required"  required class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  
    <div class="form-check">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary ">
        
    </div>
  
</form>
</div>
</div>
</div>

<?php
$Email=$Password = $Id=$firstname=$lastname=$cpassword=$phno=$address=$UserId=$groupId="";
$errors = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = test_input($_POST["email"]);
$password = test_input($_POST["password"]);
$firstname = test_input($_POST["firstname"]);
$lastname = test_input($_POST["lastname"]);
$cpassword = test_input($_POST["cpassword"]);
$phno = test_input($_POST["phno"]);
$address = test_input($_POST["address"]);
$UserId = test_input($_POST["UserId"]);
//$dob = test_input($_POST["dob"]);
//$groupId=3;

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
include("dbcontroller.php");
$db_handle = new DBController();
$conn = $db_handle->connectDB();
if (isset($_POST['submit'])) {
  // receive all input values from the form
  $UserId = mysqli_real_escape_string($conn, $_POST['UserId']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $phno = mysqli_real_escape_string($conn, $_POST['phno']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
	 // $groupId = mysqli_real_escape_string($conn, $_POST['groupId']);

 //if (empty($UserId)) { array_push($errors, "Username is required"); }
  if (empty($email)) { 
  echo '<script>alert("Email is required")</script>';
  //array_push($errors, "Email is required"); 
  }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $cpassword) {
	  echo '<script>alert("password and confirm password do not match.")</script>';
	//array_push($errors, "The two passwords do not match");
  }
  $user_check_query = "SELECT * FROM userprofile WHERE UserId='$UserId' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  //$user = mysqli_fetch_assoc($result);
if ($user=mysqli_fetch_assoc($result)) { // if user exists
    if ($user['UserId'] == $UserId) {
		echo '<script>alert("Username already exists.Please enter different Username")</script>';
      //array_push($errors, "Username already exists");
    }

   if ($user['email'] === $email) {
	   echo '<script>alert("Email already exists.Please enter different Email")</script>';
     // array_push($errors, "email already exists");
    }
  }
  //if (count($errors) == 0) 
  else {
  	$newpassword = md5($password);//encrypt the password before saving in the database

  $query = "INSERT INTO userprofile(firstname,lastname,email,UserId,password,phno,address,groupId) values ('$firstname','$lastname','$email','$UserId','$newpassword','$phno','$address','2')";
  
  	if(mysqli_query($conn, $query))
	{
		echo "new recored entered";
	}
  	//$_SESSION['username'] = $username;
  	//$_SESSION['success'] = "You are now logged in";
  	//header('location: index.php');
  }
  
}
?>
</div>
<?php include 'footer.php'?>
</body>
</html>