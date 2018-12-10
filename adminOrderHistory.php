<?php
include("session.php");
$mysqli = $db_handle->getNewConn();
$srx = $_POST['order'];
    $stmt1 = $mysqli->prepare("select orderid,product_id,productimage,price,product_desc,quantity,order_status from orders,products where orderid=? AND orders.productid=products.product_id");
    $stmt1->bind_param('s', $srx);
    $stmt1->execute();
    $result1 = $stmt1->get_result();
 while($item = $result1->fetch_assoc()) { 
     $img = $item['productimage'];
    echo "<tr>";
    echo "<td><img height='100' width='100' src='".$img."' class='cart-item-image' />".$item['product_desc']."</td>";
    echo  "<td>".$item['product_id']."</td>";
    echo  "<td style='text-align:right;'>".$item["quantity"]." </td>";
    echo  "<td style='text-align:right;'>$ " . $item["price"]."</td>";
    echo  "</tr>";
}
