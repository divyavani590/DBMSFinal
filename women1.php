<?php include('header.php')?>
<html>
<head>
<title>ICTYA Collections</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" href="style.css" />
</head>
<body class="women" style="background:#ccc;">

<div class="bg">
<br>
<div class="container">
<div class= "row">
<?php
$conn1 = $db_handle->getNewConn();
if( isset($_GET['cat_id']) && $_GET['cat_id'] == "" )
{
  $cat_id= $_GET['cat_id'];
  $sql = "SELECT * FROM products where gender= 'F' AND category_id= ? ORDER BY product_id ASC";
  $stmt = $conn1->prepare($sql);
  $stmt->bind_param('i', $cat_id);
}else{
  $sql = "SELECT * FROM products where gender= 'F' ORDER BY product_id ASC";
  $stmt = $conn1->prepare($sql);
}
  $stmt->execute();
  $product_array = $stmt->get_result();
if (!empty($product_array)) {
    foreach ($product_array as $row) {?>

<div class="col-md-3 pm-tile <?php if($row['product_qty'] == 0){ echo 'hide'; } ?>">
  <form method="post" action="women1.php?action=add&code=<?php echo $row["product_id"]; ?>&cat_id=<?php echo $cat_id ?>">
  <img src="<?php echo $row['productimage'] ?>" width="260" height="230">
  <h3><?php echo $row['product_desc'] ?></h3>
  <label> Quantity: </label>
  <input type="number" name="quantity" class="ipt-qty" min="0" max="<?php echo $row['product_qty'] ?>"/>&emsp;

  <input type="submit"  class="btn btn-primary pull-right" value="Add to the cart" /><br/>
  <label> Available Qty: <?php echo $row['product_qty'] ?></label><br/>
  <label> Price: <?php echo "$".$row['price'] ?></label>
  </form>
</div>

<?php
}
}
?>
</div>
</div>
<?php include 'footer.php'?>
</body>
</html>













