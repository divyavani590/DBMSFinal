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
$Email=$Password = $Id=$firstname=$lastname=$cpassword=$phno=$address=$UserId=$dob=$groupId="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$Email = test_input($_POST["Email"]);
$Password = test_input($_POST["Password"]);
$firstname = test_input($_POST["firstname"]);
$lastname = test_input($_POST["lastname"]);
$cpassword = test_input($_POST["cpassword"]);
$phno = test_input($_POST["phno"]);
$address = test_input($_POST["address"]);
$UserId = test_input($_POST["UserId"]);
$dob = test_input($_POST["dob"]);
$groupId=2;

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['submit'])){
   login($Email,$firstname,$lastname,$UserId,$dob,$Password,$cpassword,$phno,$address,$groupId);
}
?>
<?php
function login($Email,$firstname,$lastname,$UserId,$dob,$Password,$cpassword,$phno,$address,$groupId){
if ($Password==$cpassword){
$servername = "localhost";
$dbusername = "root";
$dbpassword = "monica";
$dbname = "ictya";
$mysqli= new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
$query = 'SELECT Email FROM users WHERE (Email=:Email1)';
if($stmt = $mysqli->prepare($query)){
	$stmt->bindParam(':Email1', $Email, PDO::PARAM_STR);
    $stmt->execute();
	$rows = $stmt->fetch(PDO::FETCH_NUM);
    }else die("Failed to prepare query");
if($rows > 0) {
	echo "Email already exists";
	}else{
	$query = 'INSERT INTO users(firstname,lastname,Email,UserId,dob,Password,phno,address,groupId) values (:firstname1,:lastname1,:Email1,:UserId1,:dob1,:Password1,:phno1,:address1,:groupId1)';
if($stmt = $mysqli->prepare($query)){
	$stmt->bindParam(':firstname1', $firstname, PDO::PARAM_STR);
	$stmt->bindParam(':lastname1', $lastname, PDO::PARAM_STR);
	$stmt->bindParam(':Email1', $Email, PDO::PARAM_STR);
	$stmt->bindParam(':UserId1', $UserId, PDO::PARAM_STR);
	$stmt->bindParam(':dob1', $dob, PDO::PARAM_STR);
	$stmt->bindParam(':Password1', $Password, PDO::PARAM_STR);
	$stmt->bindParam(':phno1', $phno, PDO::PARAM_STR);
    $stmt->bindParam(':address1', $address, PDO::PARAM_STR);
	$stmt->bindParam(':groupId1',$groupId, PDO::PARAM_STR);

	$stmt->execute();
    header("Location: login.php");
    exit();
    }
  }
}
Else echo '<font color="red">Password and Confirm Password are not matching</font>';
}
?>

<?php include 'footer.php'?>
</body>
</html>