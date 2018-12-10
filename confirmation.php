
<html>  
<head>
<title>ICTYA Collections</title>
</head>
<body>
<?php include('header.php'); 
//$result = $db_handle->runQuery("INSERT INTO 'order'('orderid') values (NULL)");
 $orderid = $db_handle->runQuery("SELECT * FROM ictyaorder ORDER BY orderid DESC LIMIT 1");
foreach($_SESSION["cart_item"] as $k => $v) {
 /*    if($productByCode[0]["product_id"] == $k) {
        if(empty($_SESSION["cart_item"][$k]["quantity"])) {
            $_SESSION["cart_item"][$k]["quantity"] = 0;
        }
        $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];

    } */
    $prod_id= $_SESSION['cart_item'][$k]["product_id"];
    $qty = $_SESSION["cart_item"][$k]["quantity"];
    $uid = $_SESSION["email"];
    $db_handle->numRows("INSERT INTO orders('orderid', 'productid', 'quantity', 'user_id', 'order_status') VALUES (1, $prod_id, $qty, $uid , 'CONFIRMED' )");
} 
//$order_insert = $db_handle->runQuery("INSERT INTO `orders`(`orderid`, `productid`, `quantity`, `user_id`, `order_status`) VALUES ($orderid, $productid, )");
?>
</body>

<?php include('footer.php') ?>
</html>