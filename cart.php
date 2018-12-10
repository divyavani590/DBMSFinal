<html>
<head>
<title>ICTYA Collections</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<link rel="stylesheet" href="style.css" />
</head>
<body style="background-image:url('winter.jpeg')">
<?php include 'header.php'?>
<BODY>
    
<div class="container">

<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<div class="rignt-content">
<a id="btnEmpty" href="cart.php?action=empty" class="btn btn-warning" role="button">Empty Cart</a>
</div>
<?php
if (isset($_SESSION["cart_item"])) {
    $total_quantity = 0;
    $total_price = 0;

    ?>
<table class="tbl-cart table" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>
<?php
foreach ($_SESSION["cart_item"] as $item) {
        $item_price = $item["quantity"] * $item["price"];
        ?>
				<tr>
				<td><img height="100" width="100" src="<?php echo $item["productimage"]; ?>" class="cart-item-image" /><?php echo $item["product_desc"]; ?></td>
				<td><?php echo $item["product_id"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ " . $item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["product_id"]; ?>" class="btnRemoveAction">Remove</a></td>
				</tr>
				<?php
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"] * $item["quantity"]);
    }
    $_SESSION["total_price"] = $total_price;
    ?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
<form action="payment.php">
<input type= "submit" value="Checkout" class="btn-primary btn pull-right"/>
</form>
  <?php
} else {
    ?>
<div class="no-records">Your Cart is Empty</div>
<?php
}
?>
</div>
</div>
<?php include 'footer.php'?>
</BODY>
</HTML>