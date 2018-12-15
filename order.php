<html>
<head>
<title>ICTYA Collections</title>
<link rel="stylesheet" href="style.css" />
</head>
<body class="item-pages" style="background-image:url('images\winter.jpeg')">
<h1> <font face="courier" color="#C70039">ICTYA Collections </font></h1>
<ul>
  <li><a href="userhome.php">Home</a></li>
  <li><a href="aboutus.php">About Us</a></li>
  <li><a href="login.php">Place Order</a></li>
  <!--<li><a href="login.php">Login</a></li>-->
  <li class="dropdown"><a href="order.php" class="dropbtn">Items</a>
    <div class="dropdown-content" >
      <a href="women1.php">Women</a>
      <a href="men.php">Men</a>
    </div>
  </li>
  <!--<li><a href="register.php">Register</a></li>-->
  <li><a href="contact.php">Contact Us</a></li>
  <form align="right" name="form1" method="post" action="logout.php">
  <label class="logoutLblPos">
  <input name="submit2" type="submit" id="submit2" value="log out">
  </label>
</form>
   
</ul>
<!--<button><a href="logout.php">Logout</a></button>-->


<div class="bg">
<h1><b>  <font color="white" face="courier" size= "6">Select your Orders</font></b></h1><br>

<div class= "row">

<div class= "column">
<img src="images\women\women.jpg" width="400" height="300">&emsp;
<b><a href="women1.php" font color="#C70039" face="courier" size= "5"><br><font color="white" face="courier" size= "4"><b>Women</b></font>
</div>
<div class= "column">
<img src="images/men/men.jpg" width="400" height="300">&emsp;
<b><a href="men.php" font color="#C70039" face="courier" size= "5"><br><font color="white" face="courier" size= "4"><b>Men</b></font>
</div>

</div><br>
</div>
</body>
</html>
