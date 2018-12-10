<?php include 'header.php';

$conn_string = $db_handle->connectDB();
$mysqli = $db_handle->getNewConn();
if ($stmt = $mysqli->prepare("INSERT INTO ictyaorder(email,total_amount) VALUES (?,?)")) {
  /* bind parameters for markers */
  $stmt->bind_param("si", $_SESSION['email'],$_SESSION['total_price']);
  /* execute query */
  $stmt->execute();
}

if (!empty($_SESSION["cart_item"])) {
    foreach ($_SESSION["cart_item"] as $k => $v) {
        $order_prod_id = $_SESSION["cart_item"][$k]["product_id"];
        $order_qty = $_SESSION["cart_item"][$k]["quantity"];
        $sql = "CALL create_order($order_prod_id,$order_qty)";
        $rs1 = mysqli_query($conn_string, $sql);
    }
}
unset($_SESSION["cart_item"]);
        $_SESSION["cart_item_count"] = 0;

?>

<html>  
<head>
<title>ICTYA Collections</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" href="style.css" /><script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  <script>
  $(function() {
    $('a[href="cart.php"]').addClass('hide');
  });
  </script>
</head>
<body>
<br><br><br><br><br><br><br><br><br><br><br>
<font  color="#C70039" face="courier" size= "30"><i><b>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;You have succesfully placed your order!!!</font></i></b>
<a href="userhome.php" >Continue Shopping</a>
<br><br><br><br><br><br><br><br><br><br><br>


<?php include('footer.php') ?>
</body>
</div>
</html>