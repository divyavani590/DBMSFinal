<?php include("session.php");
$conn = $db_handle->getNewConn();
//$sql="select * from products";
//$result=mysqli_query($conn,$sql);
$stmt= $conn->prepare("select * from products");
		//$stmt->bind_param('s',$id);
		$stmt->execute();
		//$row= mysqli_fetch_array($res);
		$rows= $stmt->get_result();
		//$row = $rows->fetch_assoc();
?>
<div class="row">
<div class="col-md-6">
 <input type="text" id="search" placeholder="Search" style="margin-top:20px;"/>
</div>
<div class="col-md-6">
<a href='addform.php' class='btn btn-outline-info pull-right <?php if($_SESSION['groupId'] == 2){ echo 'hide'; } ?>' role='button' style='margin-bottom: 30px;'>Add Product</a>
</div>
</div>

 <div class="row">
<table class="table table-striped table-bordered" >
<thead>
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Price per Unit</th>
			<th>Order in quantity</th>
			<th>Gender</th>
			<th>Category id</th>
			<th>Product Image</th>
            <th class=" <?php if($_SESSION['groupId'] == 2){ echo 'hide'; } ?> " >Edit</th>
			<th class=" <?php if($_SESSION['groupId'] == 2){ echo 'hide'; } ?> ">Delete</th>

		</tr>
</thead>
<tbody>
<?php

	while($row=$rows->fetch_assoc()){
		echo "<tr>";
			echo "<td>". $row['product_id']."</td>";
			echo "<td>". $row['product_desc']."</td>";
			echo "<td>". $row['price']."</td>";
			echo "<td>". $row['product_qty']."</td>";
			echo "<td>". $row['gender']."</td>";
			echo "<td>". $row['category_id']."</td>";
			echo "<td>". $row['productimage']."</td>";
			?>
			<td class="<?php if($_SESSION['groupId'] == 2){ echo 'hide'; } ?>"><a href='editgetpro.php?product_id=<?php echo $row['product_id'] ?>' class='btn btn-outline-elegant'>Edit</a></td>
			<td class="<?php if($_SESSION['groupId'] == 2){ echo 'hide'; } ?>"><a href='admin.php?product_id=<?php echo $row['product_id'] ?>' class='btn btn-outline-danger'>Delete</a></td>
		</tr>
	<?php }	
		
echo "</tbody>";
	echo "</table></div>";
	mysqli_close($conn);
?>
