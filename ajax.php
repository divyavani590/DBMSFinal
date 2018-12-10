<?php include("session.php");
$mysqli = $db_handle->getNewConn();
$srx = '%' . $_POST['search'] . '%';
$page= $_POST['page'];
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if($page == "allproducts"){
  //  $query = "SELECT * FROM `products` WHERE `product_desc` LIKE '$srx'";
    /* create a prepared statement */
if ($stmt = $mysqli->prepare("SELECT * FROM `products` WHERE `product_desc` LIKE ?")) {
    /* bind parameters for markers */
    $stmt->bind_param("s", $srx);
    /* execute query */
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No results');
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row['product_id']."</td>";
        echo "<td>". $row['product_desc']."</td>";
        echo "<td>". $row['price']."</td>";
        echo "<td>". $row['product_qty']."</td>";
        echo "<td>". $row['gender']."</td>";
        echo "<td>". $row['category_id']."</td>";
        echo "<td>". $row['productimage']."</td>";
        echo "<td><a href='editgetpro.php?product_id=$row[product_id]' class='btn btn-outline-elegant'>Edit</a></td>";
        echo "<td><a href='deleteproduct.php?product_id=$row[product_id]' class='btn btn-outline-danger'>Delete</a></td>";
    echo"</tr>";
    }
   /* close statement */
    $stmt->close();
}
}else if($page == "allorders"){
  //  $query = "SELECT * FROM `orders` WHERE `orderid` LIKE '$srx'";
    /* create a prepared statement */
if ($stmt = $mysqli->prepare("SELECT * FROM `orders` WHERE `orderid` LIKE ?")) {
    /* bind parameters for markers */
    $stmt->bind_param("s", $srx);
    /* execute query */
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows === 0) exit('No results');
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row['orderid']."</td>";
        echo "<td>". $row['product_desc']."</td>";
        echo "<td>". $row['quantity']."</td>";
        echo "<td>". $row['order_status']."</td>";
    
    echo"</tr>";
        }
    }
   /* close statement */
    $stmt->close();
}




/* close connection */
$mysqli->close();