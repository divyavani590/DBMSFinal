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
<body style="background-image:url('winter.jpeg')">

<BODY>
    
<div class="container">

<div class="txt-heading"></div> 

<?php
$mysqli = $db_handle->getNewConn();
if ($stmt = $mysqli->prepare("SELECT * from ictyaorder where email= ?")) {
  /* bind parameters for markers */
  $stmt->bind_param("s", $_SESSION['email']);
  /* execute query */
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows === 0) exit('No results');
 
    while($row = $result->fetch_assoc()) {
        $stmt1 = $mysqli->prepare("select orderid,product_id,productimage,price,product_desc,quantity,order_status from orders,products where orderid=? AND orders.productid=products.product_id");
        $stmt1->bind_param("s", $row['orderid']);
        $stmt1->execute();
        $result1 = $stmt1->get_result();?>
        <div class="panel panel-default" style="margin: 10px; 0px">
        <div class="panel-heading" style="font-weight:bold;">Order ID: <?php echo $row['orderid'] ?>  <div class='pull-right'>Total Price:<?php echo " $".$row['total_amount'] ?></div></div>
        <div class="panel-body">
        <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="text-align:left;">Name</th>
            <th style="text-align:left;">Code</th>
            <th style="text-align:right;" width="5%">Quantity</th>
            <th style="text-align:right;" width="10%">Unit Price</th>
        </tr>
        </thead>
        <tbody>
        <?php while($item = $result1->fetch_assoc()) {?>
            <tr>
            <td><img height="100" width="100" src="<?php echo $item["productimage"]; ?>" class="cart-item-image" /><?php echo $item["product_desc"]; ?></td>
				<td><?php echo $item["product_id"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ " . $item["price"]; ?></td>
        </tr>
        
        <?php
    }?>
    </tbody>
        </table>
        </div>
        </div>

<?php 

}
}
echo "</div>";
$stmt->close(); 
include 'footer.php'?>
</BODY>
</HTML>