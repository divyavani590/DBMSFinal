
<?php include('session.php'); ?>
<h1> <font face="courier" color="#C70039">ICTYA Collections </font></h1>
<ul>
  <li><a href="home.php">Home</a></li>

  
  <!--<li><a href="login.php">Place Order</a></li>-->
  <li class="dropdown"><a href="order.php" class="dropbtn">Items</a>
    <div class="dropdown-content" >
      <a href="women1.php">Women</a>
      <a href="men.php">Men</a>
    </div>
  </li>
  
  <li><a href="orderhistory.php">Order History</a></li>
  
  <li><a href="changepswd.php">Change Password</a></li>
 <!-- <li><a href="register.php">Register</a></li>-->
 <li><a href="aboutus.php">About Us</a></li>
  <li><a href="contact.php">Contact Us</a></li>
  <li class="right-section">
    <!-- <div class="" >
        <input type="button" onclick="gotoLogin()" value="Login" class="btn-primary"></input>
        <input type="button" onclick="gotoRegister()" value="Register" class="btn-primary"></input>
        <a href="logout.php">Logout</a></li>
        <a href="logout.php">Logout</a></li>
    </div> -->
    <div class="<?php  echo $_SESSION['is_logged'] ? 'show' : 'hide' ?>" >
    <label class="user-detail" style="background-color:#D6F09A;padding:9px"><b><?php  echo $_SESSION['email'] ?></b></font></label>
    <a href="cart.php">Cart <?php echo $_SESSION["cart_item_count"] > 0 ? $_SESSION["cart_item_count"] : ""; ?> <?php echo $_SESSION["cart_item_count"] > 0 ? "items" : "" ?></a>
       <!--  <input type="button" onclick="gotoLogout()" value="Logout" class="btn-primary"></input> -->
        <a href="logout.php">Logout</a></li>
    </div>
    <div class="clear"></div>
  
</ul>
<div class="login-cont">
    
</div>