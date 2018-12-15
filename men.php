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
<body class="women" style="background-image:url('winter.jpeg')">


<div class="bg">
<br>
<div class="container">
<div class= "row">
<?php
$product_array = $db_handle->runQuery("SELECT * FROM products where gender= 'M' ORDER BY product_id ASC");
if (!empty($product_array)) {
    foreach ($product_array as $row) {?>

<div class="col-md-3">
  <form method="post" action="men.php?action=add&code=<?php echo $row["product_id"]; ?>">
  <img src="<?php echo $row['productimage'] ?>" width="250" height="230"><br/><br/>
  <h3><b><font color="green" face="courier" size= "2"><?php echo $row['product_desc'] ?>&ensp;</b></font></h3>
  <label> Quantity: </label>
  <input type="number" name="quantity" class="ipt-qty" min="0" max="<?php echo $row['product_qty'] ?>"/>&emsp;

  <input type="submit"  class="btn btn-primary pull-right" value="Add to the cart" /><br/>
  <label> Available Qty: <?php echo $row['product_qty'] ?></label>
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













