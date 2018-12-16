<?php include('session.php'); ?>
<h1> <font face="courier" color="#C70039">ICTYA Collections </font></h1>
<nav>
<ul class="nav">
  <li><a href="userhome.php">Home</a></li>  
  <!--<li><a href="login.php">Place Order</a></li>-->
  <li class="dropdown"><a href="order.php" class="dropbtn">Items</a>
    <ul>
        <li><a href="men.php">Men</a>
          <ul>
          <?php 
            $conn1 = $db_handle->getNewConn();
            $stmt = $conn1->prepare("SELECT * FROM category");
            $stmt->execute();
            $rows = $stmt->get_result();
            while($row1 = $rows->fetch_assoc())
            { ?>
            <li><a href="men.php?cat_id=<?php echo $row1['Category_id'] ?>"><?php echo $row1['Category_name'] ?></a></li>
            <?php }
            ?> 
          </ul>
        </li>
        <li><a href="women1.php">Women</a>
          <ul>
          <?php 
            $conn1 = $db_handle->getNewConn();
            $stmt = $conn1->prepare("SELECT * FROM category");
            $stmt->execute();
            $rows = $stmt->get_result();
            while($row1 = $rows->fetch_assoc())
            { ?>
            <li><a href="women1.php?cat_id=<?php echo $row1['Category_id'] ?>"><?php echo $row1['Category_name'] ?></a></li>
            <?php }
            ?> 
          </ul>
        </li>
      </ul>
  </li>
  
  <li><a href="orderhistory.php">Order History</a></li>
  
  <li><a href="changepswd.php">Change Password</a></li>
 <!-- <li><a href="register.php">Register</a></li>-->
 <li><a href="aboutus.php">About Us</a></li>
  <li><a href="contact.php">Contact Us</a></li>
  
    
    <li class="pull-right <?php  echo $_SESSION['is_logged'] ? 'show' : 'hide' ?>" ><a href="logout.php">Logout</a></li>
    <li class="pull-right <?php  echo $_SESSION['is_logged'] ? 'show' : 'hide' ?>" >
    <a href="cart.php">Cart <?php echo $_SESSION["cart_item_count"] > 0 ? $_SESSION["cart_item_count"] : ""; ?> <?php echo $_SESSION["cart_item_count"] > 0 ? "items" : "" ?></a>
  </li>
    <li class="pull-right <?php  echo $_SESSION['is_logged'] ? 'show' : 'hide' ?>" >
    <div >
    <label class="user-detail" style="background-color:#D6F09A;padding:9px"><b><?php  echo $_SESSION['email'] ?></b></font></label>
    
        
    </div>
    </li>
</ul>
</nav><!-- 
<div class="login-cont">
    
</div>