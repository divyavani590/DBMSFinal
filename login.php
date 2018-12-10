<html>
<head>
<title>ICTYA Collections</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1> <font face="courier" color="#C70039">ICTYA Collections </font></h1>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="aboutus.php">About Us</a></li>
  <li><a href="login.php">Login</a></li>
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
<h1><b> <font  color="#C70039">Login </font></b></h1><br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label>Email:&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;&nbsp;</label><input type="email" name="Email"  ><br><br>
<label>Password:&emsp;&emsp;&emsp;&ensp;&ensp;&nbsp;</label><input type="password" name="Password" ><br><br>
<input type="submit" name="submit" value="Login">
<input type="submit" name="register" value="Register" ><br><br><br>
<?php
/*if ($_SERVER["REQUEST_METHOD"] != "POST") {
	echo 'welcome',$Email;
*/  
?>
</form>
<?php
$email=$password = $Idvalue="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["Email"]);
  $password = test_input($_POST["Password"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['submit'])){
   $validLogin = login($email,$password );
   if ($validLogin!=0){
		$Idvalue= $validLogin["Id"];
		session_start();
		$_SESSION['Idvalue'] = $Idvalue;
        header("Location: order.php");
		exit();
     } else {
		 //echo $validLogin;
		$_SESSION['message'] = 'Error:Invalid credential,you must correctly login to view this site.';
		echo $_SESSION['message'];
		unset($_SESSION['message']);
     }
}
?>
<?php
   if(isset($_POST['register']))   {
    header('Location: register.php');
   }
?>
<?php
function login($email, $password){
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ictya";
$mysqli= new PDO("mysql:host=$servername;dbname=$dbname",$dbusername,$dbpassword);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    }
$query = 'SELECT email FROM userprofile WHERE email=:email1 AND password=:password1';
if($stmt = $mysqli->prepare($query)){
	$stmt->bindParam(':email1', $email, PDO::PARAM_STR);
	$stmt->bindParam(':password1', $password, PDO::PARAM_STR);
    $stmt->execute();
	$rows = $stmt->fetch(PDO::FETCH_NUM);
    }else die("Failed to prepare query");
if($rows > 0) {
	$query = 'SELECT * FROM userprofile WHERE email=:email1 AND password=:password1';
if($stmt = $mysqli->prepare($query)){
	$stmt->bindParam(':email1', $email, PDO::PARAM_STR);
	$stmt->bindParam(':password1', $password, PDO::PARAM_STR);
    $stmt->execute();
	$Idvalue= $stmt->fetch(PDO::FETCH_ASSOC);
    return $Idvalue;
    }else die("Failed to prepare query");
}
else{
	return 0;
}
}
?>
<br><br><br>
<footer>
	Copyright Winter sales,Inc<br>
    Contact us at ictya@gmail.com
</footer>
</div>
</body>
</html>
