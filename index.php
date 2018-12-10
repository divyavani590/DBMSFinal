<?php ob_start(); session_start();?>
<html>
<head>
<title>ICTYA Collections</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link rel="stylesheet" href="loginStyle.css" />
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1> <font face="courier" color="#C70039">ICTYA Collections </font></h1>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="aboutus.php">About Us</a></li>
<!--   <li><a href="login.php">Login</a></li>
  <li class="dropdown"><a href="order.php" class="dropbtn">Items</a>
    <div class="dropdown-content" >
      <a href="women1.php">Women</a>
      <a href="men.php">Men</a>
    </div>
  </li>
  <li><a href="register.php">Register</a></li> -->

    <li class="dropdown"><a href="#" class="dropbtn">Register</a>
    <div class="dropdown-content" >
      <a href="userregister.php">Register as User</a>
      <a href="emplregister.php">Register as Employee</a>
    </div>
  </li>
  <li><a href="contact.php">Contact Us</a></li>
</ul>

<div class="bg" >
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-8 login-sec">
		    <h2 class="text-center">Login Now</h2>
		    <form class="login-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="email" name="Email" class="form-control" placeholder="">
    
  </div> 
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" name="Password" class="form-control" placeholder="">
  </div>
  
  
    <div class="form-check">
    <input type="submit" name="submit" value="Login" class="btn btn-login float-right">
    
  </div>
  
</form>
</div>
</div>

<?php

?>


<?php

$email=$password = $Idvalue="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["Email"]);
  $password = test_input($_POST["Password"]); 
    $newpassword = md5($password); 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if (isset($_POST['submit'])){
   $validLogin = login($email,$newpassword );
   if ($validLogin!=0){
		$groupId= $validLogin["groupId"];
        
	
        $_SESSION['email'] = $email;
        $_SESSION['groupId'] = $groupId;
        $_SESSION['is_logged'] = true;
        if ($groupId==1){
            header('Location:admin.php');
        }else if($groupId==2){
            header('Location:admin.php');                
        }
        else if($groupId==3){
            header('Location:userhome.php');
        }
        //header("Location: home.php");
		exit();
     } else {
		 //echo $validLogin;
		$_SESSION['message'] = 'Error:Invalid credential,you must register to proceed.';
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
  require_once("dbcontroller.php");
  $db_handle = new DBController();
  $conn = $db_handle->getNewConn();
$query = 'SELECT email FROM userprofile WHERE email=? AND password=?';
if($stmt = $conn->prepare($query)){
	$stmt->bind_param('ss',$email,$password);
    $stmt->execute();
  $rows = $stmt->get_result();
    }else die("Failed to prepare query");
if($rows->num_rows > 0) {
	$query = "SELECT Id,groupId FROM userprofile WHERE email=? AND password=?";
  if($stmt = $conn->prepare($query)){
    $stmt->bind_param('ss',$email,$password);
    $stmt->execute();
    $rows = $stmt->get_result();
    $result = $rows->fetch_assoc();
    return $result;
    }else die("Failed to prepare query");
}
else{
	return 0;
}
}
?>
<br><br><br>

</div>
<?php include('footer.php') ?>
</body>
</html>
